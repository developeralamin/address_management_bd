<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\DivisionRequest;
use App\Models\Division;


class DivisionController extends Controller
{

   public function __construct()
     {
        parent::__construct();
        $this->data['main_menu']  = 'Division';
        $this->data['sub_menu']   = 'View';

     }

	 /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
// SubjectAssign::select('class_id')->groupBy('class_id')->get();
    public function index()
    {
    	$this->data['alldata']  = Division::orderBy('id','DESC')->get();

    	return view('backend.division.view-division',$this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

  public function create()
   {

   	$this->data['mode'] = 'create';
	return view('backend.division.form-division',$this->data);
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
          'name' => 'required|unique:divisions,name',
        ]);

  	   $formdata   = $request->all();
       
       if(Division::create($formdata)){
       	Session::flash('message','Data Add Successfully');
       }

       return redirect()->route('division');
  }

     /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


  public function edit($id)
  {
  	    $this->data['mode']              ='Edit';
        $this->data['alldata']           = Division::findOrFail($id);

      return view('backend.division.form-division',$this->data);
  }

   /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

 public function update(DivisionRequest $request, $id)
    {
         $data                        = $request->all();

         $division                    = Division::find($id);
         $division->name              = $data['name'];

         if($division->save() ){
         	Session::flash('message','Data Update Successfully');
         }

         return redirect()->route('division');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
  public function destroy($id)
  {
  	   if(Division::find($id)->delete() ) {
            Session::flash('message','Data Delete Successfully');
       }
         return redirect()->route('division');
  }


}
