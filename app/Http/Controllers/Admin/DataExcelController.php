<?php

namespace App\Http\Controllers\Admin;

use App\Admin\Data_excel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin\Admin;
use App\Admin\Perusahaan;
use Illuminate\Support\Facades\Storage;

class DataExcelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = ['LoggedUserInfo'=>Admin::where('id','=',session('LoggedUser'))->first()];

        return view('admin.data_excel.list_excel',[
            'data' => Perusahaan::with('data_excel')
                                    ->latest()->paginate(10),

        ],$data);
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Perusahaan $excel)
    {

        $data = ['LoggedUserInfo'=>Admin::where('id','=',session('LoggedUser'))->first()];

        return view('admin.data_excel.tambah_excel',[
            'excel' => $excel,
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
            'kd_saham' =>'required',
            'judul' => 'required',
            'excel'=> 'required|url',

        ],$messages);
      
            Data_excel::create([
            'perusahaan_id'=>request('kd_saham'),
            'judul' => request('judul'),
            'url_excel' => request('excel'),
            
        ]);


        return redirect('/admin/data-excel')->with('pesan','link berhasil ditambahkan');
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Admin\Data_excel  $data_excel
     * @return \Illuminate\Http\Response
     */
    public function show($excel)
    {
        $data = ['LoggedUserInfo'=>Admin::where('id','=',session('LoggedUser'))->first()];

        $per = Perusahaan::find($excel);
        $cel = Data_excel::where('perusahaan_id',$excel)->get();
        return view('admin.data_excel.list_data_excel',compact('cel','per'),$data);
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Admin\Data_excel  $data_excel
     * @return \Illuminate\Http\Response
     */
    public function edit(Data_excel $excel)
    {

        $data = ['LoggedUserInfo'=>Admin::where('id','=',session('LoggedUser'))->first()];
      
   
        return view('admin.data_excel.edit_excel',[

            'excel' => $excel,
            'per' => Perusahaan::all(),

        ],$data);
        

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Admin\Data_excel  $data_excel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $excel)
    {
        $messages = [
            'required' => ':attribute wajib diisi cuy!!!',
            'url' => ':attribute bukan tipe url pastikan menuliskan dengan benar'
        ];
        $request->validate([
            'kd_saham' =>'required',
            'judul' => 'required',
            'excel'=> 'required|url',

        ],$messages);

        Data_excel::where('id', $excel)
                ->update([
                    'perusahaan_id'=>$request->kd_saham,
                    'judul'=>$request->judul,
                    'url_excel' =>$request->excel,
                ]);

        return redirect('/admin/data-excel/')->with('pesan','Data berhasil diupdate');


        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Admin\Data_excel  $data_excel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Data_excel $excel)
    {
        Data_excel::destroy($excel->id);
        
        return redirect('/admin/data-excel')->with('pesan','data berhasil dihapus');
        
    }
}
