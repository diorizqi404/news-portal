<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Category;
use Illuminate\Support\Str;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;

class CategoryEdit extends Component
{
    public $categoryName;
    public $categoryId;

        public function mount($id = null)
    {
        $this->categoryId = $id;

        if ($this->categoryId) {
            $category = Category::findOrFail($this->categoryId);

            $this->categoryName = $category->name;
        }
    }

    public function editCategory()
    {
        try {
            $this->validate([
                'categoryName' => 'required|string|max:255|unique:categories,name',
            ]);
            $slug = Str::slug($this->categoryName);

            $category = Category::findOrFail($this->categoryId);

            $category->name = $this->categoryName;
            $category->slug = $slug;
            $category->save();

            LivewireAlert::title('Category Updated Successfully!')
                ->success()
                ->show();

            $this->categoryName = '';
            return redirect()->route('dashboard');
        } catch (\Exception $e) {
            LivewireAlert::title('Failed to update Category')
                ->text($e->getMessage())
                ->error()
                ->show();
        }
    }

    public function render()
    {
        return view('livewire.categories.category-edit');
    }
}
