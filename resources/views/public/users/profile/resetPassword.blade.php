@include('public.users.layout.header')
<body>
<section>  
    <div class="row p-3">
        <div class="col-12">
            <h5>
                <a href="{{asset('profile')}}"><i class="fa fa-chevron-left" aria-hidden="true"></i></a>
                <span class="ps-3"> Đổi mật khẩu</span>
            </h5>
        </div>
    </div>
</section>

<section>
    <div class="row p-3">
        <div class="col-12">
            <p class="text-small pb-1 m-0">Mật khẩu cũ</p>
            <p>
                <input id="password-field" type="password" class="inputform viennhat" name="password" placeholder="Nhập mật khẩu">
                <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password icon_eyes"></span>
            </p>
        </div>
        <div class="col-12">
            <p class="text-small pb-1 m-0">Mật khẩu mới</p>
            <p>
                <input type="password" name="password" class="inputform viennhat" id="password" placeholder="Nhập mật khẩu mới"/>
                <i class="fa fa-fw fa-eye icon_eyes" id="togglePassword"></i>
            </p>
        </div>
        <div class="col-12">
            <p class="text-small pb-1 m-0">Nhập lại mật khẩu mới</p>
            <p>
                <input type="password" name="password2" class="inputform viennhat" id="password2"  placeholder="Nhập lại mật khẩu mới"/>
                <i class="fa fa-fw fa-eye icon_eyes" id="togglePassword2"></i>
            </p>
        </div>
        <div class="col-12 text-center" style="position: absolute;bottom: 10%;">
            <button class="btn btn-radius btn-cam" style="width: 60%;font-size: 16px;">Lưu</button>
        </div>
    </div>

</section>
</body>
@include('public.users.layout.footer')