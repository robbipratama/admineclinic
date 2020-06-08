<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function index() {
        $data['title'] = 'Brawijaya E-Clinic | Admin Login';

        return view('login', $data);
    }

    public function register_form() {
        $data['title'] = 'Brawijaya E-Clinic | Admin Register';

        return view('Register', $data);
    }

    public function register_save(Request $request) {
        $this->validate($request,[
            'nama' => 'required',
            'username' => 'required',
            'email' => 'required',
            'password_konfirm' => 'required',
        ]);

        $nama = $request->input('nama');
        $username = $request->input('username');
        $email = $request->input('email');
        $password = $request->input('password_konfirm');
        $hash = md5($password);
        $level = 2;

        $method = $request->method();

        if ($method == 'POST') {
            DB::table('admin')->insert([
                'nama' => $nama,
                'username' => $username,
                'email' => $email,
                'password' => $hash,
                'level' => $level
            ]);

            return redirect('/register')->with(['success' => 'Data berhasil disimpan !']);
        } else {
            return redirect('/register')->with(['error' => 'Data gagal disimpan !']);
        }
    }

    public function cek_login(Request $request) {
        $this->validate($request,[
            'useremail' => 'required',
            'password' => 'required',
        ]);

        $userEmail = $request->useremail;
        $password = $request->password;
        $hash = md5($password);

        $check = DB::select("SELECT * FROM `admin` WHERE `username` = '$userEmail' OR `email` = '$userEmail'");

        foreach($check as $data) {
            $id = $data->id;
            $nama = $data->nama;
            $username = $data->username;
            $pass = $data->password;
            $level = $data->level;
        }

        if($check) {
            if($hash == $pass){
                Session::put('id',$id);
                Session::put('display_name', $nama);
                Session::put('username', $username);
                Session::put('level',$level);
                Session::put('login',TRUE);

                return redirect('home');
            }else {
                return redirect('/')->with(['error' => 'Email / Username atau Password Salah !']);
            }
        }else {
            return redirect('/')->with(['error' => 'Email / Username atau Password Salah !']);
        }
    }

    public function profil($id) {
        if (!Session::get('login')) {
            return redirect('/')->with(['error' => 'Anda harus login terlebih dahulu !']);
        } else {
            $data['title'] = 'Brawijaya E-Clinic | Profil';
            $data['welcome_title'] = 'Halaman Admin Profil';
            $data['menu'] = 'home_active';
            $data['breadcrumb'] = 'Profil';

            $data['profil'] = DB::table('admin')->where('id', $id)->get();

            return view('profil', $data);
        }
    }

    public function update_profil(Request $request) {
        $method = $request->method();
        $id = $request->input('id');
        $username = $request->input('username');
        $nama = $request->input('nama');
        $password = $request->input('password_konfirm');

        if($method == 'POST') {
            if($password != null) {
                $hash = md5($password);

                DB::table('admin')->where('id', $id)->update([
                    'nama' => $nama,
                    'username' => $username,
                    'password' => $hash
                ]);

                return redirect('profil/'.$id)->with(['success' => 'Update Berhasil !']);
            } else {
                DB::table('admin')->where('id', $id)->update([
                    'nama' => $nama,
                    'username' => $username
                ]);

                return redirect('profil/'.$id)->with(['success' => 'Update Berhasil !']);
            }
        } else {
            return redirect('profil/'.$id)->with(['error' => 'Update gagal !']);
        }
    }

    public function logout(){
        Session::flush();
        return redirect('/')->with(['success' => 'Anda telah logout']);
    }
}
