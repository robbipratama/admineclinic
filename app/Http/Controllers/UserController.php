<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function index(Request $request) {
        if(!Session::get('login')) {
            return redirect('/')->with(['error' => 'Anda harus login terlebih dahulu !']);
        } else {
            $data['title'] = 'Brawijaya E-Clinic | Data User';
            $data['welcome_title'] = 'Halaman Data User';
            $data['menu'] = 'user_active';
            $data['breadcrumb'] = 'Data User';

            $keyword = $request->input('keywords');

            if ($keyword != "") {
                $data['user'] = DB::table('user')
                                    ->where('nama_depan', 'like', '%' .$keyword. '%')
                                    ->orderBy('id', 'asc')
                                    ->paginate(10);

            } else {
                $data['user'] = DB::table('user')
                                    ->orderBy('id', 'asc')
                                    ->paginate(10);

            }

            return view('UserData', $data);
        }
    }

    public function delete($id) {
        DB::table('user')->where('id', $id)->delete();

        return redirect('/data-user')->with(['success' => 'Data berhasil dihapus !']);
    }
}
