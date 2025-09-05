<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;
use Illuminate\Support\Str;
use App\Models\Article;
use App\Models\Category;
use Throwable;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class CreateArticleCard extends Component
{
    use WithFileUploads;

    public $title;
    public $image;
    public $content;
    public $category_id;
    public $tag_ids = [];
    public $tags;
    public $categories;

    protected $rules = [
        'title' => 'required|string|max:255|unique:articles,title',
        'image' => 'nullable|image|max:512',
        'content' => 'required|string',
        'category_id' => 'required|exists:categories,id',
    ];

    public function createArticle()
    {
        try {
            $validated = $this->validate();

            if ($this->image) {
                $path = $this->image->store('articles', 'public');
                $url = Storage::url($path);
            }

            $slug = Str::slug($this->title);

            Article::create([
                'category_id' => $this->category_id,
                'user_id'    => Auth::user()->id,
                'title'       => $this->title,
                'slug'        => $slug,
                'content'     => $this->content,
                'image'       => $url,
            ]);

            $this->dispatch('article-saved');
            $this->reset(['title', 'image', 'content', 'category_id']);

            LivewireAlert::title('Article created successfully!')
                ->success()
                ->show();
        } catch (Throwable $e) {
            LivewireAlert::title('Failed to create article')
                ->error()
                ->text($e->getMessage())
                ->show();
        }
    }

    public function render()
    {
        $this->categories = Category::all();
        return view('livewire.articles.create-article-card', [
            'categories' => $this->categories
        ]);
    }
}
