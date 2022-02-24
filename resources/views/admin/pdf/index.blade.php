<!DOCTYPE html>
<html lang="en">
<head>
  <title>Phiếu giao hàng</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<style>
	.table {
		width: 100%;
		margin-bottom: 1rem;
		color: #212529;
	}
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
	p {
		margin-top: 0;
		margin-bottom: 1rem;
	}
	.table-bordered {
		border: 1px solid #dee2e6;
	}
	table {
		border-collapse: collapse;
	}
	.table-bordered thead td, .table-bordered thead th {
		border-bottom-width: 2px;
	}
	.table thead th {
		vertical-align: center;
		border-bottom: 2px solid #dee2e6;
	}
	.table-bordered td, .table-bordered th {
		border: 1px solid #dee2e6;
	}
	.table-bordered td, .table-bordered th {
		border: 1px solid #dee2e6;
	}
	.table td, .table th {
		padding: 0.75rem;
		vertical-align: top;
		border-top: 1px solid #dee2e6;
	}
	.table-borderless tbody+tbody, .table-borderless td, .table-borderless th, .table-borderless thead th {
		border: 0;
	}
</style>
<body>
<div>
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
        <p><strong>Khách hàng: <span class="text-uppercase">{{optional($order->order_info)->fullname}} _DT: </span>{{$order->order_info->phone}}</strong></p>
        <p><strong>Xuất tại kho:<span class="text-uppercase"> {{ optional($order->warehouse)->name }}</span></strong></p>
        <p><strong>Nơi giao: {{ optional($order->order_address)->address.', '.optional(optional($order->order_address)->ward)->tenphuongxa.', '.optional(optional($order->order_address)->district)->tenquanhuyen.', '.optional(optional($order->order_address)->province)->tentinhthanh }}</strong></p>
    </div>  
	<table class="table table-bordered" style="margin-top: 30px">
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
                <td>{{ optional($value->productCalculationUnit)->name }}</td>
                <td>{{ optional($value->pivot)->quantity }}</td>
                <td> {{ number_format(optional($value->pivot)->price) }}</td>
                <td>{{ number_format(optional($value->pivot)->price*optional($value->pivot)->quantity) }}</td>
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
		      <td style="text-align:right"><p>{{  'Ngày '.now()->day.' Tháng '.now()->month.' Năm '.now()->year }}</p></td>
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