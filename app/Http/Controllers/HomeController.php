<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    public function index() {
        if (!Session::get('login')) {
            return redirect('/')->with(['error' => 'Anda harus login terlebih dahulu !']);
        } else {
            $data['title'] = 'Brawijaya E-Clinic | Dashboard';
            $data['welcome_title'] = 'Halaman Dashboard Admin';
            $data['menu'] = 'home_active';
            $data['breadcrumb'] = 'Home';

            $data['jumlahmember'] = DB::table('user')->count();
            $data['jumlahdokter'] = DB::table('dokter')->count();
            $data['jumlahpoli'] = DB::table('poli')->count();
            $data['jumlahjadwal'] = DB::table('jadwal')->count();

            return view('Dashboard', $data);
        }
    }
}
