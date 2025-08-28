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
        // Logic to create a new category
        $this->validate([
            'categoryName' => 'required|string|max:255',
        ]);

        $slug = Str::slug($this->categoryName);

        // Create the category
        Category::create([
            'name' => $this->categoryName,
            'slug' => $slug,
        ]);

        LivewireAlert::title('Changes saved!')
            ->success()
            ->show();

        // Reset the input
    }

    public function test()
    {
        LivewireAlert::title('Changes saved!')
            ->success()
            ->show();
    }

    public function render()
    {
        return view('livewire.categories.categories-card');
    }
}
