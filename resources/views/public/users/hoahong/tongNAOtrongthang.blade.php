@include('public.users.layout.header')
<section>  
    <div class="row p-3">
        <div class="col-12">
            <h5>
                <a href="{{asset('profile/hoahong')}}"><i class="fa fa-chevron-left" aria-hidden="true"></i></a>
                <span class="ps-3"> Hoa hồng nhóm</span>
            </h5>
        </div>
    </div>
</section>

<section>
    <div class="row p-3 pt-0">
        <div class="col-12 pb-5 text-center">
            <p class="pt-5 pb-3 fw-bold color-camVIP text-uppercase" style="font-size: 24px;">Tổng NAO trong tháng</p>
            <button class="btn btn-radius btn-xanhngoc-white" style="font-size: 20px;width: 75%;">5.700.000.000 đ</button>
        </div>  

        <div class="col-12 pb-3">
            <a href="{{asset('profile/diemNAOnhanhtach')}}">
                <div class="card-hoahong" style="padding: 10px 0px !important;background: #199da3;">
                    <div class="card-body text-center p-0">
                        <p class="m-0 pb-1 text-white">Điểm NAO nhánh tách</p>
                        <div class="pb-3 pt-2" style="text-align: -webkit-center;"><p class="m-0" style="width: 30%; border-top: 2px solid white;"> </p></div>
                        <p class="m-0 pb-1 text-white" style="font-size: 20px;">500.000.000 NAO</p>
                    </div>
                </div>
            </a>
        </div>
        
        <div class="col-12">
            <div class="card-hoahong" style="padding: 10px 0px !important;background: #199da3;">
                <div class="card-body text-center p-0">
                    <p class="m-0 pb-1 text-white">Điểm NAO cá nhân và các nhóm còn lại</p>
                    <div class="pb-3 pt-2" style="text-align: -webkit-center;"><p class="m-0" style="width: 30%; border-top: 2px solid white;"> </p></div>
                    <p class="m-0 pb-1 text-white" style="font-size: 20px;">70.000.000 NAO</p>
                </div>
            </div>
        </div>
    </div>  
</section>
@include('public.users.layout.footer')