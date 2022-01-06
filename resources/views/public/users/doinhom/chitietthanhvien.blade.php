@include('public.users.layout.header')
<body>
<section>  
    <div class="row p-3">
        <div class="col-12">
            <h5>
                <a href="{{asset('profile/doinhom')}}"><i class="fa fa-chevron-left" aria-hidden="true"></i></a>
                <span class="ps-3"> Chi phí</span>
            </h5>
        </div>
    </div>
</section>

<section>
    <div class="row p-3 pt-0">
        <div class="col-12 pb-4">
            <div class="card-hoahong">
                <div class="card-body card-hoahong-inside text-center pt-1 pb-1">
                    <div class="row">
                        <div class="col-12"><p id="btn_daily" style="float: left;">CTV</p></div>
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
                            <p class="m-0 pb-1 color-camVIP">Nguyễn Văn A</p>
                            <p class="m-0 pb-1 color-camVIP">0438274653</p>
                            <p class="m-0 pb-1 color-camVIP">23/11/2021</p>
                            <p class="m-0 pb-1 color-camVIP">10000</p>
                            <p class="m-0 pb-1 color-camVIP">00%</p>
                            <p class="m-0 pb-1 color-camVIP">00</p>
                            <p class="m-0 pb-1 color-camVIP">00</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>  
</section>
</body>
@include('public.users.layout.footer')