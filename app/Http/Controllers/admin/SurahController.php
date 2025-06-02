<?php

namespace App\Http\Controllers\admin;

use App\Models\Surah;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Http;

class SurahController extends Controller
{
   public function index()
   {
    $surah = Surah::all();
    return view('pageadmin.master_surah.index', compact('surah'));
   }


   public function fetchAndSaveSurah()
   {
       try {
           $response = Http::withoutVerifying()->get('https://equran.id/api/v2/surat');
           $data = $response->json();

           if ($data['code'] === 200) {
               foreach ($data['data'] as $surahData) {
                   Surah::updateOrCreate(
                       ['nomor' => $surahData['nomor']],
                       [
                           'nama' => $surahData['nama'],
                           'nama_latin' => $surahData['namaLatin'],
                           'jumlah_ayat' => $surahData['jumlahAyat'],
                           'tempat_turun' => $surahData['tempatTurun'],
                           'arti' => $surahData['arti'],
                           'deskripsi' => $surahData['deskripsi'],
                           'audio_05' => $surahData['audioFull']['05'] ?? null,
                           'api_detail_link' => 'https://equran.id/api/v2/surat/' . $surahData['nomor']
                       ]
                   );
               }
               
               if (request()->ajax()) {
                   return response()->json([
                       'success' => true,
                       'message' => 'Data surah berhasil diambil dan disimpan'
                   ]);
               }
               
               Alert::success('Berhasil', 'Data surah berhasil diambil dan disimpan');
           } else {
               if (request()->ajax()) {
                   return response()->json([
                       'success' => false,
                       'message' => 'Gagal mengambil data dari API'
                   ], 400);
               }
               
               Alert::error('Error', 'Gagal mengambil data dari API');
           }
       } catch (\Exception $e) {
           if (request()->ajax()) {
               return response()->json([
                   'success' => false,
                   'message' => 'Terjadi kesalahan: ' . $e->getMessage()
               ], 500);
           }
           
           Alert::error('Error', 'Terjadi kesalahan: ' . $e->getMessage());
       }

       return redirect()->back();
   }
}
