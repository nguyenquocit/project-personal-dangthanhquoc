 
 @extends('admin/layout-admin')
@section('adminContent')
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Products Table</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url('/admin/home')}}">Home</a></li>
              <li class="breadcrumb-item active">Product</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="card">
        <div class="card-header">
          <div class="row">
          <a href="{{ url('admin/pages/forms/addproduct')}}" class="btn btn-success"> <i class="fa fa-trash-o"></i>Add New</a>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
        <table id="cart" class="table table-hover table-condensed">
    <thead>
        <tr>
            <th style="width:5%">ID</th>
            <th style="width:20%">Img</th>
            <th style="width:20%">Name</th>
            <th style="width:10%">Price</th>
            <th style="width:8%">Stock</th>
            <th style="width:22%" class="text-center">Sale Amount</th>
            <th style="width:10%">Action</th>
        </tr>
    </thead>
    <tbody>
        @if(session())
            @foreach($prd as $cart)
                <tr>
                    <td>
                        {{$cart->product_id}}
                    </td>
                    <td data-th="Product">
                        <div class="row">
                            <div class="col-sm-3 hidden-xs"><img src="{{ url('asset/img/product/'.$cart->product_img)}}" width="100" height="100" class="img-responsive"/></div>
                        </div>
                    </td>
                    <td>
                      <div>
                        <h5>{{ $cart->product_name }}</h6>
                      </div>
                    </td>
                    <td data-th="Price">{{ number_format($cart->product_price) }} VND</td>
                    <td data-th="Quantity">
                    {{ number_format($cart->stock) }}
                    </td>
                    <td data-th="Subtotal" class="text-center">{{number_format($cart->sale_amount)}}</td>
                    <td class="actions" data-th="">
                      <a href="{{ url('deleteProduct/'.$cart->product_id)}}" onclick="return confirm('Are you sure?')" class="btn btn-danger"> <i class="fa fa-trash-o"></i>Delete</a>
                      <a href="{{ url('admin/pages/forms/editproduct/'.$cart->product_id)}}" class="btn btn-success"> <i class="fa fa-trash-o"></i>Edit</a>
                    </td>
                </tr>
            @endforeach
            
        @endif
    </tbody>
    
</table>
{{ $prd->links()}}
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </section>
    <!-- /.content -->
  </div>
  @endsection