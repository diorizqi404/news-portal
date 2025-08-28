<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Article extends Model
{
    protected $guarded = [];

    /**
     * The tags that belong to the article.
     */
    // public function tags(): BelongsToMany
    // {
    //     return $this->belongsToMany(Tags::class, 'article_tags', 'article_id', 'tag_id');
    // }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
