@extends('layout.app')

@section('content')

 <div class="row page-header mb-5">

@if($mode == 'Edit')
     <div class="col-md-6">
       <h2 class="m-0 font-weight-bold text-primary">
          Update Division
         </h2>
     </div>
@else
    <div class="col-md-6">
       <h2 class="m-0 font-weight-bold text-primary">
          Add Division
         </h2>
     </div>

@endif
 

  	<div class="col-md-6 text-right">
  	 	<a href="{{ route('division') }}" class="btn btn-danger"> <i class="fa fa-minus"></i> Back </a>
  	 </div>
  </div>
  
{{-- @if ($errors->any())
      <div class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
  @endif --}}
<!-- DataTales Example -->

<div class="card shadow page-header mb-4"> 

  @if($mode == 'Edit')
     <div class="card-header py-3">
       <h6 class="m-0 font-weight-bold text-primary">
         Update Division
      </h6>  
     </div>

    @else
    <div class="card-header py-3">
       <h6 class="m-0 font-weight-bold text-primary">
         Add Division
      </h6>  
     </div>

    @endif 

      <div class="card-body row justify-content-md-center">
  <div class="col-md-6">

    @if($mode == 'Edit')

    {{  Form::model($alldata,['route' =>['division.update',$alldata->id], 'method' => 'post']) }}
   
    @else

    {!! Form::open(['route' => 'division.store','method' => 'post']) !!}

    @endif

  <div class="form-group">
    <label for="division">Division Name<span class="text-danger">*</span></label>
     {{ Form::text('name', NULL, [ 'class'=>'form-control', 'id' => 'division', 'placeholder' => ' Write Division Name' ]) }}
      <font style="color: red">
      {{ ($errors->has('name'))?($errors->first('name')):'' }}
     </font>
  </div>

{{-- 
  <div class="form-group">
    <label for="organized_by">Give Blood<span class="text-danger">*</span></label>
     {{ Form::text('give_blood', NULL, [ 'class'=>'form-control', 'id' => 'organized_by', 'placeholder' => 'Give Blood' ]) }}
  </div>

  <div class="form-group">
    <label for="organized_by">Receive Blood<span class="text-danger">*</span></label>
     {{ Form::text('receive_blood', NULL, [ 'class'=>'form-control', 'id' => 'organized_by', 'placeholder' => 'Receive Blood' ]) }}
  </div> --}}


  <button type="submit" class="btn btn-primary">Submit</button>

{!! Form::close() !!}                             
                                    
   </div>
   </div>
  
 </div>




@stop