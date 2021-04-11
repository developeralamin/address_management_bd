@extends('layout.app')

@section('content')


  <div class="row page-header mb-5">
     <div class="col-md-6">
       <h2 class="m-0 font-weight-bold text-primary">
        Manage Word Number
         </h2>
     </div>
     <div class="col-md-6 text-right">
      <a href="{{ route('word_no_all.create') }}" class="btn btn-success"> <i class="fa fa-plus"></i> Add Word Number</a>
     </div>
      
  </div>

<!-- DataTales Example -->
<div class="card shadow page-header mb-4">
   <div class="card-header py-3">
       <h6 class="m-0 font-weight-bold text-primary"> All Word Number</h6>
    </div>
  <div class="card-body">
     <div class="table-responsive">
   <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                  <tr>                                              
                    <th>ID</th>      
                    <th>Division</th>                             
                    <th>District</th>                             
                    <th>Upazilla</th>                             
                    <th>Union</th>                             
                    <th>Word No</th>                             
                    <th class="text-right">Actions</th>                     
                    </tr>
                </thead>

               <tfoot>
                  <tr>                                              
                    <th>ID</th>      
                    <th>Division</th>                             
                    <th>District</th>                             
                    <th>Upazilla</th> 
                    <th>Union</th>                            
                    <th>Word No</th>                             
                    <th class="text-right">Actions</th>                     
                    </tr>
            </tfoot>

                                    
       <tbody>
        
@foreach($data as $key => $word_no_all)

       <tr>
          <td>{{ $key+1}}</td>
          {{-- <td>{{ Optional($word_no_all->division)->name}}</td> --}}
          {{-- <td>{{ $word_no_all['district']['name']}}</td> --}}
          <td>{{ Optional($word_no_all->division)->name}}</td>
          <td>{{ $word_no_all['district']['name']}}</td>
          <td>{{ $word_no_all['upazilla']['name']}}</td>
          <td>{{ $word_no_all['union']['union']}}</td>
          <td>{{ $word_no_all->word}}</td>
          
         
          
          <td class="text-right">
 <form method='post' action="{{ route('word_no_all.destroy',['word_no_all' => $word_no_all->id]) }}">
            @csrf
        {{-- <a href="{{ route('word_no_all.show',['word_no_all' =>$word_no_all->id]) }}"class="btn btn-info">
          <i class="fa fa-eye"></i>
         </a>   --}} 
        <a href="{{ route('word_no_all.edit',['word_no_all' =>$word_no_all->id]) }}"class="btn btn-info">
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