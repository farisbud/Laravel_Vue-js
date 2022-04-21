<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin\Category;
use App\Admin\Perusahaan;
use App\Admin\Link_data;
use App\Admin\Navbar;

class financeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        
        return view('data_finance',[
            'cat'=> Category::with('sub_category')->get(),
            'nav' => Navbar::all(),
            'data'=> Perusahaan::orderBy('kd_saham', 'ASC')->paginate(30),
        ]);
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
            
      
        return view('data_finance_detail',[
            'cat' => Category::with('sub_category')->get(),
            'data' => Perusahaan::find($id),
            'nav' => Navbar::all(),
            'link' => Link_data::with('perusahaan')
                                ->where('perusahaan_id',$id)
                                ->latest()
                                ->get(),
        ]);
        //
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
