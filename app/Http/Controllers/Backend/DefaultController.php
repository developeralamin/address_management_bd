<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ZillaNew;
use App\Models\Thanaaa;
use App\Models\Union;
use App\Models\WordNo;



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

  public function union(Request $request)
  {
  	    $upazilla_id = $request->upazilla_id;

    	  $allunion = Union::where('upazilla_id',$upazilla_id)->get();

    	  return response()->json($allunion);
  }

   public function word(Request $request)
   {
        $union_id = $request->union_id;

        $allvillage = WordNo::where('union_id',$union_id)->get();

        return response()->json($allvillage);
   }


}
