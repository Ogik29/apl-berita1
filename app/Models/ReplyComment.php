<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReplyComment extends Model
{
    use HasFactory;

    protected $fillable = [
        'comment_id',
        'reply'
    ];

    public function comment()
    {
        return $this->belongsTo(Comment::class, 'comment_id');
    }
}
