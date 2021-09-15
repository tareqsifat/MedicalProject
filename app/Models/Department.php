<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;
    protected $fillable = [
        'icon',
        'doctor_id',
        'title',
        'description'
    ];



    public function doctor_info()
    {
        return $this->belongsTo('App\Models\Doctor', 'doctor_id', 'id');
    }
    public function treatment_info()
    {
        return $this->belongsTo('App\Models\Treatment', 'treatment_id', 'id');
    }
}
