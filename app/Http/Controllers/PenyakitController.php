<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class PenyakitController extends Controller
{
    public function index(Request $request) {
        if (!Session::get('login')) {
            return redirect('/')->with(['error' => 'Anda harus login terlebih dahulu !']);
        } else {
            $data['title'] = 'Brawijaya E-Clinic | Penyakit';
            $data['welcome_title'] = 'Halaman Admin Data Penyakit';
            $data['menu'] = 'penyakit_active';
            $data['breadcrumb'] = 'Data Penyakit';

            $data['kategori'] = DB::table('kategori_penyakit')->orderBy('nama', 'asc')->get();

            $keyword = $request->input('keywords');

            if ($keyword != "") {
                $data['penyakit'] = DB::table('penyakit')->where('nama', 'like', '%' .$keyword. '%')->orderBy('nama', 'asc')->paginate(10);
            } else {
                $data['penyakit'] = DB::table('penyakit')->orderBy('nama', 'asc')->paginate(10);
            }

            return view('Penyakit', $data);
        }
    }

    public function add_category() {
        $data['title'] = 'Brawijaya E-Clinic | Penyakit';
        $data['welcome_title'] = 'Halaman Admin Kategori Penyakit';
        $data['menu'] = 'penyakit_active';
        $data['breadcrumb'] = 'Kategori Penyakit';

        return view('Add_kat_penyakit', $data);
    }

    public function save_category(Request $request) {
        $method = $request->method();

        if($method == 'POST') {
            DB::table('kategori_penyakit')->insert([
                'nama' => $request->input('kategori')
            ]);

            return redirect('/penyakit')->with(['success' => 'Data berhasil disimpan !']);
        } else {
            return redirect('/penyakit/kat/add')->with(['error' => 'Data gagal disimpan !']);
        }
    }

    public function edit_category($id) {
        $data['title'] = 'Brawijaya E-Clinic | Penyakit';
        $data['welcome_title'] = 'Halaman Admin Kategori Penyakit';
        $data['menu'] = 'penyakit_active';
        $data['breadcrumb'] = 'Kategori Penyakit';

        $data['kategori'] = DB::table('kategori_penyakit')->where('id', $id)->get();

        return view('Edit_kat_penyakit', $data);
    }

    public function update_category(Request $request) {
        $method = $request->method();
        $id = $request->input('id');
        $kategori = $request->input('kategori');

        if($method == 'POST') {
            DB::table('kategori_penyakit')->where('id', $id)->update([
                'nama' => $kategori
            ]);

            return redirect('/penyakit')->with(['success' => 'Data berhasil diubah !']);
        } else {
            return redirect('/penyakit/kat/edit/' .$id)->with(['error' => 'Data gagal diubah !']);
        }

    }

    public function delete_category($id) {
        DB::table('kategori_penyakit')->where('id', $id)->delete();

        return redirect('/penyakit')->with(['success' => 'Data berhasil dihapus !']);
    }

    public function add() {
        $data['title'] = 'Brawijaya E-Clinic | Penyakit';
        $data['welcome_title'] = 'Halaman Admin Tambah Penyakit';
        $data['menu'] = 'penyakit_active';
        $data['breadcrumb'] = 'Tambah Penyakit';

        $data['kategori'] = DB::table('kategori_penyakit')->orderBy('id', 'asc')->get();

        return view('Add_penyakit', $data);
    }

    public function save(Request $request) {
        $method = $request->method();

        if($method == 'POST') {
            $direktori = 'assets/foto_penyakit';
            $file = $request->file('foto_penyakit');
            $file->move($direktori, $file->getClientOriginalName());

            DB::table('penyakit')->insert([
                'nama' => $request->input('nama'),
                'foto_penyakit' => $direktori."/".$file->getClientOriginalName(),
                'id_kategori'=> $request->input('kategori'),
                'deskripsi' => $request->input('deskripsi'),
                'penyebab' => $request->input('penyebab'),
                'gejala' => $request->input('gejala'),
                'pengobatan' => $request->input('pengobatan'),
                'pencegahan' => $request->input('pencegahan')
            ]);

            return redirect('/penyakit')->with(['success' => 'Data berhasil disimpan !']);
        } else {
            return redirect('/penyakit/add')->with(['error' => 'Data gagal disimpan !']);
        }
    }

    public function detail($id) {
        $data['title'] = 'Brawijaya E-Clinic | Penyakit';
        $data['welcome_title'] = 'Halaman Admin Detail Penyakit';
        $data['menu'] = 'penyakit_active';
        $data['breadcrumb'] = 'Detail Penyakit';

        $data['penyakit'] = DB::table('penyakit as p')
                                ->where('p.id', $id)
                                ->join('kategori_penyakit as k', 'p.id_kategori', '=', 'k.id')
                                ->select('p.id', 'p.nama as nama_penyakit', 'p.foto_penyakit', 'k.nama as kategori', 'p.deskripsi', 'p.penyebab', 'p.gejala', 'p.pengobatan', 'p.pencegahan')
                                ->get();

        return view('Detail_penyakit', $data);
    }

    public function edit($id) {
        $data['title'] = 'Brawijaya E-Clinic | Penyakit';
        $data['welcome_title'] = 'Halaman Admin Edit Penyakit';
        $data['menu'] = 'penyakit_active';
        $data['breadcrumb'] = 'Edit Penyakit';

        $data['penyakit'] = DB::table('penyakit')->where('id', $id)->get();

        $data['kategori'] = DB::table('kategori_penyakit')->orderBy('id', 'asc')->get();

        return view('Edit_penyakit', $data);
    }

    // public function update(Request $request) {
    //     $method = $request->method();
    //     $id = $request->input('id');

    //     if($method == 'POST') {
    //         $direktori = 'assets/foto_penyakit';
    //         $file = $request->file('foto_penyakit');
    //         $file->move($direktori, $file->getClientOriginalName());

    //         DB::table('penyakit')->where('id', $id)->update([
    //             'nama' => $request->input('nama'),
    //             'foto_penyakit' => $direktori."/".$file->getClientOriginalName(),
    //             'id_kategori'=> $request->input('kategori'),
    //             'deskripsi' => $request->input('deskripsi'),
    //             'penyebab' => $request->input('penyebab'),
    //             'gejala' => $request->input('gejala'),
    //             'pengobatan' => $request->input('pengobatan'),
    //             'pencegahan' => $request->input('pencegahan')
    //         ]);

    //         return redirect('/penyakit')->with(['success' => 'Data berhasil diubah !']);
    //     } else {
    //         return redirect('/penyakit/edit/')->with(['error' => 'Data gagal diubah !']);
    //     }
    // }

    public function update(Request $request) {
        $method = $request->method();
        $id = $request->input('id');

        if($method == 'POST') {
            $direktori = 'assets/foto_penyakit';
            $file = $request->file('foto_penyakit');
            $file->move($direktori, $file->getClientOriginalName());

                DB::table('penyakit')->where('id', $id)->update([
                    'nama' => $request->input('nama'),
                    'foto_penyakit' => $direktori."/".$file->getClientOriginalName(),
                    'id_kategori'=> $request->input('kategori'),
                    'deskripsi' => $request->input('deskripsi'),
                    'penyebab' => $request->input('penyebab'),
                    'gejala' => $request->input('gejala'),
                    'pengobatan' => $request->input('pengobatan'),
                    'pencegahan' => $request->input('pencegahan')
                ]);
                    return redirect('/penyakit')->with(['success' => 'Data berhasil diubah !']);
                } else {
                    return redirect('/penyakit/edit/')->with(['error' => 'Data gagal diubah !']);
                }
            }

    public function delete($id) {
        DB::table('penyakit')->where('id', $id)->delete();

        return redirect('/penyakit')->with(['success' => 'Data berhasil dihapus !']);
    }
}
