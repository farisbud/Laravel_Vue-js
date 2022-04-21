<?php

namespace App\Http\Controllers\Admin;

use App\Admin\Admin;
use App\Admin\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = ['LoggedUserInfo'=>Admin::where('id','=',session('LoggedUser'))->first()];
        $cat = Category::all();
        return view('admin.category.category',compact('cat'),$data);
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
        
        return view('admin.category.tambah_category',$data);
       
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
            'name' =>'required',

        ],$messages);

        Category::create([
            'Name_cat' => request('name'),
        ]);

         return redirect('/admin/kategori')->with('pesan','Data berhasil disimpan'); 
        
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
    public function edit(Category $cat)
    {
        $data = ['LoggedUserInfo'=>Admin::where('id','=',session('LoggedUser'))->first()];
        return view('admin.category.edit_category',compact('cat'),$data);
        
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $cat)
    {
        $messages = [
            'required' => ':attribute wajib diisi cuy!!!',
            
        ];
        $request->validate([
            'name' =>'required',

        ],$messages);

        Category::where('id', $cat->id)
                ->update([
                    'Name_cat'=>$request->name,
                ]);
        return redirect('/admin/kategori/')->with('pesan','Data berhasil diupdate');
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $cat)
    {

        Category::destroy($cat->id);
        return redirect('/admin/kategori/')->with('pesan','Data berhasil Dihapus');
       
        // $data=Category::destroy($cat->id_category);

        // if($data){

        //     return redirect('/admin/kategori/')->with('pesan','Data berhasil Dihapus');

        // }else{

        //     return redirect('/admin/kategori/')->with('pesan','Data gagal dihapus');
        // }
        //  
    
    }
}
