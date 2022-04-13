<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory; 

    protected $fillable = ['body', 'user_id', 'commentable_id', 'commentable_type'];


    // Function to get the user who posted the comment 

    // every comment belongs to a user or Post

    public function commentable()
    {
        return $this->morphTo();
    }

    /**
     * 
     *  Get the user that owns the comment.
     */

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
