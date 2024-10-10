<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Category;

class CategoriesEdit extends Component
{
    public $categories;
    public function mount(){
        $this->categories=Category::all();
    }
    public function Delete(Category $category)
    {
        $category->delete();
        $this->categories=Category::all();
    }

    public function render()
    {
        return view('livewire.categories-edit');
    }
}
