<?php

namespace App\Http\Controllers\Admin;

use App\Admin\Perusahaan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin\Admin;

class PerusahaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

       return response()->json([

        'perusahaan' => Perusahaan::latest()->get(),

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

        return view('admin.perusahaan.tambah_per',$data);

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
       // return $request;
        
        $messages = [
            'required' => ':attribute wajib diisi cuy!!!',
            'email' => ':attribute harus di isi dengan benar',
            'numeric' => ':attribute harus berisi angka',
        ];
        $request->validate([
            'kd_saham' =>'required',
            'nama_lengkap' => 'required',
            'alamat' =>'required',
            'email'=>'required|email',
            'no_telp' =>'required|numeric',
            'description'=>'required',
            'alamat_web'=>'',
            'tanggal'=>'nullable|date',
            'papan' => 'required',
            'bidang' => 'required',
            'sector' =>'required',
            'sub_sector'=>'required',
            'industri'=>'required',
            'sub_industri'=>'required',
            'biro_administrasi'=>'required',

            
        ],$messages);

       return Perusahaan::create([
            'kd_saham'=>request('kd_saham'),
            'nama_lengkap' => request('nama_lengkap'),
            'alamat' => request('alamat'),
            'email' => request('email'),
            'no_telp' => request('no_telp'),
            'description'=> request('description'),
            'alamat_web' => request('alamat_web'),
            'tanggal' => request('tanggal'),
            'papan' => request('papan'),
            'bidang'=>request('bidang'),
            'sector' => request('sector'),
            'sub_sector' => request('sub_sector'),
            'industri' => request('industri'),
            'sub_industri' => request('sub_industri'),
            'biro_administrasi' => request('biro_administrasi'),
        ]);


        // return redirect('/admin/perusahaan')->with('pesan','perusahaan berhasil ditambahkan');

        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Admin\Perusahaan  $Perusahaan
     * @return \Illuminate\Http\Response
     */
    public function show(Perusahaan $per)
    {

        $data = ['LoggedUserInfo'=>Admin::where('id','=',session('LoggedUser'))->first()];

        return view('admin.perusahaan.detail_per',compact('per'),$data);
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Admin\Perusahaan  $Perusahaan
     * @return \Illuminate\Http\Response
     */
    public function edit(Perusahaan $per)
    {
        $data = ['LoggedUserInfo'=>Admin::where('id','=',session('LoggedUser'))->first()];

        return view('admin.perusahaan.edit_per',compact('per'),$data);
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Admin\Perusahaan  $Perusahaan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //return $request;
        $messages = [
            'required' => ':attribute wajib diisi cuy!!!',
            'email' => ':attribute harus di isi dengan benar',
            'numeric' => ':attribute harus berisi angka',
        ];
        $request->validate([
            'kd_saham' =>'required',
            'nama_lengkap' => 'required',
            'alamat' =>'required',
            'email'=>'required|email',
            'no_telp' =>'required|numeric',
            'description'=>'required',
            'alamat_web'=>'',
            'tanggal'=>'nullable|date',
            'papan' => 'required',
            'bidang' => 'required',
            'sector' =>'required',
            'sub_sector'=>'required',
            'industri'=>'required',
            'sub_industri'=>'required',
            'biro_administrasi'=>'required',

            
        ],$messages);

       return Perusahaan::where('id', $id)
                ->update([
                    'kd_saham'=>$request->kd_saham,
                    'nama_lengkap' => $request->nama_lengkap,
                    'alamat' => $request->alamat,
                    'email' => $request->email,
                    'no_telp' => $request->no_telp,
                    'description'=> $request->description,
                    'alamat_web' => $request->alamat_web,
                    'tanggal' => $request->tanggal,
                    'papan' => $request->papan,
                    'bidang'=>$request->bidang,
                    'sector' => $request->sector,
                    'sub_sector' => $request->sub_sector,
                    'industri' => $request->industri,
                    'sub_industri' => $request->sub_industri,
                    'biro_administrasi' => $request->biro_administrasi,
                ]);
                
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Admin\Perusahaan  $Perusahaan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Perusahaan $id)
    {
        
        return Perusahaan::destroy($id->id);
        
    }
}
