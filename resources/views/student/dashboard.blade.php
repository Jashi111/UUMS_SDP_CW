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
          <h5>Student Materials</h5>
          <div class="col-lg-4 col-6">
            <div class="small-box bg-success">
              <div class="inner">
                <h3>GPA Calculator</h3>
                <p>Calculate your GPA</p>
              </div>
              <div class="icon">
                <i class="fa-solid fa-book-open"></i>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-6">
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>Grades</h3>
                <p>Exam Grades</p>
              </div>
              <div class="icon">
                <i class="fa-solid fa-book-open"></i>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-6">
            <div class="small-box bg-info">
              <div class="inner">
                <h3>Study Groups</h3>
                <p>Gather, Share knowledge & Learn</p>
              </div>
              <div class="icon">
                <i class="fa-solid fa-book-open"></i>
              </div>
            </div>
          </div>
        </div>
        <hr>
      </div>
    </section>
  </div>
  
@endsection