<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class JadwalController extends Controller
{
    public function index(request $request) {
        if (!Session::get('login')) {
            return redirect('/')->with(['error' => 'Anda harus login terlebih dahulu !']);
        } else {
            $data['title'] = 'Brawijaya E-Clinic | Jadwal Praktik';
            $data['welcome_title'] = 'Halaman Admin Jadwal Praktik Dokter';
            $data['menu'] = 'jadwal_active';
            $data['breadcrumb'] = 'Jadwal Praktik';

            $keyword = $request->input('keywords');

            if ($keyword != "") {
                $data['jadwal'] = DB::table('jadwal as j')
                                    ->join('dokter as d', 'j.id_dokter', '=', 'd.id')
                                    ->select('j.id', 'j.hari', 'j.jam', 'd.nama', 'd.gelar_depan', 'd.gelar_belakang')
                                    ->where('d.nama', 'like', '%' .$keyword. '%')
                                    ->orderBy('d.id', 'asc')
                                    ->paginate(10);
            } else {
                $data['jadwal'] = DB::table('jadwal as j')
                                    ->join('dokter as d', 'j.id_dokter', '=', 'd.id')
                                    ->select('j.id', 'j.hari', 'j.jam', 'd.nama', 'd.gelar_depan', 'd.gelar_belakang')
                                    ->orderBy('d.id', 'asc')
                                    ->paginate(10);
            }

            return view('Jadwal', $data);
        }
    }

    public function add() {
        $data['title'] = 'Brawijaya E-Clinic | Jadwal Praktik';
        $data['welcome_title'] = 'Halaman Tambah Jadwal Praktik';
        $data['menu'] = 'jadwal_active';
        $data['breadcrumb'] = 'Tambah Jadwal Praktik';

        $data['poli'] = DB::table('poli')->orderBy('id', 'asc')->get();

        return view('Add_jadwal', $data);
    }

    public function get_dokter($id) {
        $dokter = DB::table('dokter')->where('id_poli', $id)->get();

        return response()->json(['dokter' => $dokter], 200);
    }

    public function save(request $request) {
        $method = $request->method();

        if ($method == 'POST') {
            DB::table('jadwal')->insert([
                'id_dokter' => $request->input('dokter'),
                'hari' => $request->input('hari'),
                'jam' => $request->input('jam')
            ]);

            return redirect('/jadwal')->with(['success' => 'Data berhasil disimpan !']);
        } else {
            return redirect('/jadwal/add')->with(['error' => 'Data gagal disimpan !']);
        }
    }

    public function edit($id) {
        $data['title'] = 'Brawijaya E-Clinic | Jadwal Praktik';
        $data['welcome_title'] = 'Halaman Edit Jadwal Praktik';
        $data['menu'] = 'jadwal_active';
        $data['breadcrumb'] = 'Edit Jadwal Praktik';

        $data['jadwal'] = DB::table('jadwal as j')
                            ->where('j.id', $id)
                            ->join('dokter as d', 'j.id_dokter', '=', 'd.id')
                            ->join('poli as p', 'p.id', '=', 'd.id_poli')
                            ->select('j.id', 'j.hari', 'j.jam', 'd.nama as nama_dokter', 'd.gelar_depan', 'd.gelar_belakang', 'p.nama as poli')
                            ->orderBy('j.id', 'asc')
                            ->get();

        return view('Edit_jadwal', $data);
    }

    public function update(Request $request) {
        $method = $request->method();
        $id = $request->input('id');

        if ($method == 'POST') {
            DB::table('jadwal')->where('id', $id)->update([
                'hari' => $request->input('hari'),
                'jam' => $request->input('jam')
            ]);

            return redirect('/jadwal')->with(['success' => 'Data berhasil diubah !']);
        } else {
            return redirect('/jadwal/edit/' .$id)->with(['error' => 'Data gagal diubah !']);
        }

    }

    public function delete($id) {
        DB::table('jadwal')->where('id', $id)->delete();

        return redirect('/jadwal')->with(['success' => 'Data berhasil dihapus !']);
    }
}
