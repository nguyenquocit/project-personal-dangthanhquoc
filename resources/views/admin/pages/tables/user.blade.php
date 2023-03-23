@extends('admin/layout-admin')
@section('adminContent')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Users Table</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url('/admin/home')}}">Home</a></li>
              <li class="breadcrumb-item active">Users</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
<section class="content">
      <div class="card">
        <div class="card-header">
          <div class="row">
          <a href="{{ url('admin/pages/forms/adduser')}}" class="btn btn-success"> <i class="fa fa-trash-o"></i>Add New</a>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
        <table id="cart" class="table table-hover table-condensed">
    <thead>
        <tr>
            <th style="width:10%">ID</th>
            <th style="width:20%">Name</th>
            <th style="width:20%">Email</th>
            <th style="width:20%">Role</th>
            <th style="width:10%">Action</th>
        </tr>
    </thead>
    <tbody>
        @if(session())
            @foreach($User as $cart)
                <tr>
                    <td>
                        {{$cart->id}}
                    </td>
                    <td>
                      <div>
                        <h5>{{ $cart->name }}</h6>
                      </div>
                    </td>
                    <td>
                      <div>
                        <h5>{{ $cart->email }}</h6>
                      </div>
                    </td>
                    <td>
                      <div>
                        <h5>{{ $cart->role }}</h6>
                      </div>
                    </td>
                    <td class="actions" data-th="">
                      <a href="{{ url('deleteuser/'.$cart->id)}}" onclick="return confirm('Are you sure?')" class="btn btn-danger"> <i class="fa fa-trash-o"></i>Delete</a>
                      <a href="{{ url('admin/pages/forms/edituser/'.$cart->id)}}" class="btn btn-success"> <i class="fa fa-trash-o"></i>Edit</a>
                    </td>
                </tr>
            @endforeach
            
        @endif
    </tbody>
    
</table>
{{ $User->links()}}
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </section>
    <!-- /.content -->
  </div>
@endsection