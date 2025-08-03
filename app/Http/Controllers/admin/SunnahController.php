<?php

namespace App\Http\Controllers\admin;

use App\Models\Sunnah;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class SunnahController extends Controller
{
    public function index()
    {
        try {
            $sunnah = Sunnah::latest()->get();
            return view('pageadmin.master_sunnah.index', compact('sunnah'));
        } catch (\Exception $e) {
            Alert::error('Error', 'Terjadi kesalahan saat mengambil data');
            return redirect()->back();
        }
    }

    public function create()
    {
        return view('pageadmin.master_sunnah.create');
    }

    public function store(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'judul' => 'required|string|max:255',
                'deskripsi' => 'required|string',
                'dalil' => 'required|string',
                'kategori' => 'required|string',
                'sumber' => 'required|string',
                'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'doa' => 'nullable|string',
                'audio_doa' => 'nullable|file|mimes:mp3,wav,ogg,m4a,aac,flac,wma,m4b,m4r,m4p,m4v,m4b,m4r,m4p,m4v',
            ]);

            if ($validator->fails()) {
                return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
            }

            $gambar = $request->file('gambar');
            $gambarName = time() . '_' . $gambar->getClientOriginalName();

            // Pastikan direktori uploads/gambar ada
            $uploadPath = public_path('uploads/gambar');
            if (!File::exists($uploadPath)) {
                File::makeDirectory($uploadPath, 0777, true);
            }

            $gambar->move($uploadPath, $gambarName);

            // Handle audio file jika ada
            $audio_doaName = null;
            if ($request->hasFile('audio_doa')) {
                $audio_doa = $request->file('audio_doa');
                $audio_doaName = time() . '_' . $audio_doa->getClientOriginalName();

                $uploadPathAudio = public_path('uploads/audio_doa');
                if (!File::exists($uploadPathAudio)) {
                    File::makeDirectory($uploadPathAudio, 0777, true);
                }

                $audio_doa->move($uploadPathAudio, $audio_doaName);
            }

            Sunnah::create([
                'judul' => $request->judul,
                'deskripsi' => $request->deskripsi,
                'dalil' => $request->dalil,
                'kategori' => $request->kategori,
                'sumber' => $request->sumber,
                'gambar' => $gambarName,
                'doa' => $request->doa,
                'audio_doa' => $audio_doaName,
            ]);

            Alert::success('Berhasil', 'Data berhasil disimpan');
            return redirect()->route('master-sunnah.index');
        } catch (\Exception $e) {
            Alert::error('Error', 'Terjadi kesalahan saat menyimpan data');
            return redirect()->back()->withInput();
        }
    }

    public function edit($id)
    {
        $sunnah = Sunnah::findOrFail($id);
        return view('pageadmin.master_sunnah.edit', compact('sunnah'));
    }

    public function update(Request $request, $id)
    {
        try {
            $validator = Validator::make($request->all(), [
                'judul' => 'required|string|max:255',
                'deskripsi' => 'required|string',
                'dalil' => 'required|string',
                'kategori' => 'required|string',
                'sumber' => 'required|string',
                'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'doa' => 'nullable|string',
                'audio_doa' => 'nullable|file|mimes:mp3,wav,ogg,m4a,aac,flac,wma,m4b,m4r,m4p,m4v,m4b,m4r,m4p,m4v',
            ]);

            if ($validator->fails()) {
                return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
            }

            $sunnah = Sunnah::findOrFail($id);

            if ($request->hasFile('gambar')) {
                // Hapus file lama
                $oldImagePath = public_path('uploads/gambar/' . $sunnah->gambar);
                if (File::exists($oldImagePath)) {
                    File::delete($oldImagePath);
                }
                
                $gambar = $request->file('gambar');
                $gambarName = time() . '_' . $gambar->getClientOriginalName();
                $gambar->move(public_path('uploads/gambar'), $gambarName);
                $sunnah->gambar = $gambarName;
            }

            if ($request->hasFile('audio_doa')) {
                // Hapus file audio lama jika ada
                if ($sunnah->audio_doa) {
                    $oldAudioPath = public_path('uploads/audio_doa/' . $sunnah->audio_doa);
                    if (File::exists($oldAudioPath)) {
                        File::delete($oldAudioPath);
                    }
                }
                
                $audio_doa = $request->file('audio_doa');
                $audio_doaName = time() . '_' . $audio_doa->getClientOriginalName();
                $audio_doa->move(public_path('uploads/audio_doa'), $audio_doaName);
                $sunnah->audio_doa = $audio_doaName;
            }

            $sunnah->update([
                'judul' => $request->judul,
                'deskripsi' => $request->deskripsi,
                'dalil' => $request->dalil,
                'kategori' => $request->kategori,
                'sumber' => $request->sumber,
                'doa' => $request->doa,
            ]);

            Alert::success('Berhasil', 'Data berhasil diperbarui');
            return redirect()->route('master-sunnah.index');
        } catch (\Exception $e) {
            Alert::error('Error', 'Terjadi kesalahan saat memperbarui data');
            return redirect()->back()->withInput();
        }
    }

    public function destroy($id)
    {
        try {
            $sunnah = Sunnah::findOrFail($id);
            
            // Hapus file gambar
            if ($sunnah->gambar) {
                $imagePath = public_path('uploads/gambar/' . $sunnah->gambar);
                if (File::exists($imagePath)) {
                    File::delete($imagePath);
                }
            }

            // Hapus file audio jika ada
            if ($sunnah->audio_doa) {
                $audioPath = public_path('uploads/audio_doa/' . $sunnah->audio_doa);
                if (File::exists($audioPath)) {
                    File::delete($audioPath);
                }
            }

            $sunnah->delete();

            Alert::success('Berhasil', 'Data berhasil dihapus');
            return redirect()->route('master-sunnah.index');
        } catch (\Exception $e) {
            Alert::error('Error', 'Terjadi kesalahan saat menghapus data');
            return redirect()->back();
        }
    }
}
