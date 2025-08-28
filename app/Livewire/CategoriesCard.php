<?php

namespace App\Livewire;

use App\Models\Category;
use Livewire\Component;
use Illuminate\Support\Str;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;

class CategoriesCard extends Component
{
    public $categoryName;

    public function createCategory()
    {
        try {
            $this->validate([
                'categoryName' => 'required|string|max:255|unique:categories,name',
            ]);

            $slug = Str::slug($this->categoryName);

            Category::create([
                'name' => $this->categoryName,
                'slug' => $slug,
            ]);

            LivewireAlert::title('Created Category!')
                ->success()
                ->show();

            $this->categoryName = '';
        } catch (\Exception $e) {
            LivewireAlert::title('Error')
                ->text($e->getMessage())
                ->error()
                ->show();
        }
    }

    public function render()
    {
        return view('livewire.categories.categories-card');
    }
}
