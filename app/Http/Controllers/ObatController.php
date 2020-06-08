<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class ObatController extends Controller
{
    public function index(Request $request) {
        if (!Session::get('login')) {
            return redirect('/')->with(['error' => 'Anda harus login terlebih dahulu !']);
        } else {
            $data['title'] = 'Brawijaya E-Clinic | Obat';
            $data['welcome_title'] = 'Halaman Admin Data Obat';
            $data['menu'] = 'obat_active';
            $data['breadcrumb'] = 'Data Obat';

            $keyword = $request->input('keywords');

            if ($keyword != "") {
                $data['obat'] = DB::table('obat')->where('nama', 'like', '%' .$keyword. '%')->orderBy('id', 'asc')->paginate(10);
            } else {
                $data['obat'] = DB::table('obat')->orderBy('id', 'asc')->paginate(10);
            }

            return view('Obat', $data);
        }
    }

    public function detail($id) {
        $data['title'] = 'Brawijaya E-Clinic | Obat';
        $data['welcome_title'] = 'Halaman Admin Detail Obat';
        $data['menu'] = 'obat_active';
        $data['breadcrumb'] = 'Detail Obat';

        $data['obat'] = DB::table('obat')->where('id', $id)->get();

        return view('Detail_obat', $data);
    }

    public function add() {
        $data['title'] = 'Brawijaya E-Clinic | Obat';
        $data['welcome_title'] = 'Halaman Admin Tambah Obat';
        $data['menu'] = 'obat_active';
        $data['breadcrumb'] = 'Tambah Obat';

        return view('Add_obat', $data);
    }

    public function save(Request $request) {
        $method = $request->method();

        if($method == 'POST') {
            $direktori = 'assets/foto_obat';
            $file = $request->file('foto');
            $file->move($direktori, $file->getClientOriginalName());

            DB::table('obat')->insert([
                'nama' => $request->input('nama'),
                'foto' => $direktori."/".$file->getClientOriginalName(),
                'kegunaan' => $request->input('kegunaan'),
                'dosis' => $request->input('dosis'),
                'efek_samping' => $request->input('efek'),
                'peringatan' => $request->input('peringatan'),
                'keterangan' => $request->input('keterangan')
            ]);

            return redirect('/obat')->with(['success' => 'Data berhasil disimpan !']);
        } else {
            return redirect('/obat/add')->with(['error' => 'Data gagal disimpan !']);
        }
    }

    public function edit($id) {
        $data['title'] = 'Brawijaya E-Clinic | Obat';
        $data['welcome_title'] = 'Halaman Admin Edit Obat';
        $data['menu'] = 'obat_active';
        $data['breadcrumb'] = 'Edit Obat';

        $data['obat'] = DB::table('obat')->where('id', $id)->get();

        return view('Edit_obat', $data);
    }

    public function update(Request $request) {
        $method = $request->method();
        $id = $request->input('id');

        if($method == 'POST') {
            $direktori = 'assets/foto_obat';
            $file = $request->file('foto');
            $file->move($direktori, $file->getClientOriginalName());

            DB::table('obat')->where('id', $id)->update([
                'nama' => $request->input('nama'),
                'foto' => $direktori."/".$file->getClientOriginalName(),
                'kegunaan' => $request->input('kegunaan'),
                'dosis' => $request->input('dosis'),
                'efek_samping' => $request->input('efek'),
                'peringatan' => $request->input('peringatan'),
                'keterangan' => $request->input('keterangan')
            ]);

            return redirect('/obat')->with(['success' => 'Data berhasil diupdate !']);
        } else {
            return redirect('/obat/edit/' .$id)->with(['error' => 'Data gagal diupdate !']);
        }
    }

    public function delete($id) {
        DB::table('obat')->where('id', $id)->delete();

        return redirect('/obat')->with(['success' => 'Data berhasil dihapus !']);
    }
}
