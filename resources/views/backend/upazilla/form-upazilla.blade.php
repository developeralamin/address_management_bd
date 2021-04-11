@extends('layout.app')

@section('content')

 <div class="row page-header mb-5">

@if(@$editdata)
     <div class="col-md-6">
       <h2 class="m-0 font-weight-bold text-primary">
          Update Upazilla
         </h2>
     </div>
@else
    <div class="col-md-6">
       <h2 class="m-0 font-weight-bold text-primary">
          Add Upazilla
         </h2>
     </div>

@endif
 
  	<div class="col-md-6 text-right">
  	 	<a href="{{ url('upazilla') }}" class="btn btn-danger"> <i class="fa fa-minus"></i> Back </a>
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

 @if(@$editdata)
     <div class="card-header py-3">
       <h6 class="m-0 font-weight-bold text-primary">
         Update Upazilla
      </h6>  
     </div>
    @else

    <div class="card-header py-3">
       <h6 class="m-0 font-weight-bold text-primary">
         Add Upazilla
      </h6>  
     </div>

    @endif 

      <div class="card-body row justify-content-md-center">
  <div class="col-md-6">

    @if(@$editdata))

    {{  Form::model($editdata,['route' =>['upazilla.update',$editdata->id], 'method' => 'put']) }}
   
    @else

    {!! Form::open(['route' => 'upazilla.store','method' => 'post']) !!}

    @endif

  
  <div class="form-group">
    <label for="email">Division Name<span class="text-danger">*</span></label>
     {{ Form::select('division_id',$division,NULL, [ 'class'=>'form-control', 'id' => 'division_id', 'placeholder' => 'Select Division' ]) }}

   {{--   <select name="division_id" class="form-control" id="division_id">
         <option value=""> Select Division</option>
         @foreach($division as $key => $division)
            <option value="{{ $division->id }}">{{ $division->name }}</option>}  
           @endforeach
   </select>   --}}

    <font style="color: red">
      {{ ($errors->has('division'))?($errors->first('division')):'' }}
     </font>
  </div>

  <div class="form-group">
    <label for="district_id">District Name<span class="text-danger">*</span></label>
   <select name="district_id" class="form-control" id="district_id">
         <option value=""> Select District</option>
  </select>  
   <font style="color: red">
      {{ ($errors->has('name'))?($errors->first('name')):'' }}
     </font>
  </div>

  <div class="form-group">
    <label for="division">Upazilla Name<span class="text-danger">*</span></label>
     {{ Form::text('name', NULL, [ 'class'=>'form-control', 'id' => 'division', 'placeholder' => 'Write Upazilla Name' ]) }}
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

<script src="{{ asset('asset/jquery-3.6.0.min.js') }}"></script>
{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> --}}

<script>
  $(function() {
   $(document).on('change','#division_id',function(){

    var division_id = $(this).val();

    $.ajax({
       type:"GET",
       url:"{{route('default.get-district')}}",
       data:{division_id:division_id},
       success:function(data){
        var html = '<option value="">Select District</option>';
        $.each(data,function(key,v) { 
          html += '<option value="'+v.id+'">'+v.name+'</option>';
        });

        $('#district_id').html(html);

         var district_id = "{{ @$editdata->district_id }}";
         if(district_id != ''){
            $('#district_id').val(district_id);
         }


       }

    });

   });
  });

</script>

<script>
  $(function() {
   var division_id = "{{ @$editdata->division_id }}";

   if(division_id){
     $('#division_id').val(division_id).trigger('change');
   }

  });

</script>

@stop