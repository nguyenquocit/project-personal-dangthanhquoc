@extends('admin/layout-admin')
@section('adminContent')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add Order Form</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url('/admin/home')}}">Home</a></li>
              <li class="breadcrumb-item active">Order Form</li>
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
              <form action="{{ url('editorder')}}" method="get">
                @foreach($Order as $Order)
                <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputPassword1">ID</label>
                    <input type="text" class="form-control" name="id" value="{{ $Order->id}}" id="exampleInputPassword1" placeholder="Name" required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Name</label>
                    <input type="text" class="form-control" name="name" value="{{ $Order->name_Order}}" id="exampleInputPassword1" placeholder="Name" required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Address</label>
                    <input type="text" class="form-control" name="address" value="{{ $Order->address_Order}}" id="exampleInputPassword1" placeholder="Address" required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Phone</label>
                    <input type="text" class="form-control" name="phone" value="{{ $Order->phone_Order}}" id="exampleInputPassword1" placeholder="Phone" required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Email</label>
                    <input type="text" class="form-control" name="email" value="{{ $Order->email_Order}}" id="exampleInputPassword1" placeholder="Email" required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Product Name</label>
                    <input type="text" class="form-control" name="nameprd" value="{{ $Order->prd_name}}" id="exampleInputPassword1" placeholder="Product Name" required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputFile">Product Image</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" name="imgpr" value="{{ $Order->prd_img}}" id="exampleInputFile" required>
                        <label class="custom-file-label" name="imgpr" for="exampleInputFile">Choose file</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text">Upload</span>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Product Price</label>
                    <input type="text" class="form-control" name="pricepr" value="{{ $Order->prd_price}}" id="exampleInputPassword1" placeholder="Product Price" required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Quantily</label>
                    <input type="number" class="form-control" name="quantily" value="{{ $Order->quantily}}" id="exampleInputPassword1" placeholder="Quantily" required>
                  </div>
                  <div class="form-group">
                  <label for="exampleSelectRounded0">Status</label>
                        <select class="custom-select rounded-0" name="status" value="{{ $Order->status}}" id="exampleSelectRounded0">
                            <option value="0">Uncomfimed</option>
                            <option value="1">Comfimed</option>
                        </select>
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