<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class DokterController extends Controller
{
    public function index(Request $request) {
        if (!Session::get('login')) {
            return redirect('/')->with(['error' => 'Anda harus login terlebih dahulu !']);
        } else {
            $data['title'] = 'Brawijaya E-Clinic | Dokter';
            $data['welcome_title'] = 'Halaman Admin Dokter';
            $data['menu'] = 'dokter_active';
            $data['breadcrumb'] = 'Dokter';

            $keyword = $request->input('keywords');

            if ($keyword != "") {
                $data['dokter'] = DB::table('dokter as d')
                                    ->join('poli as p', 'd.id_poli', '=', 'p.id')
                                    ->where('d.nama', 'like', '%' .$keyword. '%')
                                    ->orderBy('d.id', 'asc')
                                    ->select('d.id', 'd.nama as nama_dokter', 'd.foto', 'd.gelar_depan', 'd.gelar_belakang', 'd.gender','p.nama as nama_poli')
                                    ->paginate(10);
            } else {
                $data['dokter'] = DB::table('dokter as d')
                                    ->join('poli as p', 'd.id_poli', '=', 'p.id')
                                    ->orderBy('d.id', 'asc')
                                    ->select('d.id', 'd.nama as nama_dokter', 'd.foto', 'd.gelar_depan', 'd.gelar_belakang', 'd.gender','p.nama as nama_poli')
                                    ->paginate(10);
            }

            return view('Dokter', $data);
        }
    }

    public function add() {
        $data['title'] = 'Brawijaya E-Clinic | Dokter';
        $data['welcome_title'] = 'Halaman Tambah Dokter';
        $data['menu'] = 'dokter_active';
        $data['breadcrumb'] = 'Tambah Dokter';

        $data['poli'] = DB::table('poli')
                            ->orderBy('id', 'asc')
                            ->get();

        return view('Add_dokter', $data);
    }

    public function save(Request $request) {
        $method = $request->method();

        if ($method == 'POST') {
            $direktori = 'assets/foto_obat';
            $file = $request->file('foto');
            $file->move($direktori, $file->getClientOriginalName());

            DB::table('dokter')->insert([
                'id_poli' => $request->input('poli'),
                'foto' => $direktori."/".$file->getClientOriginalName(),
                'nama' => $request->input('nama_dokter'),
                'gelar_depan' => $request->input('gelar_depan'),
                'gelar_belakang' => $request->input('gelar_belakang'),
                'gender' => $request->input('gender')
            ]);

            return redirect('/dokter')->with(['success' => 'Data berhasil disimpan !']);
        } else {
            return redirect('/dokter/add')->with(['error' => 'Data gagal disimpan !']);
        }
    }

    public function edit($id) {
        $data['title'] = 'Brawijaya E-Clinic | Dokter';
        $data['welcome_title'] = 'Halaman Edit Dokter';
        $data['menu'] = 'dokter_active';
        $data['breadcrumb'] = 'Edit Dokter';

        $data['dokter'] = DB::table('dokter')
                            ->where('id', $id)
                            ->get();

        $data['poli'] = DB::table('poli')
                            ->orderBy('id', 'asc')
                            ->get();

        return view('Edit_dokter', $data);
    }

    public function update(Request $request) {
        $method = $request->method();
        $id = $request->id;

        if($method == 'POST') {
            $direktori = 'assets/foto_obat';
            $file = $request->file('foto');
            $file->move($direktori, $file->getClientOriginalName());

            DB::table('dokter')->where('id', $id)->update([
                'id_poli' => $request->input('poli'),
                'foto' => $direktori."/".$file->getClientOriginalName(),
                'nama' => $request->input('nama_dokter'),
                'gelar_depan' => $request->input('gelar_depan'),
                'gelar_belakang' => $request->input('gelar_belakang'),
                'gender' => $request->input('gender')
            ]);

            return redirect('/dokter')->with(['success' => 'Data berhasil diubah !']);
        } else {
            return redirect('/dokter/edit/' .$id)->with(['error' => 'Data gagal diubah !']);
        }
    }

    public function delete($id) {
        DB::table('dokter')->where('id', $id)->delete();

        return redirect('/dokter')->with(['success' => 'Data berhasil dihapus !']);
    }
}
