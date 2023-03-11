@extends('welcome')
@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />

 <!-- ##### Breadcumb Area Start ##### -->
    <div class="breadcumb_area bg-img" style="background-image: url(public/FE/img/bg-img/breadcumb.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="page-title text-center">
                        <h2>Checkout</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Breadcumb Area End ##### -->

    <!-- ##### Checkout Area Start ##### -->
    <form action="{{ URL::to('laravel/php/save-checkout') }}" method="post">
    <div class="checkout_area section-padding-80">
        <div class="container">
            <div class="row">

                <div class="col-12 col-md-6">
                    <div class="checkout_details_area mt-50 clearfix">

                        <div class="cart-page-heading mb-30">
                            <h5>Billing Address</h5>
                        </div>

                        
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="first_name">Name <span>*</span></label>
                                    <input name="shipping_name" type="text" class="form-control" id="name" value="" required>
                                </div>
                                <div class="col-12 mb-4">
                                    <label for="email_address">Email Address <span>*</span></label>
                                    <input name="shipping_email" type="email" class="form-control" id="email_address" value="">
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="phone_number">Phone Number <span>*</span></label>
                                    <input name="shipping_phone" type="number" class="form-control" id="phone_number" min="0" value="">
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="street_address">Address <span>*</span></label>
                                    <input name="shipping_address" type="text" class="form-control mb-3" id="address" value="">
                                </div>
                                <div class="col-12 mb-4">
                                    <label for="note">Note</label>
                                    <textarea name="shipping_note" type="text" class="form-control" id="note" value="" rows="5"> </textarea>
                                </div>
                            </div>
                        
                    </div>
                </div>

                <div class="col-12 col-md-6 col-lg-5 ml-lg-auto" >
                    <div class="order-details-confirmation">

                        <div class="cart-page-heading">
                            <h5>Your Order</h5>
                            <p>The Details</p>
                        </div>

                        <ul class="order-details-form mb-4">
                            <li><span>Product</span> <span>Total</span></li>
                            <li><span>Cocktail Yellow dress</span> <span>$59.90</span></li>
                            <li><span>Subtotal</span> <span>$59.90</span></li>
                            <li><span>Shipping</span> <span>Free</span></li>
                            <li><span>Total</span> <span>$59.90</span></li>
                        </ul>

                        <div id="accordion" role="tablist" class="mb-4">
                            <div class="card">
                                <div class="card-header" role="tab" id="headingOne">
                                <h6 class="mb-0">
                                  <input type="radio" name="payment_method" value="momo">
                                  <i class="fa fa-square-o mr-3"></i>MOMO
                                </h6>
                              </div>
                            </div>
                            <div class="card">
                                <div class="card-header" role="tab" id="headingTwo">
                                <h6 class="mb-0">
                                  <input type="radio" name="payment_method" value="paypal">
                                  <i class="fa fa-square-o mr-3"></i>Paypal
                                </h6>
                              </div>
                            </div>
                        </div>

                        <style>
                            .card-header:hover {
                            background-color: #f8f9fa;
                            color: green;
                            cursor: pointer;
                            pointer-events: auto; 

                        }
                        .payment-method i.checked {
                           text-color: green;
                        }

                        </style>  
                        <script>
                          $('input[type=radio][name=payment_method]').change(function() {
                            $('.payment-method a').removeClass('checked');
                            if (this.value === 'momo') {
                                $('#collapseOne a').addClass('checked');
                            }
                            else if (this.value === 'paypal') {
                                $('#collapseTwo a').addClass('checked');
                            }
                        });

                        </script>                 

                        <button type="submit" name="send" class="btn essence-btn">Place Order</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </form>
    <!-- ##### Checkout Area End ##### -->


@endsection