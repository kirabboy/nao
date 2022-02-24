@include('public.users.layout.header')
<body>
<section>  
    <div class="row p-3">
        <div class="col-12">
            <h5>
                <a href="{{route('doinhom.index')}}"><i class="fa fa-chevron-left" aria-hidden="true"></i>
                <span class="ps-3"> Chi phí</span></a>
            </h5>
        </div>
    </div>
</section>

<section>
    <div class="row p-3 pt-0">
        <div class="col-12 pb-4">
            <div class="card-hoahong">
                <div class="card-body text-center pt-1 pb-1" style="
                    @if ($thanhvien->level == 1)
                        border-left: 3px solid #199DA4;
                    @else
                        border-left: 3px solid #F6872E;
                    @endif
                    ">
                    <div class="row">
                        <div class="col-12">
                            @if ($thanhvien->level == 1)
                                <p id="btn_ctv" style="float: left;">CTV</p>
                            @else
                                <p id="btn_daily" style="float: left;">ĐẠI LÝ</p>
                            @endif
                        </div>
                        <div class="col-6 text-start">
                            <p class="m-0 pb-1">Họ và Tên</p>
                            <p class="m-0 pb-1">Số điện thoại</p>
                            <p class="m-0 pb-1">Ngày tham gia</p>
                            <p class="m-0 pb-1">NAO point</p>
                            <p class="m-0 pb-1">Thành tích</p>
                            <p class="m-0 pb-1">Nhóm</p>
                            <p class="m-0 pb-1">Nhánh</p>
                        </div>
                        <div class="col-6 text-end">
                            <p class="m-0 pb-1">
                                @if($thanhvien->name != null)
                                    {{ $thanhvien->name }}
                                @else
                                    Chưa có tên
                                @endif
                            </p>
                            <p class="m-0 pb-1">0{{$thanhvien->phone}}</p>
                            <p class="m-0 pb-1">{{$thanhvien->created_at->toDateString()}}</p>
                            <p class="m-0 pb-1">{{$point->point}} point</p>
                            <p class="m-0 pb-1">{{$point->doanhthu}} VNĐ</p>
                            <p class="m-0 pb-1">{{$tong_so_nhom}} nhóm</p>
                            <p class="m-0 pb-1">{{$tong_so_nhanh}} nhánh</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>  
</section>
</body>
@include('public.users.layout.footer')