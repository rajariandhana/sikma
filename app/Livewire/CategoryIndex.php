<?php

namespace App\Livewire;

use App\Models\Category;
use Livewire\Component;

class CategoryIndex extends Component
{
    // public Category $category;
    public $categories;
    public Category $selectedCategory;
    public $category_name;
    public function mount(){
        $this->categories=Category::all();
        $this->CategoryShow($this->categories[0]);
        // $this->selectedCategory = NULL;
    }
    // public function Delete(){
    //     $this->category->delete();
    //     $this->dispatchBrowserEvent('category-deleted', ['categoryId' => $this->category->id]);
    // }
    public function CategoryShow(Category $category){
        // dump($category->name);
        $this->selectedCategory = $category;
        $this->category_name = $category->name;
        // dump($this->selectedCategory->name);
        $this->dispatch('open-modal',name:'category-details');
    }
    public function render()
    {
        return view('livewire.category-index');
    }
}
