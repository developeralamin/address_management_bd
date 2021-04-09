@extends('layout.app')

@section('content')


  <div class="row page-header mb-5">
  	 <div class="col-md-6">
  	 	 <h2 class="m-0 font-weight-bold text-primary">
  	 	 	Manage Division
         </h2>
  	 </div>
  	 <div class="col-md-6 text-right">
  	 	<a href="{{ route('division.create') }}" class="btn btn-success"> <i class="fa fa-plus"></i> Add Division</a>
  	 </div>
  	 	
  </div>

<!-- DataTales Example -->
<div class="card shadow page-header mb-4">
   <div class="card-header py-3">
       <h6 class="m-0 font-weight-bold text-primary"> All Division</h6>
    </div>
  <div class="card-body">
     <div class="table-responsive">
   <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                  <tr>                                              
                    <th>ID</th>      
                    <th>Division Name</th>                             
                    <th class="text-right">Actions</th>                     
                    </tr>
                </thead>

               <tfoot>
                  <tr>                                              
                    <th>ID</th>      
                    <th>Division Name</th>                             
                    <th class="text-right">Actions</th>                     
                    </tr>
            </tfoot>

                                    
       <tbody>
        
@foreach($alldata as $key => $value)

       <tr>
          <td>{{ $key+1}}</td>
          <td>{{ $value->name}}</td>
          
         
          
          <td class="text-right">
  <form method='post' action="{{ url('division/' . $value->id) }}">
            @csrf
{{--         <a href="{{ route('division.details',$value->id) }}"class="btn btn-info">
          <i class="fa fa-eye"></i>
         </a>    --}}
        <a href="{{ route('division.edit',$value->id) }}"class="btn btn-info">
          <i class="fa fa-edit"></i>
         </a>  

        @method('DELETE')               
       <button onclick="return confirm('Are you sure?')" type="submit" class="btn btn-danger"> <i class="fa fa-trash"></i></button> 
    </form>                            
   </td>
  </tr>

@endforeach
       </tbody>
   </table>
   </div>
  </div>
 </div>


@stop