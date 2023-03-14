@extends('admin_layout')
@section('admin_content')


<hr>
<h6 class="font-weight-bolder mb-0">Information</h6>
<table class="table align-middle mb-0 bg-white" >
  <thead class="bg-light">
    <tr style="text-align:  center;">
      <th >Name</th>
      <th>Phone</th>
      <th>Email</th>
    </tr>
  </thead>
  <tbody >
    <tr>

      <td style="text-align: center;">
        {{ $order_by_id->name }}
      </td>
      <td style="text-align: center;">
        {{ $order_by_id->phone }}
      </td>

      <td style="text-align: center;">
        {{ $order_by_id->email }}
      </td>

    </tr>
  </tbody>
</table>
<br>
<hr>

<h6 class="font-weight-bolder mb-0">Shipping Detail</h6>
<table class="table align-middle mb-0 bg-white" >
  <thead class="bg-light">
    <tr style="text-align:  center;">
      
      <th>Address</th>
      <th>Note</th>
    </tr>
  </thead>
  <tbody >
    <tr>
      <td style="text-align: center;">
        {{ $order_by_id->address }}
      </td>

      <td style="text-align: center;">
       {{  $order_by_id->shipping_note }}
      </td>
    </tr>
  </tbody>
</table>

<br><hr>
<hr>
<h6 class="font-weight-bolder mb-0">Order Detail</h6>
<table class="table align-middle mb-0 bg-white" >
  <thead class="bg-light">
    <tr style="text-align:  center;">
      <th>Product Name</th>
      <th>Storage</th>
      <th>Color</th>
      <th>Price</th>
    </tr>
  </thead>
  <tbody >
    @foreach($order_by_id_product as $key => $value)
      <tr>
        <td>
          <div class="d-flex align-items-center">
            <div class="ms-3">
              <p class="fw-bold mb-1">{{ $value->product_name }}</p>
            </div>
          </div>
        </td>

        <td style="text-align: center;">
          {{ $value->product_storage }}
        </td>

        <td style="text-align: center;">
          {{ $value->product_color }}
        </td>

        <td style="text-align: center;">
          {{number_format($value->product_price).' VNĐ'}}
        </td>
      </tr>
  @endforeach
  </tbody>
</table>

<h4 style="color:red; text-align:center">Total: {{ $order_by_id->order_total }}</h2>

@endsection