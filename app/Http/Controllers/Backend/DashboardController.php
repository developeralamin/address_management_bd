<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Division;
use App\Models\Thanaaa;
use App\Models\ZillaNew;


class DashboardController extends Controller
{
	public function __construct()
     {
        parent::__construct();
        $this->data['main_menu']  = 'Dashboard';
     }


    public function index()
    {
        $this->data['division']           = Division::count('id');
        $this->data['district']           = ZillaNew::count('id');
        $this->data['thana']              = Thanaaa::count('id');
    
    	return view('dashboard',$this->data);
    }
}
