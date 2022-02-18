<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<style>
    .top-left{
        border: 2px solid #ccc;
        background-color: #fff;
        width: 300px;
        height: auto;
    }
    *{ font-family: DejaVu Sans !important;}
    td, .table thead th {
	  vertical-align: center;
	}
</style>
<body>
<div class="container-fluid pt-1 pb-5">
	<table class="table table-borderless">
	  <thead>
	    <tr>
	      <th style="text-align: left;">
	  		<p style="font-size: 24px"><strong>Số kiện: </strong></p>
	        <p style="font-size: 24px"><strong>Mã bill: {{ $order->order_code }} </strong></p>
	      </th>
	      <th style="text-align: right;">
	        <p style="font-size: 24px;margin-bottom: 0px;"><strong>Số: {{ time() }}</strong></p>
	      </th>
	    </tr>
	  </thead>
	</table>
	<p style="font-size: 32px; text-align: center;"><strong>Phiếu giao hàng</strong></p>
	<div class="col-12 font-weight-bold">
        <p><strong>Khách hàng: <span class="text-uppercase">{{$order->order_info->fullname}} _DT: </span>{{$order->order_info->phone}}</strong></p>
        <p><strong>Xuất tại kho:<span class="text-uppercase">Kho hàng xẻn</span></strong></p>
        <p><strong>Nơi giao: {{ $order->order_address->address.', '.$order->order_address->ward->tenphuongxa.', '.$order->order_address->district->tenquanhuyen.', '.$order->order_address->province->tentinhthanh }}</strong></p>
    </div>  
	<table class="table table-bordered">
		<thead>
		  <tr>
		    <th>STT</th>
		    <th>Tên vật tư hàng hóa</th>
		    <th>Mã VTHH</th>
		    <th>ĐVT</th>
		    <th>Số lượng</th>
		    <th>Đơn giá</th>
		    <th>Thành tiền</th>
		  </tr>
		</thead>
		<tbody>
            @foreach ($order->products as $key => $value)
            <tr>
                <td> {{ $key + 1 }}</td>
                <td> {{ $value->pivot->name }} </td>
                <td>{{ $value->sku }}</td>
                <td>{{ $value->productCalculationUnit->name }}</td>
                <td>{{ $value->pivot->quantity }}</td>
                <td> {{ number_format($value->pivot->price) }}</td>
                <td>{{ number_format($value->pivot->price*$value->pivot->quantity) }}</td>
            </tr>
            @endforeach
		  <tr>
		      <th colspan="6">Tiền hàng</th>
		      <td> {{ number_format($order->sub_total) }} </td>
		  </tr>
		</tbody>
	</table>
	<table class="table table-borderless">
		<thead>
		    <tr>
		      <td class="text-right"><p>{{  'Ngày '.now()->day.' Tháng '.now()->month.' Năm '.now()->year }}</p></td>
		  </tr>
		</thead>
	</table>
  <table class="table table-borderless">
	  <thead>
	    <tr>
	      <th><p style="font-weight: bold;">Người lập phiếu</p>
        <small><i>(Ký họ tên)</i></small></th>
	      <th><p style="font-weight: bold;">Người nhận hàng</p>
        <small><i>(Ký họ tên)</i></small></th>
	      <th><p style="font-weight: bold;">Thủ kho</p>
        <small><i>(Ký họ tên)</i></small></th>
	      <th><p style="font-weight: bold;">Kế toán trưởng</p>
        <small><i>(Ký họ tên)</i></small></th>
	      <th><p style="font-weight: bold;">Kiểm duyệt</p>
        <small><i>(Ký họ tên)</i></small></th>
	    </tr>
	  </thead>
	</table>
</div>

</body>
</html>