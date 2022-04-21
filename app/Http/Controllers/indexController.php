<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin\Category;
use App\Admin\Content;
use App\Admin\Sub_category;
use App\Admin\Perusahaan;
use App\Admin\Link_data;
use App\Admin\Navbar;
use App\Admin\About_us;

use Illuminate\Support\Facades\DB;

class indexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function main(){


        $cat = Category::with('Sub_category')->get();

        return view('layout.main',compact('cat'));
    }

    public function index()
    {
        $cat = Category::with('Sub_category')->get();
        
        $sub_cat = Sub_category::with('content')->latest()->get();

        $nav = Navbar::all();
        $data = Content::latest()->limit(5)->get();
    
   
       
       return view('home',compact('cat','data','nav','sub_cat'));
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
        //
    }


    public function searchSite()
    {

        return view('search_site',[
            'cat'=> Category::with('sub_category')->get(),
            'nav' => Navbar::all(),
            'drop'=> Sub_category::all(),
            'content'=> Content::with('sub_category')->latest()->filter(request(['search','sub_category']))->paginate(9),
            'per'=> Perusahaan::with('data_excel')->latest()->filter(request(['search']))->paginate(9),
            
        ]);


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function tampil_sub($sub)
    {

        $cat = Category::with('sub_category')->get();

        $nav = Navbar::all();
        
        $all = Content::with('sub_category')
                            ->where('sub_category_id',$sub)
                            ->latest()
                            ->paginate(7);

      

        return view('sub_all',compact('cat','nav','all'));

       

    }

    public function tampil_all(){

        return view('all_post',[
            'cat'=> Category::with('sub_category')->get(),
            'nav' => Navbar::all(),
            'content'=> Content::with('sub_category')->latest()->paginate(7),
        ]);

    }


    public function show(Content $sid, $id)
    {

       
        $cat = Category::with('sub_category')->get();
        $sub_cat = Content::with('sub_category')
                                    ->where('sub_category_id',$id)
                                    ->latest()
                                    ->limit(7)
                                    ->get();
        $cont = Content::latest()->limit(7)->get();
        
       
         return view('single',[
            'cat' => $cat,
            'nav' => Navbar::all(),
            'cont'=>$sid,
            'sub_cat'=>$sub_cat,
            'all'=>$cont,

         ]);

        //
    }

    public function aboutUs()
    {

        return view('about-us',[
            'cat' => Category::with('sub_category')->get(),
            'nav' => Navbar::all(),
            'about'=> About_us::all(),

         ]);



    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
