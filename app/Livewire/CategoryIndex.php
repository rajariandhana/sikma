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
    public function mount(){
        $this->categories=Category::all();
        $this->colors = ['red','orange','amber','yellow','lime','green',
        'emerald','teal','cyan','sky','blue','indigo','violet',
        'purple','fuchsia','pink','rose'];
        // $this->CategoryShow($this->categories[0]);
        $this->CategoryReset();
    }

    public function CategoryShow(Category $category){
        // dump($category);
        if(!$category) return;
        $this->selectedCategory = $category;
        $this->name = $category->name;
        $this->color = $category->color;
        // dump($this->selectedCategory->name);
        $this->dispatch('open-modal',name:'category-details');
    }
    public function CategoryUpdate(){
        if(!$this->selectedCategory) return;
        $validated = $this->validate([
            'name'=>'required|string|unique:categories,name' . $this->selectedCategory->id,
            'color' => 'required|string|in:' . implode(',', $this->colors),
        ]);
        $this->selectedCategory->name = $validated['name'];
        $this->selectedCategory->color = $validated['color'];
        $this->selectedCategory->save();
        $this->categories = Category::all();
        $this->successMessage = 'Category successfully updated!';
        $this->CategoryReset();
    }
    public function CategoryDelete()
    {
        if (!$this->selectedCategory) return;
        // $this->dispatch('close-modal');
        $this->selectedCategory->delete();
        $this->successMessage = 'Category deleted successfully!';
        $this->categories = Category::all();

        $this->CategoryReset();
    }
    public function CategoryReset(){
        if ($this->categories->isNotEmpty()){
            $this->CategoryShow($this->categories->first());
        }
        else{
            $this->selectedCategory = null;
            $this->name = null;
            $this->color = null;
        }
        $this->dispatch('close-modal');
    }
    public function CategoryCreateForm(){
        $this->name = null;
        $this->color = null;
        $this->dispatch('open-modal',name:'category-new-form');

    }
    public function CategoryStore(){
        if(!$this->selectedCategory) return;
        $validated = $this->validate([
            'name'=>'required|string|unique:categories,name' . $this->selectedCategory->id,
            'color' => 'required|string|in:' . implode(',', $this->colors),
        ]);
        Category::create($validated);
        $this->categories = Category::all();
        $this->successMessage = 'Category successfully created!';
        $this->CategoryReset();
    }
    public function render()
    {
        return view('livewire.category-index');
    }
}
