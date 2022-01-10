@extends('admin.layouts.master')
@section('content')
<link rel="stylesheet" href="{{asset('/public/admin/css/doitac.css')}}">
<style type="text/css">
    .box-dad {
        padding:30px;
    }

    .box-child {
        padding: 30px 5px;
        background-color: #212529;
        border-radius: 5px;
    }
</style>

<section class="home-section">
<div class="row pt-3">
    <div class="col-12 pb-3">
        <h3 class="text-center text-uppercase">Thông tin bán hàng</h3>
    </div>
    <div class="col-6 text-center box-dad">
        <div class="box-child">
            <h5 class="text-uppercase text-white">Tổng doanh số hiện tại: 100.000.000 VND</h4>
            <p class="m-0 text-white">Doanh số cá nhân hiện tại: 50.000.000 VND</p>
            <p class="m-0 text-white">Doanh số đội nhóm hiện tại: 50.000.000 VND</p>
        </div>
    </div>
    <div class="col-6 text-center box-dad">
        <div class="box-child">
            <h5 class="text-uppercase text-white">Tổng chiết khấu hiện tại: 100.000.000 VND</h4>
            <p class="m-0 text-white">Chiết khấu cá nhân: 50.000.000 VND</p>
            <p class="m-0 text-white">Chiết khấu từ đội nhóm: 50.000.000 VND</p>
        </div>
    </div>
    <div class="col-6 text-center box-dad">
        <div class="box-child">
            <h5 class="text-uppercase text-white">Tổng điểm NAO hiện tại: 100.000.000 VND</h4>
            <p class="m-0 text-white">Điểm NAO cá nhân hiện tại: 50.000.000 VND</p>
            <p class="m-0 text-white">Điểm NAO đội nhóm hiện tại: 50.000.000 VND</p>
        </div>
    </div>
    <div class="col-6 text-center box-dad">
        <div class="box-child">
            <h5 class="text-uppercase text-white">Số lượng F1: 100</h4>
            <p class="m-0 text-white">Số lượng thành viên đội nhóm: 50</p>
            <p class="m-0 text-white">(Cập nhật thêm)</p>
        </div>
    </div>
    <div class="col-6 text-center box-dad">
        <div class="box-child">
            <p class="m-0 text-white">Điểm NAO của nhánh tách 1: 100.000.000 VND</p>
            <p class="m-0 text-white">Điểm NAO của nhánh tách 2: 50.000.000 VND</p>
            <p class="m-0 text-white">Điểm NAO của nhánh tách 3: 50.000.000 VND</p>
            <p class="m-0 text-white">Điểm NAO của nhánh tách N: 50.000.000 VND</p>
        </div>
    </div>
</div>
</section>
@endsection