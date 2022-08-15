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
        // $data = ['LoggedUserInfo'=>Admin::where('id','=',session('LoggedUser'))->first()];
        //$content = Content::latest()->paginate(10);
        return response()->json([
            'content'=>Content::latest()->get(),
            
            'cat'=> Category::latest()->get(),
            'sub'=>Sub_Category::latest()->get(),

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
        $cat = Category::All();
        
       // $sub = Sub_category::All();
        return view('admin.konten.tambah_konten',compact('cat'),$data);
        //
    }

    public function findSub(){

		$id = request('id');
      
	    //if our chosen id and products table prod_cat_id col match the get first 100 data 
      
        //$request->id here is the id of our chosen option id
      


            //     $data= Sub_category::select('Name_sub','id')
            //     ->where('category_id',$request->id)
            //     ->take(100)
            //     ->get();

            //    return response()->json($data);//then sent this data to ajax success


           return response()->json([
               'sub_category'=> Sub_category::where('category_id',$id)
                                ->take(100)
                                ->get(),

           ]);//then sent this data to ajax success
        
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
            'file' =>':attribute file harus berupa format jpeg,png,jpg,gif,svg',
        ];
        $data = request()->validate([
            //jika tidak ada validasi
            //'kosong'=>'',
            //image.* jika error
            'sub_category_id' => 'required',
            'caption' => 'required',
            'judul'   => 'required',
           
            'description' => 'required', 
            'image_source' => '',
            'image'   => 'required|file|max:1024|mimes:jpeg,png,jpg,gif,svg',
           
        ],$messages);

     
        // dd($request->file('image'));
   
        if ($request->file('image')) {


        

            $imagePath = $request->file('image')->store('gambar','public');
    
           
         $image = Image::make(public_path("storage/{$imagePath}"))->fit(2000,1500);
        

         $image->save();
            
            //$imageArray = ['image'=>$imagePath];
         }
         
         $sub_content = Str::limit(strip_tags($request->description), 300);

        return Content::create([
            'sub_category_id'=>request('sub_category_id'),
            'caption' => request('caption'),
            'judul' => request('judul'),
            'sub_content' => $sub_content,
            'description' => request('description'),
            'image_source'=> request('image_source'),
            'image'=> $imagePath,
        ]);
      
      
        //jika tidak ada gambar
        //  auth()->user()->posts()->create($data);

      // \App\Post::create($data);

       
        // return redirect('/admin/konten/')->with('pesan','content berhasil ditambah');
        
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
    public function edit(Request $request, $id)
    {
        // $data = ['LoggedUserInfo'=>Admin::where('id','=',session('LoggedUser'))->first()];
        
        // $sub_cat = Sub_category::All();
        // return view('admin.konten.edit_konten', compact('cont','sub_cat'),$data);

        $upload = Content::find($id);
        return response()->json($upload);
        // return response()->json([

        //     'contentEdit' => Content::where('id', $id)->get(),

        // ], 200);
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

        
     
        // $upload = Content::find($cont);
        // dd($request->file('image'));
        
         $currentPhoto = $cont->image;

         $messages = [
            'required' => ':attribute wajib diisi cuy!!!',
           
            'mimes' =>':attribute harus format jpg,jpeg,bmp,png,webp',
            'max' => ':attribute file maksimal 1 mb',
            'file' =>':attribute file harus berupa format jpeg,png,jpg,gif,svg',
        ];

        $data = request()->validate([
            //jika tidak ada validasi
            //'kosong'=>'',
            //image.* jika error
            'sub_category_id' => 'required',
            'caption' => 'required',
            'judul'   => 'required',
            'description' => 'required', 
            'image_source' => '',
            //'image.*'   => 'image|max:1024|mimes:jpeg,png,jpg,gif,svg',
           
        ],$messages);
      
        
        if ($request->file('image')) {

            $request()->validate([
                //jika tidak ada validasi
                //'kosong'=>'',
                //image.* jika error
               
                'image'   => 'image|max:1024|mimes:jpeg,png,jpg,gif,svg',
               
            ],$messages);

             if($currentPhoto){

             Storage::disk('public')->delete($currentPhoto); 

            }

            // $name = time().'.' . explode('/', explode(':', substr($request->image, 0, strpos($request->image, ';')))[1])[1];

            // $name = time()."-".$request->file('image')->getClientOriginalName();

             $imagePath = $request->file('image')->store('gambar','public');
     
             $image = Image::make(public_path("storage/{$imagePath}"))->fit(2000,1500);

             //$request->merge(['image' => $name]);

             $image->save();
            
            // $imageArray = ['image'=>$imagePath];
           // $oldImage = public_path("storage/").$currentPhoto;

            // if(file_exists($oldImage)){

            //     Storage::disk('public')->delete($oldImage);

            // }

         }

        $sub_content = Str::limit(strip_tags($request->description), 300);

     return Content::where('id', $cont->id)
                ->update([
                    'sub_category_id'=>$request->sub_category_id,
                    'caption' => $request->caption,
                    'judul' =>$request->judul,
                    'sub_content'=>$sub_content,
                    'description' =>$request->description,
                    'image_source' =>$request->image_source,
                    'image' => $imagePath ?? $currentPhoto,
                    
                ]);
             

                
        
        // return redirect('/admin/konten/')->with('pesan','data berhasil diupdate');
        
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Admin\Content  $content
     * @return \Illuminate\Http\Response
     */
    public function destroy(Content $id)
    {
    //   if($cont->image){

    //     Storage::disk('public')->delete($cont->image);

    //   }
    //     Content::destroy($cont->id);
    //     return redirect('/admin/konten/')->with('pesan','data berhasil dihapus');
        if($id->image){

            Storage::disk('public')->delete($id->image);
    
          }
           return Content::destroy($id->id);
      
        //
    }
}
