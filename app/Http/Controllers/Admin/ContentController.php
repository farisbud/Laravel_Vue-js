<?php

namespace App\Http\Controllers\Admin;

use App\Admin\Admin;
use App\Admin\Content;
use App\Admin\Category;
use App\Admin\Sub_category;

use Intervention\Image\Facades\Image;

use Illuminate\Contracts\Validation\Rule;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ContentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = ['LoggedUserInfo'=>Admin::where('id','=',session('LoggedUser'))->first()];
        $content = Content::latest()->paginate(10);
        return view('admin.konten.list_konten',compact('content'),$data);
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
        $cat = Category::All();
        
       // $sub = Sub_category::All();
        return view('admin.konten.tambah_konten',compact('cat'),$data);
        //
    }

    public function findSub(Request $request){

		
	    //if our chosen id and products table prod_cat_id col match the get first 100 data 
      
        //$request->id here is the id of our chosen option id
      


                $data= Sub_category::select('Name_sub','id')
                ->where('category_id',$request->id)
                ->take(100)
                ->get();

               return response()->json($data);//then sent this data to ajax success
      
        
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
           
            'mimes' =>':attribute harus format jpg,jpeg,bmp,png,webp',
            'max' => ':attribute file maksimal 1 mb',
        ];
        $data = request()->validate([
            //jika tidak ada validasi
            //'kosong'=>'',
            //image.* jika error
            'sub_cat' => 'required',
            'caption' => 'required',
            'judul'   => 'required',
           
            'content' => 'required', 
            'image_source' => '',
            'image'   => 'required|file|max:1024|mimes:jpeg,png,jpg,gif,svg',
           
        ],$messages);

     

   
        if ($request->file('image')) {


        

            $imagePath = $request->file('image')->store('gambar','public');
    
           
         $image = Image::make(public_path("storage/{$imagePath}"))->fit(2000,1500);
        

         $image->save();
            
            //$imageArray = ['image'=>$imagePath];
         }
         
         $sub_content = Str::limit(strip_tags($request->content), 300);

         Content::create([
            'sub_category_id'=>request('sub_cat'),
            'caption' => request('caption'),
            'judul' => request('judul'),
            'sub_content' => $sub_content,
            'description' => request('content'),
            'image_source'=> request('image_source'),
            'image'=> $imagePath,
        ]);
      
      
        //jika tidak ada gambar
        //  auth()->user()->posts()->create($data);

      // \App\Post::create($data);

       
        return redirect('/admin/konten/')->with('pesan','content berhasil ditambah');
        //
    }



    /**
     * Display the specified resource.
     *
     * @param  \App\Admin\Content  $content
     * @return \Illuminate\Http\Response
     */
    public function show(Content $cont)
    {

        
    }

   


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Admin\Content  $content
     * @return \Illuminate\Http\Response
     */
    public function edit(Content $cont)
    {
        $data = ['LoggedUserInfo'=>Admin::where('id','=',session('LoggedUser'))->first()];
        
        $sub_cat = Sub_category::All();
        return view('admin.konten.edit_konten', compact('cont','sub_cat'),$data);
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Admin\Content  $content
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Content $cont)
    {

 
        $messages = [
            'required' => ':attribute wajib diisi cuy!!!',
           
            'mimes' =>':attribute harus format jpg,jpeg,bmp,png,webp',
            'max' => ':attribute file maksimal 1 mb',
        ];

        $data = request()->validate([
            //jika tidak ada validasi
            //'kosong'=>'',
            //image.* jika error
            'sub_cat' => 'required',
            'caption' => 'required',
            'judul'   => 'required',
            
            'content' => 'required', 
            'image_source' => '',
            'image'   => 'file|max:1024|mimes:jpeg,png,jpg,gif,svg',
           
        ],$messages);

        if ($request->file('image')) {

            if($request->oldImage){
                    Storage::disk('public')->delete($request->oldImage); 
            }  
        
            $imagePath = $request->file('image')->store('gambar','public');
     
             $image = Image::make(public_path("storage/{$imagePath}"))->fit(2000,1500);
             $image->save();
            
            // $imageArray = ['image'=>$imagePath];
         }

        $sub_content = Str::limit(strip_tags($request->content), 300);

      Content::where('id', $cont->id)
                ->update([
                    'sub_category_id'=>$request->sub_cat,
                    'caption' => $request->caption,
                    'judul' =>$request->judul,
                    'sub_content'=>$sub_content,
                    'description' =>$request->content,
                    'image_source' =>$request->image_source,
                    'image' => $imagePath ?? $request->oldImage,
                    
                ]);
             

                
        
        return redirect('/admin/konten/')->with('pesan','data berhasil diupdate');
        
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Admin\Content  $content
     * @return \Illuminate\Http\Response
     */
    public function destroy(Content $cont)
    {
      if($cont->image){

        Storage::disk('public')->delete($cont->image);

      }
        Content::destroy($cont->id);
        return redirect('/admin/konten/')->with('pesan','data berhasil dihapus');
        
      
        //
    }
}
