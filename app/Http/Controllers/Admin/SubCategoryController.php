<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin\Admin;
use App\Admin\Category;
use App\Admin\Sub_category;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        
        $data = ['LoggedUserInfo'=>Admin::where('id','=',session('LoggedUser'))->first()];
        $cat = Category::with('sub_category')->latest()->get();
    
        return view('admin/sub_category/sub_category',compact('cat'),$data);
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
        $sub = Category::All();
     
        return view('admin.sub_category.tambah_sub',compact('sub'),$data);
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
            
        ];
        $request->validate([
            'category_id' =>'required',
            'Nama_sub' => 'required',

        ],$messages);

        Sub_category::create([
            'category_id'=>request('category_id'),
            'Name_sub' => request('Nama_sub'),
        ]);


        return redirect('/admin/sub-kategori/')->with('pesan','Sub kategori berhasil ditambahkan');
      //  return redirect('/admin/sub-kategori/{sub}/lihat')->wit('pesan','Sub kategori berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($sub)
    {

    
        $data = ['LoggedUserInfo'=>Admin::where('id','=',session('LoggedUser'))->first()];

        $suc = Sub_category::with('category')
                            ->Where('category_id',$sub)
                            ->get();
        $cat = Category::find($sub);
        
    
    
           
        return view('admin.sub_category.list_sub',compact('suc','cat'),$data);
       
     
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($sub)
    {

       
        $data = ['LoggedUserInfo'=>Admin::where('id','=',session('LoggedUser'))->first()];

          $suc = Sub_category::with('category')
          ->Where('id',$sub)
          ->get();

        $cat = Category::All();
      //   $suc = Sub_category::with('category')->findorfail($sub);
    

    

        return view('admin.sub_category.edit_sub',compact('suc','cat'),$data);
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $sub)
    {
        
        $messages = [
            'required' => ':attribute wajib diisi cuy!!!',
            
        ];
        $request->validate([
            'category_id' =>'required',
            'Nama_sub' => 'required',

        ],$messages);

        Sub_category::where('id', $sub)
                ->update([
                    'category_id'=>$request->category_id,
                    'Name_sub'=>$request->Nama_sub,
                ]);
        return redirect('/admin/sub-kategori/')->with('pesan','Data berhasil diupdate');

  
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sub_category $sub)
    {
        Sub_category::destroy($sub->id);
        return redirect('/admin/sub-kategori/')->with('pesan','sub kategori berhasil Dihapus');
        //
    }
}
