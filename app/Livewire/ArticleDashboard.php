<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Article;

class ArticleDashboard extends Component
{
    use WithPagination;

    protected $paginationTheme = 'tailwind';

    public function render()
    {
        $articles = Article::with('category')->latest()->paginate(10);
        return view('livewire.articles.article-dashboard', [
            'articles' => $articles,
        ]);
    }

    public function delete($id)
    {
        $article = Article::find($id);
        if ($article) {
            $article->delete();
            // refresh pagination view
            $this->resetPage();
        }
    }
}
