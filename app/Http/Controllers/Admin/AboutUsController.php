<?php

namespace App\Http\Controllers\Admin;

use App\Admin\About_us;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin\Admin;

use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class AboutUsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json([
            'about' => About_us::all(),
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


        return view('admin.about-us.tambah_about-us',$data);
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
           
            'mimes' =>':attribute harus format jpg,jpeg,bmp,png,webp',
            'max' => ':attribute file maksimal 1 mb',
        ];
        $data = request()->validate([
            //jika tidak ada validasi
            //'kosong'=>'',
            //image.* jika error
            'visi' => 'required',
            'misi' => 'required',
            'deskripsi'   => 'required',
           
            'nama' => 'required',
            'alamat' => 'required',
            'telp' => 'required',
            'riwayat' => 'required', 
            'pendidikan' => 'required',   
            'image'   => 'required|file|max:1024|mimes:jpeg,png,jpg,gif,svg',
           
        ],$messages);

     

   
        if ($request->file('image')) {


        

            $imagePath = $request->file('image')->store('profile','public');
    
           
         $image = Image::make(public_path("storage/{$imagePath}"))->fit(472,709);
        

         $image->save();
            
            //$imageArray = ['image'=>$imagePath];
         }
         

         About_us::create([
           
            'visi' => request('visi'),
            'misi' => request('misi'),
            'deskripsi' => request('deskripsi'),
            'nama' => request('nama'),
            'alamat' => request('alamat'),
            'telp' => request('telp'),
            'riwayat' => request('riwayat'),
            'pendidikan' => request('pendidikan'),
            'image'=> $imagePath,
        ]);
      
      
        //jika tidak ada gambar
        //  auth()->user()->posts()->create($data);

      // \App\Post::create($data);

       
        return redirect('/admin/about-us/')->with('pesan','data berhasil ditambah');

        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Admin\About_us  $about_us
     * @return \Illuminate\Http\Response
     */
    public function show(About_us $about_us)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Admin\About_us  $about_us
     * @return \Illuminate\Http\Response
     */
    public function edit(About_us $about)
    {

        $data = ['LoggedUserInfo'=>Admin::where('id','=',session('LoggedUser'))->first()];

        return view('admin.about-us.edit_about-us',compact('about'),$data);
    
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Admin\About_us  $about_us
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, About_us $about)
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
            'visi' => 'required',
            'misi' => 'required',
            'deskripsi'   => 'required',
           
            'nama' => 'required',
            'alamat' => 'required',
            'telp' => 'required',
            'riwayat' => 'required', 
            'pendidikan' => 'required',   
            'image'   => 'file|max:1024|mimes:jpeg,png,jpg,gif,svg',
           
        ],$messages);

        if ($request->file('image')) {

            if($request->oldImage){
                    Storage::disk('public')->delete($request->oldImage); 
            }  
        
            $imagePath = $request->file('image')->store('profile','public');
     
             $image = Image::make(public_path("storage/{$imagePath}"))->fit(472,709);
             $image->save();
            
            // $imageArray = ['image'=>$imagePath];
         }

        

            About_us::where('id', $about->id)
                ->update([
                    'visi'=>$request->visi,
                    'misi' => $request->misi,
                    'deskripsi' =>$request->deskripsi,
                    'nama'=>$request->nama,
                    'alamat' =>$request->alamat,
                    'telp' =>$request->telp,
                    'riwayat' =>$request->riwayat,
                    'pendidikan' =>$request->pendidikan,
                    'image' => $imagePath ?? $request->oldImage,
                    
                ]);
            
        return redirect('/admin/about-us/')->with('pesan','data berhasil diupdate');


        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Admin\About_us  $about_us
     * @return \Illuminate\Http\Response
     */
    public function destroy(About_us $about)
    {

        if($about->image){

            Storage::disk('public')->delete($about->image);
    
          }
            About_us::destroy($about->id);
            return redirect('/admin/about-us/')->with('pesan','data berhasil dihapus');

        //
    }
}
