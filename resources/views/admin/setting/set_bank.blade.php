@extends('admin.layouts.master')
@section('content')
<section class="home-section">
    <form method="post" action="{{route('post.cauhinhbank')}}">
    <div class="row p-3">
        <div class="col-12 text-center">
            <h3 class="text-uppercase">Cấu hình chuyển khoản ngân hàng</h3>
        </div>
        <div class="col-6 pb-4">
            <label>Tên ngân hàng</label>
            <input class="form-control" name="bank_name" value="{{$bank->bank_name}}">
        </div>
        <div class="col-6 pb-4">
            <label>Tên chi nhánh</label>
            <input class="form-control" name="bank_chinhanh" value="{{$bank->bank_chinhanh}}">
        </div>
        <div class="col-6 pb-4">
            <label>Tên thẻ</label>
            <input class="form-control" name="bank_boss" value="{{$bank->bank_boss}}">
        </div>
        <div class="col-6 pb-4">
            <label>Số thẻ ngân hàng</label>
            <input class="form-control" name="bank_number" value="{{$bank->bank_number}}">
        </div>
        <div class="col-6 pb-4">
            <label>Giá tiền nâng cấp</label>
            <input class="form-control" name="price_upgrade" value="{{$bank->price_upgrade}}">
        </div>
        <div class="col-12 pb-4">
            <label>Note</label>
            <textarea class="form-control" name="note">{{$bank->note}}</textarea>
        </div>
        <div class="col-12 pb-4">
            <button class="btn btn-primary" type="submit">Lưu thay đổi</button>
        </div>
    @csrf
    </form>
    </div>
</section>
@endsection