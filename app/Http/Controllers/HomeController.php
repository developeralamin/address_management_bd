<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    // public function __construct()
    //  {
    //     parent::__construct();
    //     $this->data['main_menu']  = 'Dashboard';
    //  }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
         // parent::__construct();
        $this->middleware('auth');
       
       // $this->data['main_menu']  = 'Dashboard';
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('layout.app');
    }
}
