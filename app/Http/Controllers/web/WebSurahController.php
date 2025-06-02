<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\Surah;
use Illuminate\Support\Facades\Http;

class WebSurahController extends Controller
{
    public function index()
    {
        $surah = Surah::all();
        return view('pageweb.surah.index', compact('surah'));
    }

    public function detail($nama)
    {
        $surah = Surah::where('nama', $nama)->first();
        $ayat = $surah->api_detail_link;
        $response = Http::withoutVerifying()->get($ayat);
        $data = $response->json();
        return view('pageweb.surah.detail', compact('surah', 'data'));
    }
}
