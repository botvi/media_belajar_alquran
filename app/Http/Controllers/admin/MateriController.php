<?php

namespace App\Http\Controllers\admin;

use App\Models\Materi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class MateriController extends Controller
{
    /**
     * Menampilkan daftar materi
     */
    public function index()
    {
        try {
            $materi = Materi::latest()->paginate(10);
            return view('pageadmin.master_materi.index', compact('materi'));
        } catch (\Exception $e) {
            Alert::error('Error', 'Terjadi kesalahan saat mengambil data: ' . $e->getMessage());
            return redirect()->back();
        }
    }

    /**
     * Menampilkan form pembuatan materi baru
     */
    public function create()
    {
        return view('pageadmin.master_materi.create');
    }

    /**
     * Menyimpan data materi baru
     */
    public function store(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'judul' => 'required|string|max:255|unique:materis,judul',
                'konten' => 'required|string|min:10',
            ], [
                'judul.required' => 'Judul materi harus diisi',
                'judul.unique' => 'Judul materi sudah ada',
                'konten.required' => 'Konten materi harus diisi',
                'konten.min' => 'Konten materi minimal 10 karakter'
            ]);

            if ($validator->fails()) {
                return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
            }

            $materi = Materi::create([
                'judul' => $request->judul,
                'konten' => $request->konten,
            ]);

            Alert::success('Berhasil', 'Data materi berhasil disimpan');
            return redirect()->route('master-materi.index');
        } catch (\Exception $e) {
            Alert::error('Error', 'Terjadi kesalahan saat menyimpan data: ' . $e->getMessage());
            return redirect()->back()->withInput();
        }
    }

    /**
     * Menampilkan form edit materi
     */
    public function edit($id)
    {
        try {
            $materi = Materi::findOrFail($id);
            return view('pageadmin.master_materi.edit', compact('materi'));
        } catch (\Exception $e) {
            Alert::error('Error', 'Data materi tidak ditemukan');
            return redirect()->route('master-materi.index');
        }
    }

    /**
     * Memperbarui data materi
     */
    public function update(Request $request, $id)
    {
        try {
            $validator = Validator::make($request->all(), [
                'judul' => 'required|string|max:255|unique:materis,judul,' . $id,
                'konten' => 'required|string|min:10',
            ], [
                'judul.required' => 'Judul materi harus diisi',
                'judul.unique' => 'Judul materi sudah ada',
                'konten.required' => 'Konten materi harus diisi',
                'konten.min' => 'Konten materi minimal 10 karakter'
            ]);

            if ($validator->fails()) {
                return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
            }

            $materi = Materi::findOrFail($id);
            $materi->update([
                'judul' => $request->judul,
                'konten' => $request->konten,
            ]);

            Alert::success('Berhasil', 'Data materi berhasil diperbarui');
            return redirect()->route('master-materi.index');
        } catch (\Exception $e) {
            Alert::error('Error', 'Terjadi kesalahan saat memperbarui data: ' . $e->getMessage());
            return redirect()->back()->withInput();
        }
    }

    /**
     * Menghapus data materi
     */
    public function destroy($id)
    {
        try {
            $materi = Materi::findOrFail($id);
            $materi->delete();

            Alert::success('Berhasil', 'Data materi berhasil dihapus');
            return redirect()->route('master-materi.index');
        } catch (\Exception $e) {
            Alert::error('Error', 'Terjadi kesalahan saat menghapus data: ' . $e->getMessage());
            return redirect()->back();
        }
    }

    public function show($id)
    {
        $materi = Materi::findOrFail($id);
        return view('pageadmin.master_materi.show', compact('materi'));
    }
}
