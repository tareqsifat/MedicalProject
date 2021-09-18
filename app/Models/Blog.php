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
    // public function Category()
    // {
    //     return $this->hasMany(Category::class);
    // }
    // public function SubCategory()
    // {
    //     return $this->hasMany(SubCategory::class);
    // }


    public function User_info()
    {
        return $this->belongsTo('App\Models\User', 'creator', 'id');
    }
    public function Category_info()
    {
        return $this->belongsTo('App\Models\Category', 'category_id', 'id');
    }
    public function SubCategory_info()
    {
        return $this->belongsTo('App\Models\SubCategory', 'subcategory_id', 'id');
    }
}
