<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int $borrowing_id
 * @property int $book_id
 * @property int $qty
 * @property Book $book
 * @property Borrowing $borrowing
 */
class BorrowingDetail extends Model
{
    protected $fillable = ['borrowing_id', 'book_id', 'qty'];

    public function borrowing(): BelongsTo
    {
        return $this->belongsTo(Borrowing::class);
    }

    public function book(): BelongsTo
    {
        return $this->belongsTo(Book::class);
    }
}
