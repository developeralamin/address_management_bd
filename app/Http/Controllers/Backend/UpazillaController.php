<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\UpazillaRequest;
use App\Models\Division;
use App\Models\ZillaNew;
use App\Models\Thanaaa;

class UpazillaController extends Controller

{
    
     public function __construct()
     {
        parent::__construct();
        $this->data['main_menu']  = 'Upazilla';
        $this->data['sub_menu']   = 'View';

     }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['data'] = Thanaaa::all();

        return view('backend.upazilla.view-upazilla',$this->data);

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

         return view('backend.upazilla.form-upazilla',$this->data);
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
          'name'     => 'required|unique:thanaaas,name',
        ]);

        $upazilla                 = New Thanaaa();

        $upazilla->division_id    = $request->division_id;
        $upazilla->district_id    = $request->district_id;
        $upazilla->name           = $request->name;

        $upazilla->save();

        return redirect()->to('upazilla')->with('Data Added Successfully');

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
       
        $this->data['editdata']             = Thanaaa::findOrFail($id);
        $this->data['division']             = Division::arrayForSelectDivision();
        // $this->data['district']             = ZillaNew::findOrFail($id);
       

         return view('backend.upazilla.form-upazilla',$this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpazillaRequest $request, $id)
    {
        $upazilla                 = Thanaaa::find($id);

        $upazilla->division_id    = $request->division_id;
        $upazilla->district_id    = $request->district_id;
        $upazilla->name           = $request->name;

       if($upazilla->save()){
        Session::flash('message','Data Updated Successfully');
       }

        return redirect()->to('upazilla');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         if(Thanaaa::find($id)->delete()){
            Session::flash('message','Data Delete Successfully');
        }
        return redirect()->to('upazilla');
    }
}
