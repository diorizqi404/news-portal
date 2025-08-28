<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;
use App\Models\Article;
use App\Models\Category;
use Throwable;

class ArticleEdit extends Component
{
    use WithFileUploads;

    public $articleId;
    public $title;
    public $image; // new uploaded file
    public $existingImage; // url/string of existing image
    public $content;
    public $category_id;
    public $categories;

    protected $rules = [
        'title' => 'required|string|max:255',
        'image' => 'nullable|image|max:10240',
        'content' => 'required|string',
        'category_id' => 'required|exists:categories,id',
    ];

    /**
     * Mount the component with an article id (from route or when embedding component).
     */
    public function mount($id = null)
    {
        $this->articleId = $id;

        if ($this->articleId) {
            $article = Article::findOrFail($this->articleId);

            $this->title = $article->title;
            $this->content = $article->content;
            $this->category_id = $article->category_id;
            $this->existingImage = $article->image; // could be URL
        }
    }

    public function editArticle()
    {
        try {
            $validated = $this->validate();

            $article = Article::findOrFail($this->articleId);

            // handle image upload if new file provided
            if ($this->image) {
                $path = $this->image->store('articles', 'public');
                $url = Storage::url($path);

                // optionally delete old local storage image if it looks like a storage path
                if ($this->existingImage && str_contains($this->existingImage, '/storage/')) {
                    // Get relative path after '/storage/'
                    $pos = strpos($this->existingImage, '/storage/');
                    if ($pos !== false) {
                        $relative = substr($this->existingImage, $pos + strlen('/storage/'));
                        Storage::disk('public')->delete($relative);
                    }
                }

                $article->image = $url;
            }

            $article->title = $this->title;
            $article->content = $this->content;
            $article->category_id = $this->category_id;
            $article->save();

            LivewireAlert::title('Article updated successfully!')
                ->success()
                ->show();
        } catch (Throwable $e) {
            LivewireAlert::title('Failed to update article')
                ->error()
                ->text($e->getMessage())
                ->show();
        }
    }

    public function render()
    {
        $this->categories = Category::all();

        return view('livewire.articles.article-edit', [
            'categories' => $this->categories,
        ]);
    }
}
