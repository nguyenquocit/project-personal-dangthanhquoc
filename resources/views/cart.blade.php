
@extends('layout')
@section('content')
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="{{ url('asset/img/breadcrumb.jpg')}}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Organi Shop</h2>
                        <div class="breadcrumb__option">
                            <a href="{{url('/')}}">Home</a>
                            <span>Shop</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <table id="cart" class="table table-hover table-condensed">
    <thead>
        <tr>
            <th style="width:50%">Product</th>
            <th style="width:10%">Price</th>
            <th style="width:8%">Quantity</th>
            <th style="width:22%" class="text-center">Subtotal</th>
            <th style="width:10%"></th>
        </tr>
    </thead>
    <tbody>
        @php $total = 0 @endphp
        @if(session())
            @foreach($countcart as $cart)
                @php $total += $cart->prd_price * $cart->quantily @endphp
                <tr>
                    <td data-th="Product">
                        <div class="row">
                            <div class="col-sm-3 hidden-xs"><img src="{{ url('asset/img/product/'.$cart->prd_img)}}" width="100" height="100" class="img-responsive"/></div>
                            <div class="col-sm-9">
                                <h4 class="nomargin">{{ $cart->prd_name }}</h4>
                            </div>
                        </div>
                    </td>
                    <td data-th="Price">{{ number_format($cart->prd_price) }} VND</td>
                    <td data-th="Quantity">
                        <input type="number" value="{{$cart->quantily}}" class="form-control" min="1" />
                    </td>
                    <td data-th="Subtotal" class="text-center">{{ number_format($cart->prd_price * $cart->quantily) }} VND</td>
                    <td class="actions" data-th="">
                    <a href="{{ url('deletecart/'.$cart->id)}}" class="btn btn-danger"> <i class="fa fa-trash-o"></i>Delete</a>
                    </td>
                </tr>
            @endforeach
        @endif
    </tbody>
    <tfoot>
        <tr>
            <td colspan="5" class="text-right"><h3><strong>Total {{ number_format($total) }} VND</strong></h3></td>
        </tr>
        <tr>
            <td colspan="5" class="text-right">
                <a href="{{ url('/') }}" class="btn btn-danger"> <i class="fa fa-arrow-left"></i> Continue Shopping</a>
                <a href="{{ url('checkout') }}" class="btn btn-success"> <i class="fa fa-money"></i> Check out</a>
            </td>
        </tr>
    </tfoot>
</table>
@endsection