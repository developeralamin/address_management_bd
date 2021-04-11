<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\VillageRequest;
use App\Models\Division;
use App\Models\ZillaNew;
use App\Models\Thanaaa;
use App\Models\Union;
use App\Models\WordNo;
use App\Models\Village;


class VillageController extends Controller
{
    public function __construct()
     {
        parent::__construct();
        $this->data['main_menu']  = 'Village';
        $this->data['sub_menu']   = 'View';

     }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      
        $this->data['data'] = Village::all();

        return view('backend.village.view-village',$this->data);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
           // $this->data['mode']              = 'Create';
           $this->data['division']          = Division::arrayForSelectDivision();

         return view('backend.village.form-village',$this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $this->validate($request,[
          'village'     => 'required',
        ]);

        $village                     = New Village();

        $village->division_id        = $request->division_id;
        $village->district_id        = $request->district_id;
        $village->upazilla_id        = $request->upazilla_id;
        $village->union_id           = $request->union_id;
        $village->word_id            = $request->word_id;
        $village->village            = $request->village;

        if($village->save()){
            Session::flash('message','Data Added Successfully');
        }

        return redirect()->to('village');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       
        $this->data['editdata']             = Village::findOrFail($id);
        $this->data['division']             = Division::arrayForSelectDivision();
        // $this->data['district']             = ZillaNew::findOrFail($id);
       

        return view('backend.village.form-village',$this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(VillageRequest $request, $id)
    {
        $village                     =  Village::find($id);

        $village->division_id        = $request->division_id;
        $village->district_id        = $request->district_id;
        $village->upazilla_id        = $request->upazilla_id;
        $village->union_id           = $request->union_id;
        $village->word_id            = $request->word_id;
        $village->village            = $request->village;

        if($village->save()){
            Session::flash('message','Data Updated Successfully');
        }

        return redirect()->to('village');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         if(Village::find($id)->delete()){
            Session::flash('message','Data Delete Successfully');
        }
        return redirect()->to('village');
    }
}
