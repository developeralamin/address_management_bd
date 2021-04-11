<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\WordNoRequest;
use App\Models\Division;
use App\Models\ZillaNew;
use App\Models\Thanaaa;
use App\Models\Union;
use App\Models\WordNo;


class WordNoController extends Controller
{
   public function __construct()
     {
        parent::__construct();
        $this->data['main_menu']  = 'Word';
        $this->data['sub_menu']   = 'View';

     }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
   
        $this->data['data'] = WordNo::all();

        return view('backend.word_no.view-word',$this->data);

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

         return view('backend.word_no.form-word_no',$this->data);
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
          'word'     => 'required',
        ]);

        $word_no                 = New WordNo();

        $word_no->division_id     = $request->division_id;
        $word_no->district_id     = $request->district_id;
        $word_no->upazilla_id     = $request->upazilla_id;
        $word_no->union_id        = $request->union_id;
        $word_no->word            = $request->word;

        if($word_no->save()){
            Session::flash('message','Data Added Successfully');
        }

        return redirect()->to('word_no_all');

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
       
        $this->data['editdata']             = WordNo::findOrFail($id);
        $this->data['division']             = Division::arrayForSelectDivision();
        // $this->data['district']             = ZillaNew::findOrFail($id);
       

        return view('backend.word_no.form-word_no',$this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(WordNoRequest $request, $id)
    {
        $word_no                 = WordNo::find($id);

        $word_no->division_id     = $request->division_id;
        $word_no->district_id     = $request->district_id;
        $word_no->upazilla_id     = $request->upazilla_id;
        $word_no->union_id        = $request->union_id;
        $word_no->word            = $request->word;

        if($word_no->save()){
            Session::flash('message','Data Update Successfully');
        }

        return redirect()->to('word_no_all');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         if(WordNo::find($id)->delete()){
            Session::flash('message','Data Delete Successfully');
        }
        return redirect()->to('word_no_all');
    }


}
