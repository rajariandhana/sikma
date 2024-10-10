<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Entry;
use Livewire\Component;

class NewEntry extends Component
{
    public bool $newEntry,$successMessage;
    public $categories;
    public $category_id,$date,$price,$description;

    public function mount(){
        $this->newEntry = false;
        $this->categories = Category::all();
        $this->successMessage = '';

        $this->category_id = $this->categories[0]->id;
        $this->date = date('Y-m-d');
        $this->price = 0;
        $this->description = NULL;
    }
    public function NewEntry(){
        // dd("here");
        $this->newEntry = true;
    }
    public function StoreEntry(){
        // dd($this->category_id,$this->date,$this->price,$this->description);

        $validated = $this->validate([
            'category_id'=>'required',
            'date'=>'required|date',
            'price'=>'required|numeric|min:0|max:999999',
            'description'=>'',
        ]);
        Entry::create($validated);
        $this->successMessage = 'Entry successfully created!';
        // $this->reset(['category_id', 'date', 'price', 'description']);
        // sleep(4);
        // $this->successMessage=false;
    }
    public function render(){
        return view('livewire.new-entry');
    }
}
