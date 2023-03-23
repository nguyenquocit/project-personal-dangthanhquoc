@extends('admin/layout-admin')
@section('adminContent')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Type Product Table</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url('/admin/home')}}">Home</a></li>
              <li class="breadcrumb-item active">Type Product</li>
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
          <a href="{{ url('admin/pages/forms/add-type')}}" class="btn btn-success"> <i class="fa fa-trash-o"></i>Add New</a>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
        <table id="cart" class="table table-hover table-condensed">
    <thead>
        <tr>
            <th style="width:10%">ID</th>
            <th style="width:20%">type Img</th>
            <th style="width:20%">Type Name</th>
            <th style="width:10%">Action</th>
        </tr>
    </thead>
    <tbody>
        @if(session())
            @foreach($type as $cart)
                <tr>
                    <td>
                        {{$cart->id}}
                    </td>
                    <td data-th="Product">
                        <div class="row">
                            <div class="col-sm-3 hidden-xs"><img src="{{ url('asset/img/categories/'.$cart->type_img)}}" width="100" height="100" class="img-responsive"/></div>
                        </div>
                    </td>
                    <td>
                      <div>
                        <h5>{{ $cart->type_name }}</h6>
                      </div>
                    </td>
                    <td class="actions" data-th="">
                      <a href="{{ url('deletetype/'.$cart->id)}}" onclick="return confirm('Are you sure?')" class="btn btn-danger"> <i class="fa fa-trash-o"></i>Delete</a>
                      <a href="{{ url('admin/pages/forms/edit-type/'.$cart->id)}}" class="btn btn-success"> <i class="fa fa-trash-o"></i>Edit</a>
                    </td>
                </tr>
            @endforeach
            
        @endif
    </tbody>
    
</table>
{{ $type->links()}}
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </section>
    <!-- /.content -->
  </div>
@endsection