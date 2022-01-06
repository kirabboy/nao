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
        <div class="col-12">
            <p class="text-small pb-1 m-0">Ngân hàng</p>
            <p>
                <input class="inputform viennhat" placeholder="Teckcombank"></input>
            </p>
        </div>
        <div class="col-12">
            <p class="text-small pb-1 m-0">Chủ tài khoản</p>
            <p>
                <input class="inputform viennhat" placeholder="Nguyễn Viết Quân"></input>
            </p>
        </div>
        <div class="col-12">
            <p class="text-small pb-1 m-0">Số tài khoản</p>
            <p>
                <input class="inputform viennhat" placeholder="9872346834"></input>
            </p>
        </div>
        <div class="col-12 pb-3">
            <p class="text-small pb-1 m-0">Chi nhánh</p>
            <p>
                <input class="inputform viennhat" placeholder="Phòng giao dịch Tô Hiệu Hải Phòng"></input>
            </p>
        </div>
        <div class="col-12 text-center" style="position: absolute;bottom: 10%;">
            <button class="btn btn-radius btn-cam" style="width: 60%;font-size: 16px;">Lưu thông tin</button>
        </div>
    </div>

</section>
</body>
@include('public.users.layout.footer')