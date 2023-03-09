@extends('welcome')
@section('content')

<section class="single_product_details_area d-flex align-items-center">
        @foreach($product as $key =>$value)
        <!-- Single Product Thumb -->
        <div class="single_product_thumb clearfix">
            <div style="text-align:center" class="product_thumbnail_slides owl-carousel">
                <img  src="{{ asset('laravel/php/public/uploads/product/'.$value->product_img) }}" alt="">
                <img  src="{{ asset('laravel/php/public/uploads/product/'.$value->product_img) }}" alt="">
                <img  src="{{ asset('laravel/php/public/uploads/product/'.$value->product_img) }}" alt="">
            </div>
        </div>
        <!-- Single Product Description -->
        <div class="single_product_desc clearfix">
            <span>new</span>
            <a href="#">
                <h2>{{ $value ->product_name }}</h2>
            </a>
            <p class="product-price"><span class="old-price">$65.00</span>{{number_format($value->product_price).' VNĐ'}} </p>
            <br>
            <strong style="font-size: 20px" class="product-desc">{{ $value ->product_content }}</strong>
            <hr>
            <p class="product-desc">{{ $value ->product_desc }}</p>

            <!-- Form -->
            <form class="cart-form clearfix" method="post">
                <!-- Select Box -->
                <div class="select-box d-flex mt-50 mb-30">
                    <select name="select" id="productSize" class="mr-5">
                        <option value="value">128GB</option>
                        <option value="value">256GB</option>
                        <option value="value">512GB</option>
                        <option value="value">1TB</option>
                    </select>
                    <select name="select" id="productColor">
                        <option value="value">Color: Black</option>
                        <option value="value">Color: White</option>
                        <option value="value">Color: Red</option>
                        <option value="value">Color: Purple</option>
                    </select>
                </div>
                <!-- Cart & Favourite Box -->
                <div class="cart-fav-box d-flex align-items-center">
                    <!-- Cart -->
                    <button type="submit" name="addtocart" value="5" class="btn essence-btn">Add to cart</button>
                    <!-- Favourite -->
                    <div class="product-favourite ml-4">
                        <a href="#" class="favme fa fa-heart"></a>
                    </div>
                </div>
            </form>
        </div>
        @endforeach
    </section>

@endsection