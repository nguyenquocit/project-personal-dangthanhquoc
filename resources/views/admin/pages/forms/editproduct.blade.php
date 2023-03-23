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
              <form action="{{ url('editproduct')}}" method="get">
                <div class="card-body">
                  @foreach($product as $product)
                  <div class="form-group">
                    <label for="exampleInputEmail1">ID</label>
                    <input type="text" name="idedit" class="form-control" value="{{ $product->product_id}}" placeholder="ID" reqiured>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Product Name</label>
                    <input type="text" name="nameeidt" class="form-control" value="{{ $product->product_name}}" i placeholder="Product Name" reqiured>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Product Price</label>
                    <input type="text" name="priceeidt" class="form-control" value="{{ $product->product_price}}" placeholder="Product Price" reqiured>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Product Color</label>
                    <input type="text" name="coloreidt" class="form-control" value="{{ $product->product_color}}" placeholder="Product Color" reqiured>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Product Description</label>
                    <input type="text" name="desceidt" class="form-control" value="{{ $product->product_description}}" placeholder="Product Description" reqiured>
                  </div>
                  <div class="form-group">
                  <label for="exampleSelectRounded0">Feature</label>
                        <select class="custom-select rounded-0" name="featureeidt" id="exampleSelectRounded0" reqiured>
                            <option value="0">NO</option>
                            <option value="1">YES</option>
                        </select>
                    </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Stock</label>
                    <input type="text" name="stockeidt" class="form-control" value="{{ $product->stock}}" placeholder="Stock" reqiured>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Sale Amount</label>
                    <input type="text" name="saleeidt" class="form-control" value="{{ $product->sale_amount}}" placeholder=" Sale Amount" reqiured>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Expire Date</label>
                    <input type="date" id="start" name="expeidt" value="{{ $product->expire_date}}" min="2018-01-01" max="2030-12-31" reqiured>
                  </div>
                  <div class="form-group">
                  <label for="exampleSelectRounded0">Manufacture</label>
                  <?php $manuname = $product->manufacture_id?>
                        <select class="custom-select rounded-0" name="manueidt" value="{{$manuname}}">
                            @foreach($manu as $manu)
                                $manuname = $manu->id;
                                <option value="{{ $manu->id}}">{{ $manu->manufacture_name}} </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                  <label for="exampleSelectRounded0">Type Product</label>
                      <?php $typeid = $product->type_id?>
                        <select class="custom-select rounded-0" name="typeeidt" value="{{$typeid}}">
                            @foreach($type as $type)
                            $typeid = $type->id;
                                <option value="{{ $type->id}}">{{ $type->type_name}} </option>
                            @endforeach
                        </select>
                    </div>
                  <div class="form-group">
                    <label for="exampleInputFile">Product Image</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <?php $img = $product->product_img?>
                        <input type="file" class="custom-file-input" name="imgeidt" value="{{ url('asset/img/product/'.$img)}}" id="exampleInputFile" reqiured>
                        <label class="custom-file-label" value="{{ url('asset/img/product/'.$img)}}" for="exampleInputFile">Choose file</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text">Upload</span>
                      </div>
                    </div>
                  </div>
                  @endforeach
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