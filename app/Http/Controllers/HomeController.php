<?php

namespace App\Http\Controllers;

use App\Catatan; //mengambil data dari Catatan atau mengkoneksikan dengan Catatan

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $catatans = Catatan::all(); //mengambil semua data dari model catatan yang terhubung dengan tabel catatans di db
        return view('home',compact('catatans')); //compact untuk megoper variabel catatans ke view home
    }

    
    
}
