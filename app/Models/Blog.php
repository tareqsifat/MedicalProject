<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;protected $fillable = [
        'image',
        'title',
    ];


    public function User_info()
    {
        return $this->belongsTo('App\Models\User', 'creator', 'id');
    }
}
