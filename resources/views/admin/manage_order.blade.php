@extends('admin_layout')
@section('admin_content')


<hr>
<h6 class="font-weight-bolder mb-0">All Order</h6>
<table class="table align-middle mb-0 bg-white" >
  <thead class="bg-light">
    <tr style="text-align:  center;">
      <th>Name</th>
      <th>Total</th>
      <th>Status</th>
      <th>Date</th>
      <th>Actions</th>
    </tr>
  </thead>
  <tbody >

  	@foreach($all_order as $key => $value)
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
            <p class="fw-bold mb-1">{{ $value-> name }}</p>
          </div>
        </div>
      </td>
      <td>
      	{{ $value-> order_total }}
      </td>
      <td style="text-align: center;">
       	{{ $value-> order_status }}
      </td>
      <td style="text-align: center;">
      	{{ $value-> created_at }}
      </td>
      <td style="text-align: center;">
      	<a href="{{URL::to('laravel/php/view-order/'.$value->order_id)}}" type="button" class="btn btn-info">View</a>

      </td>
    </tr>
    @endforeach

  </tbody>
</table>
@endsection