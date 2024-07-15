@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add New Lecture Materials</h1>
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
                          <a href="{{ url('admin/admin/list') }}" class="btn btn-primary float-end"><i class="fas fa-backward"></i> Back</a>
                        </div>
                      </div>
                    </div>
                  </div>
              <form action="" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                  <div class="row">
                    <div class="form-group col-md-4">
                      <label for="subject">Subject <span style="color: red">*</span></label>
                      <select class="form-control" name="subject" id="subject" value="{{ old('subject') }}">
                        <option value="Maths">Maths</option>
                        <option value="Science">Science</option>
                      </select>
                    </div>
                    <div class="form-group col-md-8">
                      <label for="document_name">Document Name <span style="color: red">*</span></label>
                      <input type="text" class="form-control" name="document_name" id="document_name" value="{{ old('document_name') }}" placeholder="Enter Document Name">
                      <div style="color: rgb(196, 3, 3)">{{ $errors->first('first_name') }}</div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-md-12">
                      <label for="file">Browse Materials</label>
                      <input type="file" class="form-control" name="file" id="file" value="{{ old('file') }}">
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