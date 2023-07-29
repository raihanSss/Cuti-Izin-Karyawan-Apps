<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function showFormLogin()
    {
        if (Auth::check()) { // true sekalian session field di users nanti bisa dipanggil via Auth
            //Login Success
            if(Auth::user()->role === 'karyawan'){
                return redirect()->route('karyawan.dashboard');
            }else{
                return redirect()->route('admin.dashboard');
            }
        }
        return view('pages.auth.login');
    }

    public function login(Request $request)
    {
        $rules = [
            'email'                 => 'required|email',
            'password'              => 'required|string'
        ];

        $messages = [
            'email.required'        => 'Email wajib diisi',
            'email.email'           => 'Email tidak valid',
            'password.required'     => 'Password wajib diisi',
            'password.string'       => 'Password harus berupa string'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }

        $data = [
            'email'     => $request->input('email'),
            'password'  => $request->input('password'),
        ];

        Auth::attempt($data);

        if (Auth::check()) { // true sekalian session field di users nanti bisa dipanggil via Auth
            $users_login = DB::table('users')
                ->join('karyawan','users.id','=','karyawan.user_id')
                ->select('users.*','karyawan.NIK', 'karyawan.divisi')
                ->where('users.name', Auth::user()->name)
                ->get();
            // dd($users_login);
            Session::put('user_login', $users_login);
            $sess = Session::get('user_login');

            // dd($sess);

            //Login Success
            if(Auth::user()->role === 'karyawan'){
                return redirect()->route('karyawan.dashboard');
            }else{
                return redirect()->route('admin.dashboard');
            }
        } else { // false

            //Login Fail
            Session::flash('error', 'Email atau password salah');
            return redirect()->route('login');
        }

    }
    public function logout()
    {
        Auth::logout(); // menghapus session yang aktif
        return redirect()->route('login');
    }
}
