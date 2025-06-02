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

            Sunnah::create([
                'judul' => $request->judul,
                'deskripsi' => $request->deskripsi,
                'dalil' => $request->dalil,
                'kategori' => $request->kategori,
                'sumber' => $request->sumber,
                'gambar' => $gambarName,
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
                'sumber' => 'nullable|string',
                'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
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

            $sunnah->update([
                'judul' => $request->judul,
                'deskripsi' => $request->deskripsi,
                'dalil' => $request->dalil,
                'kategori' => $request->kategori,
                'sumber' => $request->sumber,
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
            $imagePath = public_path('uploads/gambar/' . $sunnah->gambar);
            if (File::exists($imagePath)) {
                File::delete($imagePath);
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
