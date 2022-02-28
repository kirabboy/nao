@include('public.users.layout.header')
<body>
<section>  
    <div class="row p-3">
        <div class="col-12">
            <h5>
                <a href="{{asset('/')}}"><i class="fa fa-chevron-left" aria-hidden="true"></i>
                <span class="ps-3"> Cá nhân</span></a>
            </h5>
        </div>
    </div>
</section>
@if (count($errors) > 0)
<div class="alert alert-danger">
    @foreach ($errors->all() as $err)
        {{ $err }}<br>
    @endforeach
</div>
@endif

@if(session('thongbao'))
<div class="alert alert-success">
{{session('thongbao')}} <br> Quý Khách Hàng vui lòng <strong><a class="alert-success" href="tai-khoan">Tạo mới Hồ Sơ Khách Hàng</a></strong>
</div>
@endif
<section>
    <div class="row p-3">
        <div class="col-12 pb-3 text-center">
            @if ($user->avatar == 'image_default.png')
            <img src="{{asset('user/image/ic_user.png')}}" id="avatar" width="100" height="100"></label>
            @else
            <img src="{{asset('user/avatar')}}/{{$user->avatar}}" id="avatar" width="100" height="100"></label>
            @endif

            <p class="pt-2">{{$user->name}}</p>
            @if ($user->level == 1)
                <button class="btn btn-radius btn-xanhngoc">Cộng tác viên</button>
            @elseif ($user->level == 2)
                <button class="btn btn-radius btn-cam">Đại lý chuẩn</button>
            @elseif ($user->level == 3)
                <button class="btn btn-radius btn-cam">Đại lý mới</button>
            @else 
                <button class="btn btn-radius btn-cam">Đang xét duyệt lên đại lý</button>
            @endif
        </div>
        <div class="col-12">
            <p class="text-small pb-1 m-0">Link giới thiệu</p>
            <p>
                <input class="btn_linkgioithieu inputform" value="{{route('home')}}/dang-ky/{{$user->code_user}}" readonly>
                <span class="linkgioithieu copyIcon"><i class="fa fa-clone" aria-hidden="true"></i></span>
            </p>
        </div>
        <div class="col-12 pb-3">
            <p class="text-small pb-1 m-0">Mã giới thiệu</p>
            <p>
                <input class="btn_magioithieu inputform" value="{{$user->code_user}}" readonly></input>
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
                <span><a href="{{route('dang-xuat')}}">Đăng xuất</a></span></p>
        </div>
    </div>

</section>
</body>
@include('public.users.layout.footer')

