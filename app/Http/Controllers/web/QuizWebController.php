<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\Quiz;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class QuizWebController extends Controller
{
    public function index()
    {
        $quis = Quiz::all()->first();  
        $soal = collect($quis->soal)->shuffle(); // ubah array ke collection, lalu acak
        $waktu_mulai = $quis->waktu_mulai;
        $waktu_selesai = $quis->waktu_selesai;
        $tanggal_mulai = $quis->tanggal_mulai;

        return view('pageweb.quiz.index', compact('soal', 'waktu_mulai', 'waktu_selesai', 'tanggal_mulai'));
    }

    
}
