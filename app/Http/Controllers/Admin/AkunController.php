<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Admin\Admin;

class AkunController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json([
            'akun' => Admin::latest()->get(),
        ],200);
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = ['LoggedUserInfo'=>Admin::where('id','=',session('LoggedUser'))->first()];
        return view('admin.akun.tambah_akun',$data);

        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $messages = [
            'required' => ':attribute wajib diisi cuy!!!',
            'unique' =>':attribute , sudah ada yang pakai silahkan ganti',
            'confirmed'=> 'konfirmasi password tidak sama',
            'min' =>':attribute harus lebih dari 5 karakter',
            'max' => ':attribute tidak boleh dari 15 digit',
        ];

        $request->validate([
            'nama' =>'required',
            'username'=>'required|min:5|unique:admin',
            'password' => 'required|min:5|max:12|confirmed',


        ],$messages);
        

        Admin::create([
        
        'Name' => request('nama'),
        'Username' => request('username'),
        'Password'=>  Hash::make(request('password')),
        'remember_token' => Str::random(60),

        ]);

        return redirect('/admin/akun')->with('pesan','data berhasil dimasukan');
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Admin $akun)
    {
       
        $data = ['LoggedUserInfo'=>Admin::where('id','=',session('LoggedUser'))->first()];

        return view('admin.akun.edit_akun',compact('akun'),$data);
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Admin $akun)
    {



      $messages = [
            'required' => ':attribute wajib diisi cuy!!!',
            'unique' =>':attribute , sudah ada yang pakai silahkan ganti',
            'confirmed'=> 'konfirmasi password tidak sama',
            'min' =>':attribute harus lebih dari 5 karakter',
            'max' => ':attribute tidak boleh dari 15 digit',
        ];

        $request->validate([
            'nama' =>'required',
            'username'=>'required|min:5|unique:admin,Username,'.$akun->id,
            

        ],$messages);

        if($request->password){

           $request->validate([
            
                'password' => 'required|min:5|max:12|confirmed',
            
            ],$messages);
            
            $pass = Hash::make($request->password);
              
        }else{

            $pass= $akun->Password;
        }
        
            

      Admin::where('id', $akun->id)
                ->update([
                    'Name'=>$request->nama,
                    'Username' => $request->username,
                    'Password' => $pass,
                    
                ]);
             

                
        
        return redirect('/admin/akun')->with('pesan','data berhasil diupdate');
        
     
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Admin $akun)
    {
        Admin::destroy($akun->id);
        return redirect('/admin/akun/')->with('pesan','data berhasil dihapus');
        
        //
    }
}
