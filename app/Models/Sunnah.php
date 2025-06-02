<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sunnah extends Model
{
    use HasFactory;
    protected $table = 'sunnahs';
    protected $fillable = [
        'judul',
        'deskripsi',
        'dalil',
        'kategori',
        'sumber',
        'gambar',
    ];
}
