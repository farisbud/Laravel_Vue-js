<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin\Admin;
use App\Admin\Category;
use App\Admin\Sub_category;
use App\Admin\Content;
use App\Admin\Perusahaan;


class HomeController extends Controller
{
    //
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
      
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $data = ['LoggedUserInfo'=>Admin::where('id','=',session('LoggedUser'))->first()];

        $cat=Category::All();
        $sub = Sub_category::All();
        $content = Content::All();
        $per = Perusahaan::all();
        return view('admin.home',compact('cat','sub','content','per'),$data);
    }
}
