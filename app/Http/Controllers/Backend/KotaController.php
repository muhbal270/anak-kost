<?php

namespace App\Http\Controllers\Backend;

use App\Models\Kota;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class KotaController extends Controller
{
    public function index()
    {
        $kotas = Kota::latest()->paginate(8);

        return view('backend.kota.index', compact('kotas'));
    }

    public function create()
    {
        return view('backend.kota.create');
    }

    public function edit($id)
    {
        $kota = Kota::findOrFail($id);
        return view('backend.kota.edit', compact('kota'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_kota' => 'required|string|unique:kotas,nama_kota',
            'gambar_kota' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ],
        [
            'nama_kota.required' => 'Nama kota harus diisi.',
            'nama_kota.unique' => 'Nama kota sudah ada.',
            'gambar_kota.required' => 'Gambar kota harus diunggah.',
            'gambar_kota.image' => 'File yang diunggah harus berupa gambar.',
            'gambar_kota.mimes' => 'Gambar harus berformat jpeg, png, jpg, gif, atau svg.',
            'gambar_kota.max' => 'Ukuran gambar maksimal 2MB.',
        ]);

        // Simpan gambar kota
        $image = $request->file('gambar_kota');
        $image_name = time() . '.' . $image->getClientOriginalExtension(); // menggunakan time untuk nama unik
        $image->move(public_path('storage/kota'), $image_name); // Pindahkan gambar ke direktori yang sesuai
        
        // Simpan data kota ke database
        Kota::create([
            'nama_kota' => $validated['nama_kota'],
            'gambar_kota' => $validated['gamabar_kota'] = $image_name,
            'slug' =>Str::slug($validated['nama_kota']),
        ]);

        if ($request) {
            flash()->success('Berhasil Menambahkan Kota Baru:' . $validated['nama_kota']);
            return redirect()->route('admin.kota.index');
        } else {
            flash()->error('Gagal Menambahkan Kota Baru');
            return redirect()->back();
        }
    }

    public function update(Request $request, Kota $kota)
    {
        $validated = $request->validate([
            'nama_kota' => 'required|string|unique:kotas,nama_kota,' . $kota->id,
            'gambar_kota' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ],
        [
            'nama_kota.required' => 'Nama kota harus diisi.',
            'nama_kota.unique' => 'Nama kota sudah ada.',
            'gambar_kota.image' => 'File yang diunggah harus berupa gambar.',
            'gambar_kota.mimes' => 'Gambar harus berformat jpeg, png, jpg, gif, atau svg.',
            'gambar_kota.max' => 'Ukuran gambar maksimal 2MB.',
        ]);
        
        $image_name = $kota->gambar_kota; // Tetap menggunakan gambar lama jika tidak ada gambar baru yang diunggah

        if ($request->hasFile('gambar_kota')) {
            // hapus gambar lama jika ada
            $image_path = public_path('storage/kota/' . $kota->gambar_kota);

            if (!empty($kota->gambar_kota) && file_exists($image_path) && is_file($image_path)) {
                unlink($image_path);
            }  // Jika gambar lama ada, hapus gambar lama

            // Simpan gambar kota baru
            $image = $request->file('gambar_kota');
            $image_name = time() . '.' . $image->getClientOriginalExtension(); // menggunakan time untuk nama unik
            $image->move(public_path('storage/kota'), $image_name); // Pindahkan gambar ke direktori yang sesuai
            $kota->gambar_kota = $image_name; // Update nama gambar

        }

        // Update data kota di database
        $updated = $kota->update([
            'nama_kota' => $validated['nama_kota'],
            'gambar_kota' => $image_name,
            'slug' => Str::slug($validated['nama_kota']),
        ]);

        if ($updated) {
            flash()->success('Berhasil Memperbarui Kota: ' . $validated['nama_kota']);
            return redirect()->route('admin.kota.index');
        } else {
            flash()->error('Gagal Memperbarui Kota');
            return redirect()->back();
        }
    }

    public function destroy(Kota $kota)
    {
        if (!empty($kota->gambar_kota)) {
            $image_path = public_path('storage/kota/' . $kota->gambar_kota);

            if (!empty($kota->gambar_kota) && file_exists($image_path) && is_file($image_path)) {
                unlink($image_path);
            }  // Jika gambar lama ada, hapus gambar lama
        }

        $deleted = $kota->delete();

        if ($deleted) {
            flash()->success('Berhasil Menghapus Kota: ' . $kota->nama_kota);
            return redirect()->route('admin.kota.index');
        } else {
            flash()->error('Gagal Menghapus Kota');
            return redirect()->back();
        }
    }
}
