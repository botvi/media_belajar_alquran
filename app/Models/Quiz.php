<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    use HasFactory; 
    protected $table = 'quizzes';
    protected $fillable = [
        'soal',
    ];
    protected $casts = [
        'soal' => 'array',
    ];
}
