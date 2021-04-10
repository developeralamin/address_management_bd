<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\UnionRequest;
use App\Models\Division;
use App\Models\ZillaNew;
use App\Models\Thanaaa;
use App\Models\Union;


class UnionController extends Controller
{
   public function __construct()
     {
        parent::__construct();
        $this->data['main_menu']  = 'Union';
        $this->data['sub_menu']   = 'View';

     }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $this->data['data'] = Union::all();

        return view('backend.union.view-union',$this->data);

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

         return view('backend.union.form-union',$this->data);
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
          'union'     => 'required|unique:unions,union',
        ]);

        $union                 = New Union();

        $union->division_id     = $request->division_id;
        $union->district_id     = $request->district_id;
        $union->upazilla_id     = $request->upazilla_id;
        $union->union           = $request->union;

        if($union->save()){
            Session::flash('message','Data Added Successfully');
        }

        return redirect()->to('union_all');

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
       
        $this->data['editdata']             = Union::findOrFail($id);
        $this->data['division']             = Division::arrayForSelectDivision();
        // $this->data['district']             = ZillaNew::findOrFail($id);
       

        return view('backend.union.form-union',$this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UnionRequest $request, $id)
    {
        $union                  = Union::find($id);

        $union->division_id     = $request->division_id;
        $union->district_id     = $request->district_id;
        $union->upazilla_id     = $request->upazilla_id;
        $union->union           = $request->union;

        if($union->save()){
            Session::flash('message','Data Update Successfully');
        }

        return redirect()->to('union_all');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         if(Union::find($id)->delete()){
            Session::flash('message','Data Delete Successfully');
        }
        return redirect()->to('union_all');
    }


}
