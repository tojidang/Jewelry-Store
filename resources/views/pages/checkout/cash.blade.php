@extends('welcome')
@section('content')

<div class="container">
    <div class="row">
        <div style="font-size:19px" class="col-md-12 text-center">
            <h1>Order Successfully Placed</h1>
            <p>Thank you for your order. We have received your order and it will be processed shortly.</p>
            <p>Your order details:</p>
            <ul>
                <li>Order Total: {{ Session::get('order_info.order_total') }}</li>
                <li>Name: {{ Session::get('order_info.shipping_name') }}</li>
                <li>Phone: {{ Session::get('order_info.shipping_phone') }}</li>
                <li>Address: {{ Session::get('order_info.shipping_address') }}</li>
				<li>Note: {{ Session::get('order_info.shipping_note') }}</li>
                <!-- Hiển thị các thông tin khác tùy ý -->
            </ul>
            <a href="{{ URL::to('/laravel/php/trangchu') }}" class="btn btn-primary">Continue Shopping</a>
        </div>
    </div>
</div>

<style>
	.order-details {
	margin-top: 50px;
	}

	table {
	width: 100%;
	border-collapse: collapse;
	border: 1px solid #ccc;
	}

	th, td {
	padding: 10px;
	text-align: left;
	border: 1px solid #ccc;
	}

	th {
	background-color: #f2f2f2;
	}
</style>
@endsection