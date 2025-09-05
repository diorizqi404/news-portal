<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Article;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;

class ArticleDashboard extends Component
{
    use WithPagination;

    protected $paginationTheme = 'tailwind';

    public function render()
    {
        $articles = Article::with('category')->orderBy('updated_at', 'desc')->paginate(5);
        return view('livewire.articles.article-dashboard', [
            'articles' => $articles,
        ]);
    }

    public function delete($id)
    {
        $article = Article::find($id);
        if ($article) {
            $article->delete();
            $this->resetPage();
        }

        LivewireAlert::title('Article deleted successfully!')
            ->success()
            ->show();
    }
}
