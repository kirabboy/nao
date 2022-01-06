@include('public.users.layout.header')
<section>  
    <div class="row p-3">
        <div class="col-12">
            <h5>
                <a href="{{asset('profile')}}"><i class="fa fa-chevron-left" aria-hidden="true"></i></a>
                <span class="ps-3"> Nâng cấp đại lý</span>
            </h5>
        </div>
    </div>
</section>

<section>
    <div class="row p-3 pt-0">
        <div class="col-12 pb-4">
            <div class="card-hoahong p-0">
                <div class="card-body">
                    <p class="m-0 pb-4 fw-bold text-center text-uppercase color-xanhngoc" style="font-size: 18px;">Trở thành ctv</p>
                    <div class="row">
                        <div class="col-2">
                            <p class="m-0 pb-1 color-xanhngoc text-center">
                                <i class="fa fa-check-circle" aria-hidden="true" style="font-size: 22px"></i>
                            </p>
                        </div>
                        <div class="col-10 px-0">
                            <p class="m-0 pb-1 color-xanhngoc text-left">
                                Chiết khấu 30%
                            </p>
                        </div>
                    </div>
                    <div class="row pb-4">
                        <div class="col-2">
                            <p class="m-0 pb-1 color-xanhngoc text-center">
                                <i class="fa fa-check-circle" aria-hidden="true" style="font-size: 22px"></i>
                            </p>
                        </div>
                        <div class="col-10 px-0">
                            <p class="m-0 pb-1 color-xanhngoc text-left">
                                Nhận ngay link zalo học kinh doanh sản phẩm
                            </p>
                        </div>
                    </div>
                    <div class="text-center">
                        <button class="btn btn-radius btn-xanhngoc">Bạn đã là CTV</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 pb-4">
            <div class="card-hoahong p-0">
                <div class="card-body">
                    <p class="m-0 pb-4 fw-bold text-center text-uppercase color-camVIP" style="font-size: 18px;">Trở thành đại lý</p>
                    <div class="row">
                        <div class="col-2">
                            <p class="m-0 pb-1 color-camVIP text-center">
                                <i class="fa fa-check-circle" aria-hidden="true" style="font-size: 22px"></i>
                            </p>
                        </div>
                        <div class="col-10 px-0">
                            <p class="m-0 pb-1 color-camVIP text-left">
                                Chiết khấu 30%
                            </p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-2">
                            <p class="m-0 pb-1 color-camVIP text-center">
                                <i class="fa fa-check-circle" aria-hidden="true" style="font-size: 22px"></i>
                            </p>
                        </div>
                        <div class="col-10 px-0">
                            <p class="m-0 pb-1 color-camVIP text-left">
                                Nhận ngay điểm NAO khi mua sắm
                            </p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-2">
                            <p class="m-0 pb-1 color-camVIP text-center">
                                <i class="fa fa-check-circle" aria-hidden="true" style="font-size: 22px"></i>
                            </p>
                        </div>
                        <div class="col-10 px-0">
                            <p class="m-0 pb-1 color-camVIP text-left">
                                Nhận ngay link zalo học kinh doanh sản phẩm
                            </p>
                        </div>
                    </div>

                    <div class="row pb-4">
                        <div class="col-2">
                            <p class="m-0 pb-1 color-camVIP text-center">
                                <i class="fa fa-check-circle" aria-hidden="true" style="font-size: 22px"></i>
                            </p>
                        </div>
                        <div class="col-10 px-0">
                            <p class="m-0 pb-1 color-camVIP text-left">
                                Cọc 2tr VNĐ trong tháng đầu
                            </p>
                        </div>
                    </div>

                    <div class="text-center">
                        <button class="btn btn-radius btn-cam">
                            <a class="text-light" href="{{asset('profile/dangkynangcapdaily')}}">Nâng cấp ngay</a>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>  
</section>
@include('public.users.layout.footer')