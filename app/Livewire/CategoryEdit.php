<?php

namespace App\Livewire;

use App\Models\Category;
use Livewire\Component;

class CategoryEdit extends Component
{
    public Category $category;
    public function mount($category){
        $this->category = $category;
    }
    public function Delete(){
        $this->category->delete();
        $this->dispatchBrowserEvent('category-deleted', ['categoryId' => $this->category->id]);
    }
    public function render()
    {
        return view('livewire.category-edit');
    }
}
