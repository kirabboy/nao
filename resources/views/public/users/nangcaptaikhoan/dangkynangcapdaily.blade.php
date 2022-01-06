@include('public.users.layout.header')

<style>
    p {
        font-size: 14px;
    }
</style>
<section>  
    <div class="row p-3">
        <div class="col-12">
            <h5>
                <a href="{{asset('profile')}}"><i class="fa fa-chevron-left" aria-hidden="true"></i></a>
                <span class="ps-3"> Thông tin đăng ký</span>
            </h5>
        </div>
    </div>
</section>

<section>
    <div class="row p-3 pt-0">
        <div class="col-12 pb-4">
            <div class="row">
                <div class="col-6 text-start">
                    <p class="m-0 pb-2">Tên gói</p>
                    <p class="m-0 pb-2">Ngày mua</p>
                    <p class="m-0 pb-3">Tổng tiền</p>
                    <p class="m-0 pb-2">Phương thức thanh toán</p>
                </div>
                <div class="col-6 text-end">
                    <p class="m-0 pb-2 color-xanhngoc">Nâng cấp lên đại lý</p>
                    <p class="m-0 pb-2 color-xanhngoc">24/12/2021</p>
                    <p class="m-0 pb-3 color-xanhngoc">2.000.000</p>
                    <p class="m-0 pb-2 color-xanhngoc" style="margin-top: -7px !important;">
                        <button class="btn btn-radius btn-xanhngoc">
                            <a class="text-light" href="{{asset('profile/chuyenkhoan')}}">Chuyển khoản</a>
                        </button>
                    </p>
                </div>
            </div>
        </div>

        <div class="col-12 pb-4">
            <div class="card-hoahong" style="box-shadow: none; border: 1px solid #f6974f">
                <div class="card-body pt-1 pb-1">
                    <p class="m-0 pb-2 fw-bold">Hướng dẫn chuyển khoản</p>
                    <p class="m-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. In commodo luctus enim dignissim phasellus ut urna orci. Purus metus pretium viverra leo, mauris mi. Fermentum diam amet, et tempor, duis ut. Mi volutpat vel risus in sem ac.</p>
                </div>
            </div>
        </div>

        <div class="col-12 text-center pt-3">
            <button class="btn btn-radius btn-cam" style="width: 60%;font-size: 16px;">Lưu thông tin</button>
        </div>
    </div>  
</section>
@include('public.users.layout.footer')
