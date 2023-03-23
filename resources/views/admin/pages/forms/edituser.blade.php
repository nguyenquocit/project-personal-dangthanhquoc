@extends('admin/layout-admin')
@section('adminContent')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit User Form</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url('/admin/home')}}">Home</a></li>
              <li class="breadcrumb-item active">User Form</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Quick Example</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{ url('edituser')}}" method="get">
                @foreach($User as $User)
                <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputPassword1">ID</label>
                    <input type="text" class="form-control" name="id" value="{{$User->id}}" id="exampleInputPassword1" placeholder="ID" required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">UserName</label>
                    <input type="text" class="form-control" name="name" value="{{$User->name}}" id="exampleInputPassword1" placeholder="Name" required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Email</label>
                    <input type="text" class="form-control" name="email" value="{{$User->email}}" id="exampleInputPassword1" placeholder="Email" required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" name="password" value="{{$User->password}}" id="exampleInputPassword1" placeholder="Product Name" required>
                  </div>
                </div>
                @endforeach
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  @endsection