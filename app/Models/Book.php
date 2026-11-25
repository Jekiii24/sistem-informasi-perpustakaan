<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Book extends Model
{
    protected $fillable = ['category_id', 'title', 'isbn', 'author', 'publisher', 'stock', 'description'];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}