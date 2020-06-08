<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index() {
        if(!Session::get('login')) {
            return redirect('/')->with(['error' => 'Anda harus login terlebih dahulu !']);
        } else {
            $data['title'] = 'Brawijaya E-Clinic | Data Admin';
            $data['welcome_title'] = 'Halaman Data Admin';
            $data['menu'] = 'admin_active';
            $data['breadcrumb'] = 'Data Admin';

            $data['admin'] = DB::table('admin')
                                ->where('level', '2')
                                ->orderBy('id', 'desc')
                                ->get();

            return view('AdminData', $data);
        }
    }

    public function delete($id) {
        DB::table('admin')->where('id', $id)->delete();

        return redirect('/data-admin')->with(['success' => 'Data berhasil dihapus !']);
    }
}
