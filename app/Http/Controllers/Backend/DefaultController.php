<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ZillaNew;

class DefaultController extends Controller
{
    public function index(Request $request)
    {
    	$division_id = $request->division_id;

    	$allzilla = ZillaNew::where('division_id',$division_id)->get();

    	return response()->json($allzilla);
    }
}
