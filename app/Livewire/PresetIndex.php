<?php

namespace App\Livewire;

use App\Models\Preset;
use App\Models\Category;
use Livewire\Component;

class PresetIndex extends Component
{
    public $presets;
    public ?Preset $selectedPreset=null;
    public $price,$category_id;
    public $categories;
    public function mount(){
        $this->presets=Preset::all();
        $this->categories=Category::all();
        // $this->PresetShow($this->presets[0]);
        $this->PresetReset();
    }

    public function PresetShow(Preset $preset){
        // dump($preset);
        if(!$preset) return;
        $this->selectedPreset = $preset;
        $this->price = $preset->price;
        // dump($this->selectedPreset->price);
        $this->dispatch('open-modal',name:'preset-details');
    }
    // public function PresetUpdate(){
    //     if(!$this->selectedPreset) return;
    //     $validated = $this->validate([
    //         'price'=>'required|string|unique:presets,price' . $this->selectedPreset->id,
    //     ]);
    //     $this->selectedPreset->price = $validated['price'];
    //     $this->selectedPreset->save();
    //     $this->presets = Preset::all();
    //     $this->successMessage = 'Preset successfully updated!';
    //     $this->PresetReset();
    // }
    public function PresetDelete()
    {
        if (!$this->selectedPreset) return;
        // $this->dispatch('close-modal');
        $this->selectedPreset->delete();
        $this->successMessage = 'Preset deleted successfully!';
        $this->presets = Preset::all();

        $this->PresetReset();
    }
    public function PresetReset(){
        // if ($this->presets->isNotEmpty()){
        //     $this->PresetShow($this->presets->first());
        // }
        // else{
        $this->selectedPreset = null;
        $this->price = null;
        // }
        $this->dispatch('close-modal');
    }
    public function PresetCreateForm(){
        $this->price = null;
        $this->category_id = $this->categories[0]->id;
        $this->dispatch('open-modal',name:'preset-new-form');
    }
    public function PresetStore(){
        $categoryIds = $this->categories->pluck('id')->toArray();
        // dump($request);
        $validated = $this->validate([
            'price' => 'required|numeric|min:0',
            'category_id' => [
                'required',
                'in:' . implode(',', $categoryIds),
            ],
        ]);

        Preset::create($validated);
        $this->presets = Preset::all();
        $this->successMessage = 'Preset successfully created!';
        $this->PresetReset();
    }
    public function render()
    {
        return view('livewire.preset-index');
    }
}
