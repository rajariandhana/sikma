<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Preset;
use Livewire\Component;

class PresetIndex extends Component
{
    public $presets;
    public $categories;
    public ?Preset $selectedPreset=null;
    public $price,$category_id;
    public $form;
    //make condition if no category exist
    public function mount(){
        $this->presets=Preset::all();
        $this->categories=Category::all();
        $this->Close();
    }
    public function PresetCreateForm(){
        $this->Close();
        $this->form='create';
    }
    public function PresetStore(){
        $validated = $this->validate([
            'price' => 'required|numeric|min:1000',
            'category_id' => 'required|numeric|exists:categories,id'
        ]);
        // dump("hit");
        Preset::create($validated);
        $this->presets = Preset::all();
        $this->successMessage = 'Preset successfully created!';
        $this->Close();
    }
    public function PresetShow(Preset $preset){
        // dump($preset);
        if(!$preset) return;
        $this->price = $preset->price;
        $this->category_id = $preset->category_id;
        $this->form='editing';
        $this->selectedPreset = $preset;
        // $this->selectedPreset=$preset;
    }
    public function PresetDelete(){
        if (!$this->selectedPreset) return;
        $this->selectedPreset->delete();
        $this->successMessage = 'Preset deleted successfully!';
        $this->presets = Preset::all();
        $this->Close();
    }
    public function Close(){
        $this->form=null;
        $this->price = null;
        $this->category_id = $this->categories[0]->id;
    }
    public function render()
    {
        return view('livewire.preset-index');
    }
}
