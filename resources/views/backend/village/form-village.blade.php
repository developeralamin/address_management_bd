@extends('layout.app')

@section('content')

 <div class="row page-header mb-5">

@if(@$editdata)
     <div class="col-md-6">
       <h2 class="m-0 font-weight-bold text-primary">
          Update Village
         </h2>
     </div>
@else
    <div class="col-md-6">
       <h2 class="m-0 font-weight-bold text-primary">
          Add Village
         </h2>
     </div>

@endif
 
  	<div class="col-md-6 text-right">
  	 	<a href="{{ url('village') }}" class="btn btn-danger"> <i class="fa fa-minus"></i> Back </a>
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
         Update Village
      </h6>  
     </div>
    @else

    <div class="card-header py-3">
       <h6 class="m-0 font-weight-bold text-primary">
         Add Village
      </h6>  
     </div>

    @endif 

      <div class="card-body row justify-content-md-center">
  <div class="col-md-6">

    @if(@$editdata)

    {{  Form::model($editdata,['route' =>['village.update',$editdata->id], 'method' => 'put']) }}
   
    @else

    {!! Form::open(['route' => 'village.store','method' => 'post']) !!}

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
      {{ ($errors->has('division_id'))?($errors->first('division_id')):'' }}
     </font>
  </div>

  <div class="form-group">
    <label for="district_id">District Name<span class="text-danger">*</span></label>
   <select name="district_id" class="form-control" id="district_id">
         <option value=""> Select District</option>
  </select>  
   <font style="color: red">
      {{ ($errors->has('district_id'))?($errors->first('district_id')):'' }}
     </font>
  </div>


  <div class="form-group">
    <label for="upazilla_id">Upazilla Name<span class="text-danger">*</span></label>
    {{--  {{ Form::text('name', NULL, [ 'class'=>'form-control', 'id' => 'division', 'placeholder' => 'Write Upazilla Name' ]) }} --}}
     <select name="upazilla_id" class="form-control" id="upazilla_id">
         <option value=""> Select Upazilla</option>
    </select>  
      <font style="color: red">
      {{ ($errors->has('upazilla_id'))?($errors->first('upazilla_id')):'' }}
     </font>
  </div>


<div class="form-group">
    <label for="union_id">Union Name<span class="text-danger">*</span></label>
     {{-- {{ Form::text('union', NULL, [ 'class'=>'form-control', 'id' => 'division', 'placeholder' => 'Write Union Name' ]) }} --}}
      <select name="union_id" class="form-control" id="union_id">
         <option value=""> Select Union</option>
     </select>  

      <font style="color: red">
      {{ ($errors->has('union_id'))?($errors->first('union_id')):'' }}
     </font>
  </div>

<div class="form-group">
    <label for="division">Word No.<span class="text-danger">*</span></label>
     {{-- {{ Form::text('word', NULL, [ 'class'=>'form-control', 'id' => 'division', 'placeholder' => 'Write Word No.' ]) }} --}}
     <select name="word_id" class="form-control" id="word_id">
         <option value=""> Select Word</option>
     </select>  
      <font style="color: red">
      {{ ($errors->has('word_id'))?($errors->first('word_id')):'' }}
     </font>
  </div>


<div class="form-group">
    <label for="division">Village.<span class="text-danger">*</span></label>
     {{ Form::text('village', NULL, [ 'class'=>'form-control', 'id' => 'division', 'placeholder' => 'Write Village' ]) }}
      <font style="color: red">
      {{ ($errors->has('village'))?($errors->first('village')):'' }}
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


{{-- For select district--}}

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
            $('#district_id').val(district_id).trigger('change');
         }
       }
    });
   });
  });

</script>


{{-- For select Upazilla--}}

<script>
  $(function() {
   $(document).on('change','#district_id',function(){

    var district_id = $(this).val();

    $.ajax({
       type:"GET",
       url:"{{route('default.get-upazilla')}}",
       data:{district_id:district_id},
       success:function(data){
        var html = '<option value="">Select Upazilla</option>';
        $.each(data,function(key,v) { 
          html += '<option value="'+v.id+'">'+v.name+'</option>';
        });

        $('#upazilla_id').html(html);

         var upazilla_id = "{{ @$editdata->upazilla_id }}";
         if(upazilla_id != ''){
            $('#upazilla_id').val(upazilla_id).trigger('change');
         }
       }
    });
   });
  });

</script>


{{-- For select Union--}}

<script>
  $(function() {
   $(document).on('change','#upazilla_id',function(){

    var upazilla_id = $(this).val();

    $.ajax({
       type:"GET",
       url:"{{route('default.get-union')}}",
       data:{upazilla_id:upazilla_id},
       success:function(data){
        var html = '<option value="">Select Union</option>';
        $.each(data,function(key,v) { 
          html += '<option value="'+v.id+'">'+v.union+'</option>';
        });

        $('#union_id').html(html);

         var union_id = "{{ @$editdata->union_id }}";
         if(union_id != ''){
            $('#union_id').val(union_id).trigger('change');
         }
       }
    });
   });
  });

</script>



{{-- For select word--}}

<script>
  $(function() {
   $(document).on('change','#union_id',function(){
    var union_id = $(this).val();
    $.ajax({
       type:"GET",
       url:"{{route('default.get-word')}}",
       data:{union_id:union_id},
       success:function(data){
        var html = '<option value="">Select Word</option>';
        $.each(data,function(key,v) { 
          html += '<option value="'+v.id+'">'+v.word+'</option>';
        });

        $('#word_id').html(html);

         var word_id = "{{ @$editdata->word_id }}";
         if(word_id != ''){
            $('#word_id').val(word_id);
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