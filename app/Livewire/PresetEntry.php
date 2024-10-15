<?php

namespace App\Livewire;

use App\Models\Preset;
use App\Models\Entry;
use Livewire\Component;
// use Carbon\Carbon;
class PresetEntry extends Component
{
    public $presets;
    public function mount(){
        $this->presets = Preset::all();
    }
    public function EntryStore(Preset $preset){
        if(!$preset) return;

        Entry::create([
            'category_id'=>$preset->category_id,
            'date'=>now()->format('Y-m-d'),
            'price'=>$preset->price,
        ]);
        $this->successMessage = 'Entry successfully created!';
    }
    public function render()
    {
        return view('livewire.preset-entry');
    }
}
