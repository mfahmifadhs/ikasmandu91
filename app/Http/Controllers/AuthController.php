<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Hash;
use Auth;
use Session;
use DB;
use Validator;

class AuthController extends Controller
{

    public function index()
    {
        return view ('login');
    }

    public function postLogin(Request $request)
    {
        $request->validate([
            'username'     => 'required',
            'password'  => 'required',
        ]);
        $credentials = $request->only('username', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('dashboard')->with('success','Berhasil Masuk !');
        }
        return redirect("login")->with('failed', 'Username atau Password Salah !');
    }



    public function registration()
    {
        return view('register');
    }

    public function postRegistration(Request $request)
    {  
        $username_validator  = Validator::make($request->all(), [
            'username'     => 'unique:users'
        ]);

        $pass_validator  = Validator::make($request->all(), [
            'password'  => 'required|min:8|required_with:password_confirmation|same:password_confirmation'
        ]);

        if ($username_validator->fails()) {
            return redirect('registration')->with('failed','Gagal Melakukan Pendaftaran, Username sudah terdaftar');
        }elseif($pass_validator->fails()){
            return redirect('registration')->with('failed','Konfirmasi password tidak sesuai');
        }else{
            $check  = DB::table('tbl_alumni')->where('alumni_email',$request->email)->count();
            if ($check == 1) {
               $data = $request->all();
                $check = $this->create($data);
                return redirect("login")->with('success', 'Berhasil Melakukan Pendaftaran !');
            }else{
                return redirect("registration")->with('failed', 'Gagal, Username belum terdaftar !');
            }
            
        }
    }


    public function create(array $data) 
    {
        $user = DB::table('tbl_alumni')->select('id_alumni')->where('alumni_email', $data['email'])->first();
        return User::create([
            'alumni_id'     => $user->id_alumni,
            'username'      => $data['username'],
            'password'      => Hash::make($data['password']),
            'category'      => 'user',
            'status'        => 'aktif',
        ]);
    }    
    

    public function dashboard()
    {
        if(Auth::check() && Auth::user()->category == 'admin master' && Auth::user()->status == 'aktif')
        {
            return redirect('admin-master/dashboard');
        }
        elseif (Auth::check() && Auth::user()->category == 'admin user' && Auth::user()->status == 'aktif') 
        {
            return redirect('admin-user/dashboard');
        }
        elseif (Auth::check() && Auth::user()->category == 'user' && Auth::user()->status == 'aktif') 
        {
             return redirect('/');
        }
    }
    

    public function signOut() {
        Session::flush();
        Auth::logout();
        return Redirect('/');
    }
}
