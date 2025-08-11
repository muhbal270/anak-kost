<?php

namespace App\Http\Controllers\Frontend;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login ()
    {
        return view('frontend.auth.login');
    }

    public function register()
    {
        return view('frontend.auth.register');
    }

    public function login_post(Request $request)
    {
        // validasi input
        $validator = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8',
        ], [
            'email.required' => 'Email Tidak Boleh Kosong !!!',
            'email.email' => 'Format Email Tidak Valid !!!',
            'password.required' => 'Password Tidak Boleh Kosong !!!',
            'password.min' => 'Password Minimal 8 Karakter !!!',
        ]
        );

        // proses login
        if (!Auth::attempt($validator)) {
            flash()->error('Login Gagal ! Periksa Kembali Email dan Password Anda !!!');
            return redirect()->back();
        }

        // regenerate session untuk keamanan
        $request->session()->regenerate();

        // ambil data user yang login
        $user = Auth::user();

        // cek role
        if ($user->role === 'admin') {
            flash()->success('Login Berhasil ! Selamat Datang Admin ' . $user->name . ' !!!');
            // redirect ke halaman dashboard admin
            return redirect()->route('admin.dashboard');
        }

        flash()->success('Login Berhasil ! Selamat Datang ' . $user->name . ' !!!');
        // redirect ke halaman home
        return redirect()->route('home');
    }

    public function register_post(Request $request)
    {
        $validator = $request->validate([
            'name' => 'required|string|max:255',
            'whatsapp' => 'required|numeric|unique:users,whatsapp',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
        ], [
            'name.required' => 'Nama Tidak Boleh Kosong !!!',
            'whatsapp.required' => 'Nomor WhatsApp Tidak Boleh Kosong !!!',
            'whatsapp.numeric' => 'Nomor WhatsApp Harus Angka !!!',
            'whatsapp.unique' => 'Nomor WhatsApp Sudah Terdaftar !!!',
            'email.required' => 'Email Tidak Boleh Kosong !!!',
            'email.email' => 'Format Email Tidak Valid !!!',
            'email.unique' => 'Email Sudah Terdaftar !!!',
            'password.required' => 'Password Tidak Boleh Kosong !!!',
            'password.min' => 'Password Minimal 8 Karakter !!!',
        ]);

        // dd($validator);

        // buat user baru
        $user = User::create([
            'name' => $validator['name'],
            'whatsapp' => $validator['whatsapp'],
            'email' => $validator['email'],
            'password' => Hash::make($validator['password']),
        ]);

        // proses setelah registrasi
        if ($user) {
            flash()->success('Registrasi Berhasil ! Silahkan Login !!!');
            return redirect()->route('login');
        } else {
            flash()->error('Registrasi Gagal ! Silahkan Coba Lagi !!!');
            return redirect()->back();
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();

        //hapus semua data session saat user logout
        $request->session()->invalidate();

        // regenerate session untuk keamanan
        $request->session()->regenerateToken();

        // tampilkan pesan sukses logout dan arahkan kehalaman utama
        flash()->success('Berhasil Logout ! Terima Kasih !!!');
        return redirect()->route('home');
    }
}
