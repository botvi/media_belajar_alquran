<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\Sunnah;
use Illuminate\Support\Facades\Http;

class WebSunnahController extends Controller
{
    public function index()
    {
        $sunnah = Sunnah::all();
        return view('pageweb.sunnah.index', compact('sunnah'));
    }

    public function detail($judul)
    {
        $data = Sunnah::where('judul', $judul)->first();
        return view('pageweb.sunnah.detail', compact('data'));
    }
}
