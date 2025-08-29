<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Article;

class ArticleList extends Component
{
    public function render()
    {
        $articles = Article::with('category')->orderBy('created_at', 'desc')->paginate(6);
        return view('livewire.articles.article-list', compact('articles'));
    }
}
