@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><i class="nav-icon fas fa-user-shield"></i> Learning Materials</h1>
          </div>
          <div class="col-sm-6">
            @include('message')
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Search Filter-->

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Search</h3>
              </div>
              <form action="" method="get">
                <div class="card-body">
                  <div class="row">
                    <div class="form-group col-md-3">
                      <label for="subject">Subject</label>
                      <input type="text" class="form-control" name="subject" id="subject" value="{{ Request::get('subject') }}" placeholder="Subject">
                    </div>
                    <div class="form-group col-md-3">
                      <button type="submit" class="btn btn-success" style="margin-top: 32px">Search</button>
                      <a href="{{ url('lecturer/list') }}" class="btn btn-warning" style="margin-top: 32px">Reset</a>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- /Search Filter-->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- /.row -->
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <div class="row">
                      <a href="{{ url('lecturer/add') }}" class="btn btn-primary float-end"><i class="fas fa-plus"></i> Add New Materials</a>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Subject</th>
                      <th>Document Name</th>
                      <th>Lecturer</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>

                  @foreach ($fetchedRecord as $item)
                      <tr>
                        {{-- <td>{{ $loop->iteration }}</td> --}}
                        <td>{{ ($fetchedRecord->currentPage() == 1) ? $loop->iteration : ($loop->iteration + 5) }}</td>
                        <td>{{ $item->subject }}</td>
                        <td>{{ $item->document_name }}</td>
                        <td>{{ $item->lecturer }}</td>
                        <td>
                          <a href="{{ url('lecturer/'.$item->id.'/download') }}" type="button" class="btn btn-outline-success btn-sm"><i class="fas fa-download"></i></a>
                          <a href="{{ url('lecturer/'.$item->id.'/delete') }}" type="button" class="btn btn-outline-danger btn-sm" onclick="return confirm('Are you sure you want to delete this Record?')"> <i class="fas fa-trash"></i></a>
                        </td>
                      </tr>
                  @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- Pagination -->
            <div>
              {{ $fetchedRecord->links('pagination::bootstrap-5') }}
            </div>

          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  
@endsection