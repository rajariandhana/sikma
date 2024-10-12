<?php

namespace App\Livewire;

use App\Models\Category;
use Livewire\Component;

class CategoryIndex extends Component
{
    public Category $category;
    public $categories;
    public Category $selectedCategory;
    public function mount(){
        // $this->category = $category;
        $this->categories=Category::all();
    }
    // public function Delete(){
    //     $this->category->delete();
    //     $this->dispatchBrowserEvent('category-deleted', ['categoryId' => $this->category->id]);
    // }
    public function CategoryView(Category $category){
        $this->selectedCategory = $category;
        $this->dispatch('open-modal',name:'category-details');
    }
    public function render()
    {
        return view('livewire.category-index');
    }
}
