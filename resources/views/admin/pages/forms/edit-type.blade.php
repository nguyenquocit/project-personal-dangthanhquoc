@extends('admin/layout-admin')
@section('adminContent')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Type Product Form</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url('/admin/home')}}">Home</a></li>
              <li class="breadcrumb-item active">Type product Form</li>
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
              <form action="{{ url('editType')}}" method="get">
                @foreach($ProductType as $type)
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">ID</label>
                    <input type="text" name="idtype" class="form-control" value="{{ $type->id}}" placeholder="ID" reqiured>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Type Name</label>
                    <input type="text" class="form-control" name="typenameed" value="{{$type->type_name}}" id="exampleInputPassword1" placeholder="Type Name" required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputFile">Type Image</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" name="imgtyped" id="exampleInputFile" required>
                        <label class="custom-file-label" name="imgtyped" for="exampleInputFile">Choose file</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text">Upload</span>
                      </div>
                    </div>
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