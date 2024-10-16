<?php

namespace App\Livewire;

use App\Models\Category;
use Livewire\Component;

class CategoryIndex extends Component
{
    // public Category $category;
    public $categories;
    public ?Category $selectedCategory=null;
    public $colors;
    public $name,$color;
    public $form;
    public $successMessage;
    public function mount(){
        $this->categories=Category::all();
        $this->colors = ['red','orange','amber','yellow','lime','green',
        'emerald','teal','cyan','sky','blue','indigo','violet',
        'purple','fuchsia','pink','rose'];
        $this->successMessage='';
        // $this->CategoryShow($this->categories[0]);
        $this->Close();
    }
    public function CategoryCreateForm(){
        $this->form='create';
    }
    public function CategoryStore(){
        $validated = $this->validate([
            'name' => 'required|string|unique:categories,name',
            'color' => 'required|string|in:' . implode(',', $this->colors),
        ]);
        // dump("hit");
        Category::create($validated);
        $this->categories = Category::all();
        $this->successMessage = 'Category successfully created!';
        $this->Close();
    }
    public function CategoryShow(Category $category){
        // dump($category);
        if(!$category) return;
        $this->name = $category->name;
        $this->color = $category->color;
        $this->form='editing';
        $this->selectedCategory=$category;
    }
    public function CategoryUpdate(){
        if(!$this->selectedCategory) return;
        $validated = $this->validate([
            'name'=>[
                'required',
                'string',
                'unique:categories,name,' . ($this->selectedCategory->id ?? ''),
            ],
            'color' => 'required|string|in:' . implode(',', $this->colors),
        ]);
        $this->selectedCategory->name = $validated['name'];
        $this->selectedCategory->color = $validated['color'];
        $this->selectedCategory->save();
        $this->categories = Category::all();
        $this->successMessage = 'Category successfully updated!';
        $this->Close();
    }
    public function CategoryDelete(){
        if (!$this->selectedCategory) return;
        $this->selectedCategory->delete();
        $this->successMessage = 'Category deleted successfully!';
        $this->categories = Category::all();
        $this->Close();
    }
    public function Close(){
        $this->form=null;
        $this->name = null;
        $this->color = $this->colors[0];
    }
    public function render()
    {
        return view('livewire.category-index');
    }
}
