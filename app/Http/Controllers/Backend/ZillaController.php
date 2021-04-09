<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\ZillaRequest;
use App\Models\Division;
use App\Models\ZillaNew;



class ZillaController extends Controller
{
    public function __construct()
     {
        parent::__construct();
        $this->data['main_menu']  = 'District';
        $this->data['sub_menu']   = 'View';

     }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['alldata']  = ZillaNew::all();

        return view('backend.district.view-district',$this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->data['mode']             = 'Create';
        $this->data['division']         = Division::arrayForSelectDivision();
        // $this->data['divisions']        = Division::all();
        return view('backend.district.form-district',$this->data);
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
          'name'     => 'required|unique:zilla_news,name',
        ]);

        $formdata  = $request->all();

         if(ZillaNew::create($formdata) ) {
            Session::flash('message','Data Registration Successfully');
         }
         return redirect()->to('district');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $this->data['mode']            ='Edit';
        $this->data['alldata']          = ZillaNew::findOrFail($id);
        $this->data['division']         = Division::arrayForSelectDivision();

         return view('backend.district.form-district',$this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ZillaRequest $request, $id)
    {
          $data                            = $request->all();


          $zilla                           = ZillaNew::find($id);

      
          $zilla->division_id              =$data['division_id'];
          $zilla->name                     =$data['name'];

          if($zilla->save() ) {
            Session::flash('message','Data Update Successfully');
          }
          return redirect()->to('district');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(ZillaNew::find($id)->delete()){
            Session::flash('message','Data Delete Successfully');
        }
        return redirect()->to('district');
    }
}
