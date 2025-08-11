<?php

namespace App\Http\Controllers\Backend;

use App\Models\Kost;
use App\Models\Kota;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class KostController extends Controller
{
    public function index()
    {
        $kosts = Kost::with('kota')->latest()->get();

        return view('backend.kost.index', compact('kosts'));
    }

    public function create()
    {
        $kotas = Kota::latest()->get();

        return view('backend.kost.create', compact('kotas'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'kota_id' => 'required|exists:kotas,id',
            'nama_kost' => 'required|string|max:255',
            'gambar_kost1' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'gambar_kost2' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'gambar_kost3' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'alamat' => 'required|string|max:255',
            'map' => 'required|string',
            'harga' => 'required|numeric|min:0',
            'jumlah_kamar' => 'required|integer|min:1',
            'deskripsi' => 'nullable|string',
        ],
        [
            'kota_id.required' => 'Kota harus dipilih.',
            'nama_kost.required' => 'Nama kost harus diisi.',
            'gambar_kost1.required' => 'Gambar kost 1 harus diunggah.',
            'gambar_kost1.image' => 'File yang diunggah harus berupa gambar.',
            'gambar_kost1.mimes' => 'Gambar harus berformat jpeg, png, jpg, gif, atau svg.',
            'gambar_kost1.max' => 'Ukuran gambar maksimal 2MB.',
            'alamat.required' => 'Alamat kost harus diisi.',
            'map.required' => 'Peta lokasi kost harus diisi.',
            'harga.required' => 'Harga kost harus diisi.',
            'jumlah_kamar.required' => 'Jumlah kamar kost harus diisi.',
        ]);

        // buat slug dari nama kost
        $slug = Str::slug($validated['nama_kost']);
        if (Kost::where('slug', $slug)->exists()) {
            $slug .= '-' . time(); // tambahkan timestamp jika slug sudah ada
        }

        $validated['slug'] = $slug;

        // proses upload gambar
        foreach (['gambar_kost1', 'gambar_kost2', 'gambar_kost3'] as $imageField) {
            if ($request->hasFile($imageField)) {
                $image = $request->file($imageField);
                $imageName = time() . '_' . $imageField . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('storage/kost'), $imageName);
                $validated[$imageField] = $imageName;
            } else {
                $validated[$imageField] = null; // jika tidak ada gambar, set null
            }
        }

        // Simpan data kost ke database
        Kost::create($validated);

        if ($request) {
            flash()->success('Berhasil Menambahkan Kost Baru: ' . $validated['nama_kost']);
            return redirect()->route('admin.kost.index');
        } else {
            flash()->error('Gagal Menambahkan Kost Baru !!!');
            return redirect()->back();
        }
    }
}
