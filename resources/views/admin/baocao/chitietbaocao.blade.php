@extends('admin.layouts.master')
@section('content')
<link rel="stylesheet" href="{{asset('/public/admin/css/quanlysanpham.css')}}">

<div class="pt-3">
    <div class="row">
        <div class="col-lg-10">
            <div class="col-md-12 flex-row gap-2">
                <select class="form-select fs-14" aria-label="Default select example">
                    <option selected>10</option>
                    <option value="1">25</option>
                    <option value="2">50</option>
                    <option value="3">100</option>
                </select>
            </div>
        </div>
        <div class="col-lg-2">
            <div class="col-md-12">
                <div class="input-group" style="width: 100%;">
                    <input type="text" class="form-control" placeholder="Tìm kiếm" aria-label="Recipient's username" aria-describedby="basic-addon2">
                    <span class="input-group-text" id="basic-addon2"><i class="fa fa-search" aria-hidden="true"></i></span>
                </div>
            </div>
        </div>
    </div>
		
		
    <div class="pt-3"  style="overflow-x: auto;">
        <table class="table table-hover table-main">
            <thead class="thead1" style="vertical-align: middle;">
                <tr>
                    <th class="title-text" style="width: 2%">
                        STT </th>
                    <th class="title-text">
                        Mã đại lý
                    </th>
                    <th class="title-text" style="width: 12%">
                        Họ và tên
                    </th>
                    <th class="title-text">
                        Mã sản phẩm
                    </th>
                    <th class="title-text">
                        Tên sản phẩm
                    </th>
                    <th class="title-text">
                        Số lượng
                    </th>
                    <th class="title-text">
                        Đơn giá
                    </th>
                    <th class="title-text">
                        Thành tiền
                    </th>
                    <th class="title-text">
                        Mã đơn hàng
                    </th>
                    <th class="title-text">
                        Ngày giao hang
                    </th>
                    <th class="title-text">
                        Đại lý cấp trên
                    </th>
                </tr>
            </thead>
            <tbody style="color: #748092; font-size: 14px; vertical-align: middle;">
                <tr>
                    <td>1</td>
                    <td>VD</td>
                    <td>Nguyễn Trung</td>
                    <td>XNK</td>
                    <td><a style="text-decoration: none;" href="">Xuân Nữ Khang</a></td>
                    <td>2</td>
                    <td>590,000 đ</td>
                    <td>1,180,000 đ</td>
                    <td>DH0001</td>
                    <td>27/8/2021</td>
                    <td>Mevivu</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>VD</td>
                    <td>Nguyễn Trung</td>
                    <td>XNK</td>
                    <td><a style="text-decoration: none;" href="">Xuân Nữ Khang</a></td>
                    <td>2</td>
                    <td>590,000 đ</td>
                    <td>1,180,000 đ</td>
                    <td>DH0001</td>
                    <td>27/8/2021</td>
                    <td>Mevivu</td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>VD</td>
                    <td>Nguyễn Trung</td>
                    <td>XNK</td>
                    <td><a style="text-decoration: none;" href="">Xuân Nữ Khang</a></td>
                    <td>2</td>
                    <td>590,000 đ</td>
                    <td>1,180,000 đ</td>
                    <td>DH0001</td>
                    <td>27/8/2021</td>
                    <td>Mevivu</td>
                </tr>
                <tr>
                    <td>4</td>
                    <td>VD</td>
                    <td>Nguyễn Trung</td>
                    <td>XNK</td>
                    <td><a style="text-decoration: none;" href="">Xuân Nữ Khang</a></td>
                    <td>2</td>
                    <td>590,000 đ</td>
                    <td>1,180,000 đ</td>
                    <td>DH0001</td>
                    <td>27/8/2021</td>
                    <td>Mevivu</td>
                </tr>
                <tr>
                    <td>5</td>
                    <td>VD</td>
                    <td>Nguyễn Trung</td>
                    <td>XNK</td>
                    <td><a style="text-decoration: none;" href="">Xuân Nữ Khang</a></td>
                    <td>2</td>
                    <td>590,000 đ</td>
                    <td>1,180,000 đ</td>
                    <td>DH0001</td>
                    <td>27/8/2021</td>
                    <td>Mevivu</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

@endsection