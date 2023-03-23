@extends('layout')

@section('banner')
                    <div class="hero__item set-bg" data-setbg="{{ url('asset/img/hero/banner.jpg')}}">
                        <div class="hero__text">
                            <span>FRUIT FRESH</span>
                            <h2>Vegetable <br />100% Organic</h2>
                            <p>Free Pickup and Delivery Available</p>
                            <a href="#" class="primary-btn">SHOP NOW</a>
                        </div>
                    </div>
@endsection

@section('content')
    <!-- Categories Section Begin -->
    <section class="categories">
        <div class="container">
            <div class="row">
                <div class="categories__slider owl-carousel">
                    @foreach($category as $category)
                    <div class="col-lg-3">
                        <div class="categories__item set-bg" data-setbg="{{ url('asset/img/categories/'. $category->type_img)}}">
                            <h5><a href="{{ url('category/'.$category->id)}}">{{ $category->type_name}}</a></h5>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!-- Categories Section End -->

    <!-- Featured Section Begin -->
    <section class="featured spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Latest Product</h2>
                    </div>
                    <div class="featured__controls">
                        <ul>
                            <li class="active" data-filter="*">All</li>
                            @foreach($category1 as $category1)
                            <li data-filter=".{{ $category1->type_name}}">{{ $category1->type_name}}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row featured__filter">
                <?php $likename = ''; ?>
                @foreach($products as $product)
                <div class="col-lg-3 col-md-4 col-sm-6 mix {{$product->productType->type_name}}">
                    <div class="featured__item">
                        <div class="featured__item__pic set-bg" data-setbg="{{ url('asset/img/product/'.$product->product_img)}}">
                            <ul class="featured__item__pic__hover">
                                @foreach($count as $change)
                                    @if($product->product_name == $change->prd_name)
                                        <?php $likename = $product->product_name ?>
                                    @endif
                                @endforeach
                                @if($product->product_name == $likename)
                                    <li><a href="{{ route('add_wish_list',$product->product_id)}}"><i class="fa fa-heart" style="color:red"></i></a></li>
                                @else
                                <li><a href="{{ route('add_wish_list',$product->product_id)}}"><i class="fa fa-heart"></i></a></li>
                                @endif
                                <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                <li><a href="{{ route('add_gio_hang',$product->product_id)}}"><i class="fa fa-shopping-cart"></i></a></li>
                            </ul>
                        </div>
                        <div class="featured__item__text">
                            <h6><a href="{{ url('shop-details/'.$product->product_id)}}">{{ $product->product_name}}</a></h6>
                            <h5>{{ number_format($product->product_price)}} VND</h5>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            {{ $products->links() }}
        </div>
    </section>
    <!-- Featured Section End -->
    
    <!-- Banner Begin -->
    <div class="banner">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="banner__pic">
                        <img src="{{ url('asset/img/banner/banner-1.jpg')}}" alt="">
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="banner__pic">
                        <img src="{{ url('asset/img/banner/banner-2.jpg')}}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Banner End -->

    <!-- latest product Section Begin -->
    <section class="featured spad">
        <div class="container">
            <div class="row">
            <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Featured Product</h2>
                    </div>
                </div>
            </div>
            <div class="row featured__filter">
                @foreach($prdfeature as $prdfeatures)
                <div class="col-lg-3 col-md-4 col-sm-6 mix {{$prdfeatures->productType->type_name}}">
                    <div class="featured__item">
                        <div class="featured__item__pic set-bg" data-setbg="{{ url('asset/img/product/'.$prdfeatures->product_img)}}">
                            <ul class="featured__item__pic__hover">
                                <li><a href="{{ route('add_wish_list',$prdfeatures->product_id)}}"><i class="fa fa-heart"></i></a></li>
                                <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                            </ul>
                        </div>
                        <div class="featured__item__text">
                            <h6><a href="{{ url('shop-details/'.$prdfeatures->product_id)}}">{{ $prdfeatures->product_name}}</a></h6>
                            <h5>{{ number_format($prdfeatures->product_price)}} VND</h5>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            {{ $prdfeature->links()}}
        </div>
    </section>
    <!-- latest product Section End -->
    @endsection