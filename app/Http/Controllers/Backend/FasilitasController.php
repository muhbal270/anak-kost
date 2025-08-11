<?php

namespace App\Http\Controllers\Backend;

use App\Models\Fasilitas;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FasilitasController extends Controller
{
    public function index()
    {
        $fasilitas = Fasilitas::latest()->paginate(8);

        return view('backend.fasilitas.index', compact('fasilitas'));
    }

    public function create()
    {
        return view('backend.fasilitas.create');
    }

    public function edit(Fasilitas $fasilitas)
    {
        return view('backend.fasilitas.edit', compact('fasilitas'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_fasilitas' => 'required|string|max:255',
            'icon_fasilitas' => 'required|string|max:255',
        ],
        [
            'nama_fasilitas.required' => 'Nama fasilitas harus diisi !!!',
            'icon_fasilitas.required' => 'Icon fasilitas harus diisi !!!',
        ]);

        // Simpan data fasilitas ke database
        Fasilitas::create([
            'nama_fasilitas' => $validated['nama_fasilitas'],
            'icon_fasilitas' => $validated['icon_fasilitas'],
        ]);

        if ($request) {
            flash()->success('Berhasil Menambahkan Fasilitas Baru: ' . $validated['nama_fasilitas']);
            return redirect()->route('admin.fasilitas.index');
        } else {
            flash()->error('Gagal Menambahkan Fasilitas Baru !!!');
            return redirect()->back();
        }
    }

    public function update(Request $request, Fasilitas $fasilitas)
    {
        $validated = $request->validate([
            'nama_fasilitas' => 'required|string|max:255',
            'icon_fasilitas' => 'required|string|max:255',
        ],
        [
            'nama_fasilitas.required' => 'Nama fasilitas harus diisi !!!',
            'icon_fasilitas.required' => 'Icon fasilitas harus diisi !!!',
        ]);

        // Update data fasilitas
        $fasilitas->update([
            'nama_fasilitas' => $validated['nama_fasilitas'],
            'icon_fasilitas' => $validated['icon_fasilitas'],
        ]);

        if ($request) {
            flash()->success('Berhasil Memperbarui Fasilitas: ' . $validated['nama_fasilitas']);
            return redirect()->route('admin.fasilitas.index');
        } else {
            flash()->error('Gagal Memperbarui Fasilitas !!!');
            return redirect()->back();
        }
    }

    public function destroy(Fasilitas $fasilitas)
    {
        $nama = $fasilitas->nama_fasilitas;
        $fasilitas->delete();

        if ($fasilitas) {
            flash()->success('Berhasil Menghapus Fasilitas: ' . $nama);
            return redirect()->route('admin.fasilitas.index');
        } else {
            flash()->error('Gagal Menghapus Fasilitas !!!');
            return redirect()->back();
        }
    }
}
