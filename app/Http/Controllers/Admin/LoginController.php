<?php

namespace App\Http\Controllers\Admin;
use App\Admin\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;




class LoginController extends Controller
{
    //

    public function index(){

        return view('admin.login');
    }

    public function log_in(request $request)
    {
        $request->validate([
            'username'=>'required',
            'password'=>'required|min:5',
        ]);

        $user = Admin::where('Username','=',$request->username)->first();
      
        if (!$user){

            return back()->with('gagal','User tidak ditemukan');
        }else{

            if(Hash::check($request->password, $user->Password)){
                $request->session()->put('LoggedUser',$user->id);
                return redirect('admin/beranda#/home');

            }else{
                return back()->with('gagal','password anda salah');
            }
        }

    }

    public function log_out(request $request)
    {
        if(session()->has('LoggedUser')){
            session()->pull('LoggedUser');
            return redirect('/admin-login');
        }
    }
}
