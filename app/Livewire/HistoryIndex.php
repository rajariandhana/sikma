<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Entry;
use Livewire\Component;

class HistoryIndex extends Component
{
    public $entries;
    public $categories;
    public ?Entry $selectedEntry=null;
    public $price,$category_id,$date;
    public $form;
    public $successMessage;
    public $selectedCategories = []; // for filtering

    //make condition if no category exist
    public function mount(){
        $this->entries=Entry::all();
        $this->categories=Category::all();
        $this->category_id = $this->categories->first()->id ?? null;
        $this->filterEntries();
        $this->Close();
    }

    public function filterEntries()
    {
        if ($this->selectedCategories == 'all') {
            $this->entries = Entry::all(); // Show all entries
        } elseif (count($this->selectedCategories) > 0) {
            $this->entries = Entry::whereIn('category_id', $this->selectedCategories)->get();
        } else {
            $this->entries = Entry::all(); // Reset to all if no category is selected
        }
    }

    public function updatedSelectedCategories($value)
    {
        // dump($this->selectedCategories);

        // Ensure selectedCategories is an array
        if (is_string($value)) {
            if($value=='all') $this->selectedCategories ='all';
            else $this->selectedCategories = [$value];
        } else {
            $this->selectedCategories = $value; // if it’s an array, keep it
        }

        $this->filterEntries(); // Call the filtering method after updating
    }

    public function EntryShow(Entry $entry){
        // dump($entry);

        if(!$entry) return;
        $this->price = $entry->price;
        $this->category_id = Category::find($entry->category_id)->id ?? null;
        $this->date = $entry->date;
        $this->form='editing';
        $this->selectedEntry = $entry;

        // dump($this->selectedEntry);
        // $this->selectedEntry=$entry;
    }

    public function EntryUpdate(){
        if(!$this->selectedEntry) return;
        $validated = $this->validate([
            'price' => 'required|numeric|min:1000',
            'date'=>'required|date',
            'category_id'=>'required'
        ]);
        // dump($validated);
        if(!Category::find($validated['category_id'])) return;
        $this->selectedEntry->price = $validated['price'];
        $this->selectedEntry->date = $validated['date'];
        $this->selectedEntry->category_id = $validated['category_id'];
        $this->selectedEntry->save();
        $this->entries = Entry::all();
        $this->successMessage = 'Entry successfully updated!';
        $this->Close();
    }
    public function EntryDelete(){
        if (!$this->selectedEntry) return;
        $this->selectedEntry->delete();
        $this->successMessage = 'Entry deleted successfully!';
        $this->entries = Entry::all();
        $this->Close();
    }
    public function Close(){
        $this->form=null;
        $this->price = null;
        $this->category_id = $this->categories[0]->id;
        $this->date = null;
    }

    public function render()
    {
        return view('livewire.history-index',[
            'categories' => $this->category_id,
            'entries' => $this->entries,
        ]);
    }
}
