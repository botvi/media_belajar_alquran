<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\Materi;
use Illuminate\Support\Facades\Http;

class WebMateriController extends Controller
{
    public function index()
    {
        $materi = Materi::all();
        return view('pageweb.materi.index', compact('materi'));
    }

    public function detail($judul)
    {
        $data = Materi::where('judul', $judul)->first();
        return view('pageweb.materi.detail', compact('data'));
    }
}
