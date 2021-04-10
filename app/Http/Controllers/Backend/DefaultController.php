<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ZillaNew;
use App\Models\Thanaaa;

class DefaultController extends Controller
{
    public function index(Request $request)
    {
    	$division_id = $request->division_id;

    	$allzilla = ZillaNew::where('division_id',$division_id)->get();

    	return response()->json($allzilla);
    }

    public function upazilla(Request $request)
    {
    	$district_id = $request->district_id;

    	$allupazilla = Thanaaa::where('district_id',$district_id)->get();

    	return response()->json($allupazilla);
    }
}
