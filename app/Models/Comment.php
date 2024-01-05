<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;



class Comment extends Model
{
    use HasFactory;

    /**
     * Get the post that owns the comment.
     */
    public function book(): BelongsTo
    {
        return $this->belongsTo(Book::class);
    }

    /**
     * Get the phone associated with the user.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
