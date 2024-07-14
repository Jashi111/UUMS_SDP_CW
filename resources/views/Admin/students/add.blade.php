@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add New Student</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-tools">
                      <div class="input-group input-group-sm" style="width: 150px;">
                        <div>
                          <a href="{{ url('admin/students/list') }}" class="btn btn-primary float-end"><i class="fas fa-backward"></i> Back</a>
                        </div>
                      </div>
                    </div>
                  </div>
              <form action="" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                  <div class="row">
                  <div class="form-group col-md-6">
                    <label for="email">E-Mail <span style="color: red">*</span></label>
                      <input type="text" class="form-control" name="email" id="email" value="{{ old('email') }}" placeholder="Enter Email">
                      <div style="color: rgb(196, 3, 3)">{{ $errors->first('email') }}</div>
                    </div>
                    <div class="form-group col-md-6">
                      <h3 style="margin-top: 35px">@eureka.com</h3>
                    </div>
                  </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
@endsection