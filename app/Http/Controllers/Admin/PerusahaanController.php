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

        $data = ['LoggedUserInfo'=>Admin::where('id','=',session('LoggedUser'))->first()];



        return view('admin.perusahaan.list_perusahaan',[

            'item'=> Perusahaan::latest()->paginate(10),

            ],$data);
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
        $messages = [
            'required' => ':attribute wajib diisi cuy!!!',
            'email' => ':attribute harus di isi dengan benar'
        ];
        $request->validate([
            'kd_saham' =>'required',
            'nama_pt' => 'required',
            'alamat' =>'required',
            'email'=>'required|email',
            'no_telp' =>'required',
            'deskripsi'=>'required',
            'situs'=>'',
            'tanggal'=>'required',
            'papan' => 'required',
            'bidang' => 'required',
            'sector' =>'required',
            'sub_sector'=>'required',
            'industri'=>'required',
            'sub_industri'=>'required',
            'administrasi'=>'required',

            
        ],$messages);

        Perusahaan::create([
            'kd_saham'=>request('kd_saham'),
            'nama_lengkap' => request('nama_pt'),
            'alamat' => request('alamat'),
            'email' => request('email'),
            'no_telp' => request('no_telp'),
            'description'=> request('deskripsi'),
            'alamat_web' => request('situs'),
            'tanggal' => request('tanggal'),
            'papan' => request('papan'),
            'bidang'=>request('bidang'),
            'sector' => request('sector'),
            'sub_sector' => request('sub_sector'),
            'industri' => request('industri'),
            'sub_industri' => request('sub_industri'),
            'biro_administrasi' => request('administrasi'),
        ]);


        return redirect('/admin/perusahaan')->with('pesan','perusahaan berhasil ditambahkan');

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
    public function update(Request $request, $per)
    {
        $messages = [
            'required' => ':attribute wajib diisi cuy!!!',
            'email' => ':attribute harus di isi dengan benar'
        ];
        $request->validate([
            'kd_saham' =>'required',
            'nama_pt' => 'required',
            'alamat' =>'required',
            'email'=>'required|email',
            'no_telp' =>'required',
            'deskripsi'=>'required',
            'situs'=>'',
            'tanggal'=>'required',
            'papan' => 'required',
            'bidang' => 'required',
            'sector' =>'required',
            'sub_sector'=>'required',
            'industri'=>'required',
            'sub_industri'=>'required',
            'administrasi'=>'required',

            
        ],$messages);

        Perusahaan::where('id', $per)
                ->update([
                    'kd_saham'=>$request->kd_saham,
                    'nama_lengkap' => $request->nama_pt,
                    'alamat' => $request->alamat,
                    'email' => $request->email,
                    'no_telp' => $request->no_telp,
                    'description'=> $request->deskripsi,
                    'alamat_web' => $request->situs,
                    'tanggal' => $request->tanggal,
                    'papan' => $request->papan,
                    'bidang'=>$request->bidang,
                    'sector' => $request->sector,
                    'sub_sector' => $request->sub_sector,
                    'industri' => $request->industri,
                    'sub_industri' => $request->sub_industri,
                    'biro_administrasi' => $request->administrasi,
                ]);
                
        return redirect('/admin/perusahaan')->with('pesan','Data berhasil diupdate');

        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Admin\Perusahaan  $Perusahaan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Perusahaan $per)
    {
        
        Perusahaan::destroy($per->id);
        
        return redirect('/admin/perusahaan')->with('pesan','data berhasil dihapus');
        
        //
    }
}
