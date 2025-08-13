<?php

namespace App\Http\Controllers\Backend;

use App\Models\Kost;
use App\Models\Fasilitas;
use App\Models\KostFasilitas;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class KostFasilitasController extends Controller
{
    public function index()
    {
        $kostFasilitas = Kost::with('fasilitas')->get(); // Mengambil semua kost beserta fasilitasnya

        return view('backend.kost_fasilitas.index', compact('kostFasilitas'));
    }

    public function create()
    {
        $kosts = Kost::all();

        $fasilitas = Fasilitas::all();

        return view('backend.kost_fasilitas.create', compact('kosts', 'fasilitas'));
    }

    public function edit($id)
    {
        $kostFasilitas = Kost::with('fasilitas')->findOrFail($id); // Mengambil kost beserta fasilitasnya berdasarkan ID

        $kosts = Kost::all(); // Mengambil semua kost untuk dropdown

        $fasilitas = Fasilitas::all(); // Mengambil semua fasilitas untuk dropdown

        return view('backend.kost_fasilitas.edit', compact('kostFasilitas', 'kosts', 'fasilitas'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'kost_id' => 'required|exists:kosts,id',
            'fasilitas_id' => 'required|array|exists:fasilitas,id',
        ],
        [
            'kost_id.required' => 'Kost harus dipilih.',
            'kost_id.exists' => 'Kost yang dipilih tidak valid.',
            'fasilitas_id.required' => 'Fasilitas harus dipilih.',
            'fasilitas_id.array' => 'Fasilitas harus berupa array.',
            'fasilitas_id.exists' => 'Salah satu fasilitas yang dipilih tidak valid.',
        ]);

        $kost = Kost::findOrFail($validated['kost_id']); // Mengambil model Kost berdasarkan ID yang divalidasi

        $kost->fasilitas()->attach($validated['fasilitas_id']); // Menambahkan fasilitas ke kost

        if ($request) {
            flash()->success('Fasilitas berhasil ditambahkan ke kost.');
            return redirect()->route('admin.kost_fasilitas.index');
        } else {
            flash()->error('Gagal menambahkan fasilitas ke kost.');
            return redirect()->back();
        }
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'kost_id' => 'required|exists:kosts,id',
            'fasilitas_id' => 'required|array|exists:fasilitas,id',
        ],
        [
            'kost_id.required' => 'Kost harus dipilih.',
            'kost_id.exists' => 'Kost yang dipilih tidak valid.',
            'fasilitas_id.required' => 'Fasilitas harus dipilih.',
            'fasilitas_id.array' => 'Fasilitas harus berupa array.',
            'fasilitas_id.exists' => 'Salah satu fasilitas yang dipilih tidak valid.',
        ]);

        $kost = Kost::findOrFail($validated['kost_id']);

        // Menghapus semua fasilitas yang ada sebelumnya
        $kost->fasilitas()->detach();

        // Menambahkan fasilitas baru
        $kost->fasilitas()->attach($validated['fasilitas_id']);

        if ($request) {
            flash()->success('Fasilitas berhasil diperbarui untuk kost.');
            return redirect()->route('admin.kost_fasilitas.index');
        } else {
            flash()->error('Gagal memperbarui fasilitas untuk kost.');
            return redirect()->back();
        }
    }

    public function destroy($id)
    {
        $kostFasilitas = KostFasilitas::where('kost_id', $id)->delete();

        if ($kostFasilitas) {
            flash()->success('Kost dan fasilitasnya berhasil dihapus.');
            return redirect()->route('admin.kost_fasilitas.index');
        } else {
            flash()->error('Gagal menghapus kost dan fasilitasnya.');
            return redirect()->back();
        }
    }
}
