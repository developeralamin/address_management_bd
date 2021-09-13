@extends('layout.app')

@section('content')

 <div class="row">
    


<!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-secondary shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-sm font-weight-bold text-primary text-uppercase mb-1"> Total Division </div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">
                 {{ $division }}
              </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-users fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>


<!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-sm font-weight-bold text-primary text-uppercase mb-1"> Total District </div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">
                {{ $district }}
              </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-users fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>


<!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-danger  shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-sm font-weight-bold text-primary text-uppercase mb-1"> Total Upazilla </div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">
                {{ $thana }}
              </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-users fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>




<!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-info shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-sm font-weight-bold text-primary text-uppercase mb-1"> Total Union </div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">
                  {{ $union }}
              </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-users fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

 
    
{{-- Earnings (Monthly) Card Example --}}
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-sm font-weight-bold text-primary text-uppercase mb-1"> Total Word No </div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">
                 {{ $word }}
              </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-users fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>


<!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-danger shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-sm font-weight-bold text-primary text-uppercase mb-1"> Total Village </div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">
                 {{ $village }}
              </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-users fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>


     </div>
@stop