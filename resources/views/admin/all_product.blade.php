@extends('admin_layout')
@section('admin_content')


<hr>
<h6 class="font-weight-bolder mb-0">Product</h6>
<table class="table align-middle mb-0 bg-white" >
  <thead class="bg-light">
    <tr style="text-align:  center;">
      <th>Product Name</th>
      <th>Category</th>
      <th>Brand</th>
      <th>Price</th>
      <th>Storage</th>
      <th>Color</th>
      <th>Product Image</th>
      <th>Content</th>
      <th>Description</th>
      <th>Status</th>
      <th>Date</th>
      <th>Actions</th>
    </tr>
  </thead>
  <tbody >

  	@foreach($all_product as $key => $pro)
    <tr >
      <td>
        <div class="d-flex align-items-center">
         {{--  <img
              src="https://mdbootstrap.com/img/new/avatars/8.jpg"
              alt=""
              style="width: 45px; height: 45px"
              class="rounded-circle"
              /> --}}
          <div class="ms-3">
            <p class="fw-bold mb-1">{{ $pro->product_name }}</p>
          </div>
        </div>
      </td>
      <td style="text-align: center;">
        {{ $pro->category_name }}
      </td>
      <td style="text-align: center;">
        {{ $pro->brand_name }}
      </td>
      <td style="text-align: center;">
        {{ $pro->product_price }}
      </td >
      <td style="text-align: center;">
        {{ $pro->product_storage }}
      </td >
      <td style="text-align: center;">
        {{ $pro->product_color }}
      </td >
      <td style="text-align: center;">
        <img src="public/uploads/product/{{ $pro->product_img }}" alt="" height="100px"  width="100px">      
      </td>
      <td>
        {{ $pro->product_content }}
      </td>
      <td>
      	{{ $pro->product_desc }}
      </td>
      <td style="text-align: center;">
        <?php
      	if($pro-> product_status ==1){
          ?>
        <a href="{{ URL::to('laravel/php/active-product/'.$pro->product_id) }}"><span class="btn btn-success">Visible</a>
          <?php
        }
        ?>

        <?php
        if($pro-> product_status ==0){
          ?>
        <a href="{{ URL::to('laravel/php/inactive-product/'.$pro->product_id) }}"><span class="btn btn-secondary">Invisible</a>
          <?php
        }
        ?>

      </td>
      <td style="text-align: center;">
      	{{ $pro->created_at }}
      </td>
      <td style="text-align: center;">
      	<a href="{{URL::to('laravel/php/edit-product/'.$pro->product_id)}}" type="button" class="btn btn-info">Edit</a>
      	<a onclick="return confirm('Are you sure you want delete?')" href="{{URL::to('laravel/php/delete-product/'.$pro->product_id)}}" type="button" class="btn btn-danger">Delete</a>

      </td>
    </tr>
    @endforeach

  </tbody>
</table>
@endsection