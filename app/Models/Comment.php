<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'body'
    ];

    public function User_info()
    {
        return $this->belongsTo('App\Models\User', 'creator', 'id');
    }
    public function blog_info()
    {
        return $this->belongsTo('App\Models\Blog', 'blog_id', 'id');
    }
}
