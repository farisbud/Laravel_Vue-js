<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin\Admin;
use App\Admin\Link_data;
use App\Admin\Perusahaan;

class LinkDataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json([
            'dataLink'=> Perusahaan::with('link_data')->latest()->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Perusahaan $link)
    {

        $data = ['LoggedUserInfo'=>Admin::where('id','=',session('LoggedUser'))->first()];

        return view('admin.link_data.tambah_data',[
            'link' => $link,
            'per' => Perusahaan::All(),
        ],$data);
        
        
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
            'url' => ':attribute bukan tipe url pastikan menuliskan dengan benar'
        ];
        $request->validate([
            
            'perusahaan_id' =>'required',
            'nama_url' => 'required',
            'url'=> 'required|url',

        ],$messages);

        return Link_data::create([
        'perusahaan_id'=>request('perusahaan_id'),
        'nama_url' => request('nama_url'),
        'url' => request('url'),
            
        ]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

      
        return response()->json([
            'link'=> Link_data::with('perusahaan')
                               ->where('perusahaan_id',$id)
                               ->get(),
                               
            'per' => Perusahaan::find($id),
            
        ],200);
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Link_data $link)
    {
        $data = ['LoggedUserInfo'=>Admin::where('id','=',session('LoggedUser'))->first()];
      
   
        return view('admin.link_data.edit_data',[

            'link' => $link,
            'per' => Perusahaan::all(),

        ],$data);
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $messages = [
            'required' => ':attribute wajib diisi cuy!!!',
            'url' => ':attribute bukan tipe url pastikan menuliskan dengan benar'
        ];
        $request->validate([
            
            'perusahaan_id' =>'required',
            'nama_url' => 'required',
            'url'=> 'required|url',

        ],$messages);

       return Link_data::where('id', $id)
                ->update([
                    'perusahaan_id'=>$request->perusahaan_id,
                    'nama_url'=>$request->nama_url,
                    'url' =>$request->url,
                ]);
       // return redirect('/admin/data-link/')->with('pesan','Data berhasil diupdate');


        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Link_data $id)
    {
        
        return Link_data::destroy($id->id);
        
        //return redirect('/admin/data-link')->with('pesan','data berhasil dihapus');
        //
    }
}
