<?php

namespace App\Livewire;

use App\Models\Category;
use Livewire\Component;
use Illuminate\Support\Str;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;
use Livewire\WithPagination;

class CategoriesCard extends Component
{
    public $categoryName;

    use WithPagination;

    protected $paginationTheme = 'tailwind';

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

    public function delete($id)
    {
        $category = Category::find($id);
        if ($category) {
            $category->delete();
            $this->resetPage();
        }

        LivewireAlert::title('Category deleted successfully!')
            ->success()
            ->show();
    }

    public function render()
    {
        $categories = Category::orderBy('created_at', 'desc')->paginate(5);
        // $categories is a paginator instance, so you can call firstItem() in the Blade view
        return view('livewire.categories.categories-card', compact('categories'));
    }
}
