@extends('admin_layout')
@section('admin_content')


<hr>
<h6 class="font-weight-bolder mb-0">Category Product</h6>
<table class="table align-middle mb-0 bg-white" >
  <thead class="bg-light">
    <tr style="text-align:  center;">
      <th>Category Name</th>
      <th>Description</th>
      <th>Status</th>
      <th>Date</th>
      <th>Actions</th>
    </tr>
  </thead>
  <tbody >

  	@foreach($all_category_product as $key => $cate_pro)
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
            <p class="fw-bold mb-1">{{ $cate_pro->category_name }}</p>
          </div>
        </div>
      </td>
      <td>
      	{{ $cate_pro->category_desc }}
      </td>
      <td style="text-align: center;">
        <?php
      	if($cate_pro-> category_status ==1){
          ?>
        <a href="{{ URL::to('laravel/php/active-category-product/'.$cate_pro->category_id) }}"><span class="btn btn-success">Visible</a>
          <?php
        }
        ?>

        <?php
        if($cate_pro-> category_status ==0){
          ?>
        <a href="{{ URL::to('laravel/php/inactive-category-product/'.$cate_pro->category_id) }}"><span class="btn btn-secondary">Invisible</a>
          <?php
        }
        ?>

      </td>
      <td style="text-align: center;">
      	{{ $cate_pro->created_at }}
      </td>
      <td style="text-align: center;">
      	<a href="{{ URL::to('laravel/php/edit-category-product/'.$cate_pro->category_id) }}" type="button" class="btn btn-info">Edit</a>
      	<a href="{{ URL::to('laravel/php/delete-category-product/'.$cate_pro->category_id)}}" type="button" class="btn btn-danger">Delete</a>
      </td>
    </tr>
    @endforeach

  </tbody>
</table>
@endsection