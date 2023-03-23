 
 @extends('admin/layout-admin')
@section('adminContent')
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Order Table</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url('/admin/home')}}">Home</a></li>
              <li class="breadcrumb-item active">Order</li>
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
          <a href="{{ url('admin/pages/forms/addorder')}}" class="btn btn-success"> <i class="fa fa-trash-o"></i>Add New</a>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
        <table id="cart" class="table table-hover table-condensed">
    <thead>
        <tr>
            <th style="width:5%">ID</th>
            <th style="width:7%">Name</th>
            <th style="width:18%">Address</th>
            <th style="width:6%">Phone</th>
            <th style="width:12%">Email</th>
            <th style="width:10%">Product Name</th>
            <th style="width:10%">Product Image</th>
            <th style="width:10%">Product Price</th>
            <th style="width:4%">Quanlity</th>
            <th style="width:6%">Status</th>
            <th style="width:12%">Action</th>
        </tr>
    </thead>
    <tbody>
        @if(session())
        <?php $comfim = 0 ?>
            @foreach($order as $cart)
                <tr>
                    <td>
                        {{$cart->id}}
                    </td>
                    <td>
                        {{$cart->name_Order}}
                    </td>
                    <td>
                        {{$cart->address_Order}}
                    </td>
                    <td>
                        {{$cart->phone_Order}}
                    </td>
                    <td>
                        {{$cart->email_Order}}
                    </td>
                    <td>
                      <div>
                        <h5>{{ $cart->prd_name }}</h6>
                      </div>
                    </td>
                    <td data-th="Product">
                        <div class="row">
                            <div class="col-sm-3 hidden-xs"><img src="{{ url('asset/img/product/'.$cart->prd_img)}}" width="100" height="100" class="img-responsive"/></div>
                        </div>
                    </td>
                    
                    <td data-th="Price">{{ number_format($cart->prd_price) }} VND</td>
                    <td data-th="Quantity">
                    {{ number_format($cart->quantily) }}
                    </td>
                    <td>
                      @if($cart->status == '0')
                        <a href="{{ url('changestatus/'.$cart->id)}}" onclick="return confirm('Are you sure?')" class="btn btn-danger"> <i class="fa fa-trash-o"></i>Unconfimred</a>
                      @else
                      <a href="{{ url('changestatus/'.$cart->id)}}" onclick="return confirm('Are you sure?')" class="btn btn-success"> <i class="fa fa-trash-o"></i>Confimred</a>
                      @endif
                    </td>
                    <td class="actions" data-th="">
                      <a href="{{ url('deleteorder/'.$cart->id)}}" onclick="return confirm('Are you sure?')" class="btn btn-danger"> <i class="fa fa-trash-o"></i>Delete</a>
                      <a href="{{ url('admin/pages/forms/editorder/'.$cart->id)}}" class="btn btn-success"> <i class="fa fa-trash-o"></i>Edit</a>
                    </td>
                </tr>
            @endforeach
            
        @endif
    </tbody>
</table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </section>
    <!-- /.content -->
  </div>
  @endsection