<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AntrianController extends Controller
{
    public function index() {
        if(!Session::get('login')) {
            return redirect('/')->with(['error' => 'Anda harus login terlebih dahulu !']);
        } else {
            $data['title'] = 'Brawijaya E-Clinic | Antrian';
            $data['welcome_title'] = 'Halaman Admin Antrian';
            $data['menu'] = 'antrian_active';
            $data['breadcrumb'] = 'Antrian';

            $data['pending'] = DB::table('antrian as a')
                                ->join('user as u', 'u.id', '=', 'a.id_user')
                                ->join('dokter as d', 'd.id', '=', 'a.id_dokter')
                                ->where('a.status', 'pending')
                                ->orderBy('a.id', 'desc')
                                ->select('a.id', 'a.tanggal', 'u.nama_depan as unama_depan', 'u.nama_belakang as unama_belakang',
                                'd.gelar_depan', 'd.gelar_belakang', 'd.nama as nama_dokter')
                                ->paginate(10);

            $data['success'] = DB::table('antrian as a')
                                ->join('user as u', 'u.id', '=', 'a.id_user')
                                ->join('dokter as d', 'd.id', '=', 'a.id_dokter')
                                ->where('a.status', 'success')
                                ->orderBy('a.id', 'desc')
                                ->select('a.id', 'a.tanggal', 'a.no_antrian', 'u.nama_depan as unama_depan', 'u.nama_belakang as unama_belakang',
                                'd.gelar_depan', 'd.gelar_belakang', 'd.nama as nama_dokter')
                                ->paginate(10);

            return view('Antrian', $data);
        }
    }

    public function detail($id) {
        $data['title'] = 'Brawijaya E-Clinic | Antrian';
        $data['welcome_title'] = 'Halaman Admin Antrian';
        $data['menu'] = 'antrian_active';
        $data['breadcrumb'] = 'Antrian';

        $data['pending'] = DB::table('antrian as a')
                            ->join('user as u', 'u.id', '=', 'a.id_user')
                            ->join('v_jadwal_poli as d', 'd.id', '=', 'a.id_dokter')
                            ->where('a.id', $id)
                            ->select('a.id', 'a.tanggal', 'a.status', 'u.nim', 'u.nama_depan as unama_depan', 'u.nama_belakang as unama_belakang',
                            'd.id as id_dokter', 'd.gelar_depan', 'd.gelar_belakang', 'd.nama_dokter', 'd.poli', 'd.hari', 'd.jam')
                            ->paginate(10);

        foreach ($data['pending'] as $dataa) {
            $data['id_antrian'] = $dataa->id;
            $data['tanggal'] = $dataa->tanggal;
            $data['status'] = $dataa->status;
            $data['nim'] = $dataa->nim;
            $data['nama_depan'] = $dataa->unama_depan;
            $data['nama_belakang'] = $dataa->unama_belakang;
            $data['id_dokter'] = $dataa->id_dokter;
            $data['gelar_depan'] = $dataa->gelar_depan;
            $data['gelar_belakang'] = $dataa->gelar_belakang;
            $data['nama_dokter'] = $dataa->nama_dokter;
            $data['poli'] = $dataa->poli;
            $data['hari'] = $dataa->hari;
            $data['jam'] = $dataa->jam;
        }

        $data['jumlahpasien'] = DB::table('antrian')
                                    ->where([
                                        ['id_dokter', $data['id_dokter']],
                                        ['tanggal', $data['tanggal']],
                                        ['status', 'success']
                                    ])
                                    ->count();

        return view('Detail_antrian', $data);
    }

    public function update(Request $request) {
        $id = $request->input('id');
        $nomor = $request->input('noantrian');

        $sql = DB::table('antrian')->where('id', $id)
                ->update([
                    'no_antrian' => $nomor,
                    'status' => 'success',
                ]);

        if($sql) {
            return redirect('/antrian')->with(['success' => 'Data antrian berhasil diupdate !']);
        } else {
            return redirect('/antrian/detail/' .$id)->with(['error' => 'Gagal mengupdate data !']);
        }
    }

    public function delete($id) {
        $sql = DB::table('antrian')->where('id', $id)->delete();

        if($sql) {
            return redirect('/antrian')->with(['success' => 'Data antrian berhasil dihapus !']);
        } else {
            return redirect('/antrian/detail/' .$id)->with(['error' => 'Gagal menghapus data !']);
        }
    }
}
