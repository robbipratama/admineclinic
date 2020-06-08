<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class PoliController extends Controller
{
    public function index(Request $request) {
        if (!Session::get('login')) {
            return redirect('/')->with(['error' => 'Anda harus login terlebih dahulu !']);
        } else {
            $data['title'] = 'Brawijaya E-Clinic | Poli';
            $data['welcome_title'] = 'Halaman Admin Data Poli';
            $data['menu'] = 'poli_active';
            $data['breadcrumb'] = 'Data Poli';

            $keyword = $request->input('keywords');

            if ($keyword != "") {
                $data['poli'] = DB::table('poli')
                                    ->where('nama', 'like', '%' .$keyword. '%')
                                    ->orderBy('id', 'asc')
                                    ->paginate(10);
            } else {
                $data['poli'] = DB::table('poli')
                                    ->orderBy('id', 'asc')
                                    ->paginate(10);
            }

            return view('Poli', $data);
        }
    }

    public function add() {
        $data['title'] = 'Brawijaya E-Clinic | Poli';
        $data['welcome_title'] = 'Halaman Admin Tambah Poli';
        $data['menu'] = 'poli_active';
        $data['breadcrumb'] = 'Tambah Poli';

        return view('Add_poli', $data);
    }

    public function save(Request $request) {
        $method = $request->method();

        if ($method == 'POST') {
            DB::table('poli')->insert([
                'nama' => $request->input('poli')
            ]);

            return redirect('/poli')->with(['success' => 'Data berhasil disimpan !']);
        } else {
            return redirect('/poli/add')->with(['error' => 'Data gagal disimpan !']);
        }
    }

    public function edit($id) {
        $data['title'] = 'Brawijaya E-Clinic | Poli';
        $data['welcome_title'] = 'Halaman Admin Edit Poli';
        $data['menu'] = 'poli_active';
        $data['breadcrumb'] = 'Edit Poli';

        $data['poli'] = DB::table('poli')
                            ->where('id', $id)
                            ->get();

        return view('Edit_poli', $data);
    }

    public function update(Request $request) {
        $method = $request->method();
        $id = $request->input('id');

        if ($method == 'POST') {
            DB::table('poli')->where('id', $id)->update([
                'nama' => $request->input('poli')
            ]);

            return redirect('/poli')->with(['success' => 'Data berhasil diubah !']);
        } else {
            return redirect('/poli/edit/' .$id)->with(['error' => 'Data gagal diubah !']);
        }
    }

    public function delete($id) {
        DB::table('poli')->where('id', $id)->delete();

        return redirect('/poli')->with(['success' => 'Data berhasil dihapus !']);
    }
}
