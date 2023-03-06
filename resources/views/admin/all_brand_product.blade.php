@extends('admin_layout')
@section('admin_content')


<hr>
<h6 class="font-weight-bolder mb-0">Brand Product</h6>
<table class="table align-middle mb-0 bg-white" >
  <thead class="bg-light">
    <tr style="text-align:  center;">
      <th>Brand Name</th>
      <th>Category</th>
      <th>Description</th>
      <th>Status</th>
      <th>Date</th>
      <th>Actions</th>
    </tr>
  </thead>
  <tbody >

  	@foreach($all_brand_product as $key => $br_pro)
    <tr>
      <td>
        <div class="d-flex align-items-center">
         {{--  <img
              src="https://mdbootstrap.com/img/new/avatars/8.jpg"
              alt=""
              style="width: 45px; height: 45px"
              class="rounded-circle"
              /> --}}
          <div class="ms-3">
            <p class="fw-bold mb-1">{{ $br_pro->brand_name }}</p>
          </div>
        </div>
      </td>
      <td>
        {{ $br_pro->category_name }}
      </td>
      <td>
      	{{ $br_pro->brand_desc }}
      </td>
      <td style="text-align: center;">
        <?php
      	if($br_pro-> brand_status ==1){
          ?>
        <a href="{{ URL::to('laravel/php/active-brand-product/'.$br_pro->brand_id) }}"><span class="btn btn-success">Visible</a>
          <?php
        }
        ?>

        <?php
        if($br_pro-> brand_status ==0){
          ?>
        <a href="{{ URL::to('laravel/php/inactive-brand-product/'.$br_pro->brand_id) }}"><span class="btn btn-secondary">Invisible</a>
          <?php
        }
        ?>

      </td>
      <td style="text-align: center;">
      	{{ $br_pro->created_at }}
      </td>
      <td style="text-align: center;">
      	<a href="{{URL::to('laravel/php/edit-brand-product/'.$br_pro->brand_id)}}" type="button" class="btn btn-info">Edit</a>
      	<a onclick="return confirm('Are you sure you want delete?')" href="{{URL::to('laravel/php/delete-brand-product/'.$br_pro->brand_id)}}" type="button" class="btn btn-danger">Delete</a>

      </td>
    </tr>
    @endforeach

  </tbody>
</table>
@endsection