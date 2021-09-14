<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppointmentPage extends Model
{
    use HasFactory;
    protected $fillable = [
        'title_image',
        'form_image',
        'title_message',
        'question_message',
    ];
}
