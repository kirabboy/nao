@include('public.users.layout.header')
<body>
<section>  
    <div class="row p-3">
        <div class="col-12">
            <h5>
                <a href="{{asset('profile')}}"><i class="fa fa-chevron-left" aria-hidden="true"></i></a>
                <span class="ps-3"> Thông tin cá nhân</span>
            </h5>
        </div>
    </div>
</section>

<section>
    <div class="row p-3">
        <div class="col-12 text-center">
            <img src="{{asset('user/image/ic_user.png')}}" width="100" height="100">
            <p class="pt-2">Nguyễn Viết Quân</p>
        </div>
        <div class="col-12">
            <p class="text-small pb-1 m-0">Tài khoản</p>
            <p>
                <input class="inputform viennhat" placeholder="9832747234"></input>
            </p>
        </div>
        <div class="col-12">
            <p class="text-small pb-1 m-0">Họ tên</p>
            <p>
                <input class="inputform viennhat" value="Nguyễn Viết Quân"></input>
            </p>
        </div>
        <div class="col-12">
            <p class="text-small pb-1 m-0">Ngày sinh</p>
            <p>
                <input type="date" id="start" name="trip-start" class="inputform viennhat" value="2021-11-24">
            </p>
        </div>
        <div class="col-12">
            <p class="text-small pb-1 m-0">Giới tính</p>
            <p>
                <select class="form-select inputform viennhat">
                    <option selected>Nam</option>
                    <option value="1">Nữ</option>
                </select>
            </p>
        </div>
        <div class="col-12">
            <p class="text-small pb-1 m-0">Số CMND</p>
            <p>
                <input class="inputform viennhat" value="9872346834"></input>
            </p>
        </div>
        <div class="col-12">
            <p class="text-small pb-1 m-0">Giới tính</p>
            <p>
                <input class="inputform viennhat" placeholder="9872346834"></input>
            </p>
        </div>
        <div class="col-12">
            <p class="text-small pb-1 m-0">Ngày cấp  CMND </p>
            <p>
                <input type="date" id="start" name="trip-start" class="inputform viennhat" value="2021-11-24">
            </p>
        </div>
        <div class="col-12">
            <p class="text-small pb-1 m-0">Nơi <colgroup></colgroup></p>
            <p>
                <select class="form-select inputform viennhat">
                    <option selected>Hà nội</option>
                    <option value="1">TP. HCM</option>
                </select>
            </p>
        </div>
        <div class="col-12">
            <p class="text-small pb-1 m-0">Người bản trợ</p>
            <p>
                <input class="inputform viennhat" value="Alojdy"></input>
            </p>
        </div>
        <div class="col-12">
            <p class="text-small pb-1 m-0">Số điện thoại</p>
            <p>
                <input class="inputform viennhat" value="9832747234"></input>
            </p>
        </div>
        <div class="col-12">
            <p class="text-small pb-1 m-0">Email</p>
            <p>
                <input class="inputform viennhat" value="Nguyễn Viết Quân"></input>
            </p>
        </div>
        <div class="col-12">
            <p class="text-small pb-1 m-0">Địa chỉ</p>
            <p>
                <input class="inputform viennhat" value="2346 Lãnh Ông Hà Nội"></input>
            </p>
        </div>

        <div class="col-12 text-center pt-5">
            <button class="btn btn-radius btn-cam" style="width: 60%;font-size: 16px;">Lưu thông tin</button>
        </div>
    </div>

</section>
</body>
@include('public.users.layout.footer')