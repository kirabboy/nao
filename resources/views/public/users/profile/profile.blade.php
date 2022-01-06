@include('public.users.layout.header')
<body>
<section>  
    <div class="row p-3">
        <div class="col-12">
            <h5>
                <a href="{{asset('/')}}"><i class="fa fa-chevron-left" aria-hidden="true"></i></a>
                <span class="ps-3"> Cá nhân</span>
            </h5>
        </div>
    </div>
</section>

<section>
    <div class="row p-3">
        <div class="col-12 pb-3 text-center">
            <img src="{{asset('user/image/ic_user.png')}}" width="100" height="100">
            <p class="pt-2">Nguyễn Viết Quân</p>
            <button class="btn btn-radius btn-xanhngoc">
                Cộng tác viên
            </button>
            <button class="btn btn-radius btn-cam">Đang xét duyệt lên đại lý</button>
        </div>
        <div class="col-12">
            <p class="text-small pb-1 m-0">Link giới thiệu</p>
            <p>
                <input class="btn_linkgioithieu inputform" value="https://www.youtube.com/watch?v" readonly>
                <span class="linkgioithieu copyIcon"><i class="fa fa-clone" aria-hidden="true"></i></span>
            </p>
        </div>
        <div class="col-12 pb-3">
            <p class="text-small pb-1 m-0">Mã giới thiệu</p>
            <p>
                <input class="btn_magioithieu inputform" value="0493846287GT" readonly></input>
                <span class="magioithieu copyIcon"><i class="fa fa-clone" aria-hidden="true"></i></span>
            </p>
        </div>
        <div class="col-12">
            <p class="icon_info"><i class="fa fa-user-o" aria-hidden="true"></i> 
                <span><a href="{{asset('profile/info')}}">Thông tin cá nhân</a></span></p>
        </div>
        <div class="col-12">
            <p class="icon_info"><i class="fa fa-credit-card" aria-hidden="true"></i> 
                <span><a href="{{asset('profile/thanhtoan')}}">Thông tin thanh toán</a></span></p>
        </div>
        <div class="col-12">
            <p class="icon_info"><i class="fa fa-arrow-up" aria-hidden="true"></i> 
                <span><a href="{{asset('profile/nangcapdaily')}}">Nâng cấp đại lý</a></span></p>
        </div>
        <div class="col-12">
            <p class="icon_info"><i class="fa fa-key" aria-hidden="true"></i> 
                <span><a href="{{asset('profile/resetPassword')}}">Đổi mật khẩu</a></span></p>
        </div>
        <div class="col-12">
            <p class="icon_info"><i class="fa fa-sign-out" aria-hidden="true"></i> 
                <span><a href="{{asset('dang-nhap')}}">Đăng xuất</a></span></p>
        </div>
    </div>

</section>
</body>
@include('public.users.layout.footer')

