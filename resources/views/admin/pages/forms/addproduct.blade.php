@extends('admin/layout-admin')
@section('adminContent')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Product Form</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url('/admin/home')}}">Home</a></li>
              <li class="breadcrumb-item active">Add product Form</li>
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
              <form action="{{ url('addproducts')}}" method="get">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputPassword1">Product Name</label>
                    <input type="text" class="form-control" name="namepr" id="exampleInputPassword1" placeholder="Product Name" required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Product Price</label>
                    <input type="text" class="form-control" name="pricepr" id="exampleInputPassword1" placeholder="Product Price" required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Product Color</label>
                    <input type="text" class="form-control" name="colorpr" id="exampleInputPassword1" placeholder="Product Color" required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Product Description</label>
                    <input type="text" class="form-control" name="descpr" id="exampleInputPassword1" placeholder="Product Description" required>
                  </div>
                  <div class="form-group">
                  <label for="exampleSelectRounded0">Feature</label>
                        <select class="custom-select rounded-0" name="featurepr" id="exampleSelectRounded0">
                            <option value="0">NO</option>
                            <option value="1">YES</option>
                        </select>
                    </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Stock</label>
                    <input type="text" class="form-control" name="stockpr" id="exampleInputPassword1" placeholder="Stock" required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Sale Amount</label>
                    <input type="text" class="form-control" name="salepr" id="exampleInputPassword1" placeholder=" Sale Amount" required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Expire Data</label>
                    <input type="date" id="start" name="exppr" min="2018-01-01" max="2030-12-31" required>
                  </div>
                  <div class="form-group">
                  <label for="exampleSelectRounded0">Manufacture</label>
                  <?php $manuf = 0 ?>
                        <select class="custom-select rounded-0" name="manupr" id="exampleSelectRounded0" value="{{$manuf}}">
                            @foreach($manu as $manu)
                            <?php $manuf = $manu->id ?>
                                <option value="{{$manu->id}}">{{ $manu->manufacture_name}} </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                  <label for="exampleSelectRounded0">Type Product</label>
                  <?php $typep = 0 ?>
                        <select class="custom-select rounded-0" name="typepr" id="exampleSelectRounded0" value="{{$typep}}">
                            @foreach($type as $type)
                            <?php $typep = $type->id ?>
                                <option value="{{$type->id}}">{{ $type->type_name}} </option>
                            @endforeach
                        </select>
                    </div>
                  <div class="form-group">
                    <label for="exampleInputFile">Product Image</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" name="imgpr" id="exampleInputFile" required>
                        <label class="custom-file-label" name="imgpr" for="exampleInputFile">Choose file</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text">Upload</span>
                      </div>
                    </div>
                  </div>
                </div>
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