@extends('layouts.app')

@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">{{ Auth::user()->role }} Dashboard</h1>
          </div>
        </div>
      </div>
    </div>
    <!-- /.content-header -->    
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">

        {{-- User Management --}}
        <div class="row">
          <h5>User Management</h5>
          <div class="col-lg-3 col-6">
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>{{ $studentCount }}</h3>
                <p>Active Students</p>
              </div>
              <div class="icon">
                <i class="fa-solid fa-user-tie"></i>
              </div>
              <a href="{{ url('admin/students/list') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
        </div>
        <hr>
      </div>
    </section>
  </div>
  
@endsection