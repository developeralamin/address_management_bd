<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Division;
use App\Models\Thanaaa;
use App\Models\ZillaNew;
use App\Models\Union;
use App\Models\Village;
use App\Models\WordNo;


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
        $this->data['union']              = Union::count('id');
        $this->data['word']               = WordNo::count('id');
        $this->data['village']            = Village::count('id');
    
    	return view('dashboard',$this->data);
    }
}
