
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
            <th style="width:10%">Action</th>
            <th style="width:10%"></th>
        </tr>
    </thead>
    <tbody>
    @foreach($data as $results)
                <tr data-id="{{$results->id}}">
                    <td data-th="Product">
                        <div class="row">
                            <div class="col-sm-3 hidden-xs"><img src="{{ url('asset/img/product/'.$results->prd_img)}}" width="100" height="100" class="img-responsive"/></div>
                            <div class="col-sm-9">
                                <h4 class="nomargin">{{ $results->prd_name}}</h4>
                            </div>
                        </div>
                    </td>
                    <td data-th="Price">{{ number_format($results->prd_price)}} VND</td>
                    <td class="actions">
                        <a href="{{ url('delete/'.$results->id)}}" class="btn btn-danger"> <i class="fa fa-trash-o"></i>Delete</a>
                    </td>
                </tr>
                @endforeach
    </tbody>
    <tfoot>
        <tr>
            <td colspan="5" class="text-right">
                <a href="{{ url('/') }}" class="btn btn-danger"> <i class="fa fa-arrow-left"></i> Continue Shopping</a>
            </td>
        </tr>
    </tfoot>
</table>
@endsection