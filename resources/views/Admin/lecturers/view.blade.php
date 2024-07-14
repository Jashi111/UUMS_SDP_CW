@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Lecturer info</h1>
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
                          <a href="{{ url('admin/lecturers/list') }}" class="btn btn-primary float-end"><i class="fas fa-backward"></i> Back</a>
                        </div>
                      </div>
                    </div>
                  </div>
              <form action="" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                  <div class="row">
                    <div class="form-group col-md-6">
                      <label for="role">Role</label>
                      <select class="form-control" name="role" id="role" readonly>
                        <option {{($fetchedRecord->role === 'Lecturer') ? 'selected' : '' }} value="Lecturer">Lecturer</option>
                      </select>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="status">Status</label>
                      <select class="form-control" name="status" id="status" readonly>
                        <option {{($fetchedRecord->status === 'Active') ? 'selected' : '' }} value="Active">Active</option>
                        <option {{($fetchedRecord->status === 'Inactive') ? 'selected' : '' }} value="Inactive">Inactive</option>
                      </select>
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-md-6">
                      <label for="first_name">First Name</label>
                      <input type="text" class="form-control" name="first_name" id="first_name" value="{{ $fetchedRecord->first_name }}" placeholder="Enter First Name" readonly>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="last_name">Last Name</label>
                      <input type="text" class="form-control" name="last_name" id="last_name" value="{{ $fetchedRecord->last_name }}" placeholder="Enter Last Name" readonly>
                    </div>
                  </div>
                  <div class="row">
                  <div class="form-group col-md-6">
                    <label for="email">E-Mail</label>
                      <input type="email" class="form-control" name="email" id="email" value="{{ $fetchedRecord->email }}" placeholder="Enter Email" readonly>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="birth_date">Date of Birth</label>
                      <input type="date" class="form-control" name="birth_date" id="birth_date" value="{{ $fetchedRecord->birth_date }}" readonly>
                    </div>
                  </div>
                  <div class="row">
                  <div class="form-group col-md-6">
                      <label for="gender">Gender</label>
                      <select class="form-control" name="gender" id="gender" readonly>
                        <option value="">Select Gender</option>
                        <option {{($fetchedRecord->gender === 'Male') ? 'selected' : '' }} value="Male">Male</option>
                        <option {{($fetchedRecord->gender === 'Female') ? 'selected' : '' }} value="Female">Female</option>
                      </select>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="nic">NIC Number</label>
                      <input type="text" class="form-control" name="nic" id="nic" value="{{ $fetchedRecord->nic }}" placeholder="Enter NIC Number" readonly>
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-md-6">
                      <label for="mobile_number">Mob Number </label>
                      <input type="text" class="form-control" name="mobile_number" id="mobile_number" value="{{ $fetchedRecord->mobile_number }}" placeholder="Enter Mobile Number" readonly>

                      <label for="joined_date">Joined Date</label>
                      <input type="date" class="form-control" name="joined_date" id="joined_date" value="{{ $fetchedRecord->joined_date }}" readonly>
                    </div>

                    <div class="form-group col-md-6">
                      <label for="address">Address</label>
                      <textarea class="form-control" name="address" id="address" rows="4" value="" placeholder="Enter Address" readonly>{{ $fetchedRecord->address }}</textarea>
                    </div>
                  </div>
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