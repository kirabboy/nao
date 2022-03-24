@include('public.users.layout.header')
<body>
<section>  
    <div class="row p-3">
        <div class="col-12">
            <h5>
                <a href="{{asset('profile')}}"><i class="fa fa-chevron-left" aria-hidden="true"></i>
                <span class="ps-3"> Thông tin cá nhân</span></a>
            </h5>
        </div>
    </div>
</section>

<section>
    <form action="{{route('updateInfo')}}" method="POST" enctype="multipart/form-data">
    <div class="row p-3">
        <div class="col-12 text-center">
            <label for="uploadImage" class="color-camVIP" id="label_img">
            
            @if ($user->avatar == 'image_default.png')
                <img src="{{asset('user/image/ic_user.png')}}" id="avatar" width="100" height="100">
            @else
                <img src="{{asset('user/avatar')}}/{{$user->avatar}}" id="avatar" width="100" height="100">
            @endif </label>

            <input id="uploadImage" style="display:none;" name="avatar" type="file">
            <div id="result" class="uploadPreview"></div>
            <p class="pt-2">{{$user->name}}</p>
        </div>
        <div class="col-12">
            <p class="text-small pb-1 m-0">Tài khoản</p>
            <p>
                <input class="inputform viennhat" placeholder="{{$user->code_user}}" readonly></input>
            </p>
        </div>
        <div class="col-12">
            <p class="text-small pb-1 m-0">Họ tên</p>
            <p>
                <input class="inputform viennhat" name="name" value="{{$user->name}}"></input>
            </p>
        </div>
        <div class="col-12">
            <p class="text-small pb-1 m-0">Ngày sinh</p>
            <p>
                <input type="date" name="birthday" id="start" name="trip-start" class="inputform viennhat" value="{{$user->birthday}}">
            </p>
        </div>
        <div class="col-12">
            <p class="text-small pb-1 m-0">Giới tính</p>
            <p>
                <select class="form-select inputform viennhat" name="sex">
                    <option value="{{$user->sex}}" selected>
                        @if ($user->sex == 1)
                            Nam
                        @else
                            Nữ
                        @endif
                    </option>

                    @if ($user->sex != 1)
                        <option value="1">Nam</option>
                    @else 
                        <option value="2">Nữ</option>
                    @endif
                </select>
            </p>
        </div>
        <div class="col-12">
            <p class="text-small pb-1 m-0">Số CMND</p>
            <p>
                <input class="inputform viennhat" name="cmnd" value="{{$user->cmnd}}"></input>
            </p>
        </div>
        <div class="col-12">
            <p class="text-small pb-1 m-0">Ngày cấp CMND </p>
            <p>
                <input type="date" id="start" name="cmnd_day" class="inputform viennhat" value="{{$user->cmnd_day}}">
            </p>
        </div>
        <div class="col-12">
            <p class="text-small pb-1 m-0">Ảnh CMND mặt trước</p>
            <p>
                <label for="img_cmnd_truoc" class="color-camVIP" style="width: 100%" id="label_cmnd_truoc">
                    @if ($user->image_cmnd_1 == 'image_default.png')
                        Click vào đây để tải hình ảnh cmnd mặt trước lên
                    @else
                        <img src="{{asset('user/img_cmnd')}}/{{$user->image_cmnd_1}}" id="" width="100%" height="100%">
                    @endif
                </label>
                <input id="img_cmnd_truoc" style="display:none;" name="img_cmnd_truoc" type="file">
                <div id="result_cmnd_truoc" class=""></div>
            </p>
        </div>
        <div class="col-12">
            <p class="text-small pb-1 m-0">Ảnh CMND mặt trước</p>
            <p>
                <label for="img_cmnd_sau" class="color-camVIP" style="width: 100%" id="label_cmnd_sau">
                    @if ($user->image_cmnd_2 == 'image_default.png')
                        Click vào đây để tải hình ảnh cmnd mặt trước lên
                    @else
                        <img src="{{asset('user/img_cmnd')}}/{{$user->image_cmnd_2}}" id="" width="100%" height="100%">
                    @endif
                </label>
                <input id="img_cmnd_sau" style="display:none;" name="img_cmnd_sau" type="file">
                <div id="result_cmnd_sau" class=""></div>
            </p>
        </div>
        <div class="col-12">
            <p class="text-small pb-1 m-0">Địa chỉ</p>
            <p>
                <input class="inputform viennhat" name="address" value="{{$user->address}}"></input>
            </p>
        </div>
        <div class="col-12">
            <p class="text-small pb-1 m-0">Tỉnh thành<colgroup></colgroup></p>
            <p>
                <select class="form-select inputform viennhat" name="province_id">
                    <option value="{{$user->id_province}}">
                        {{ $user_province }}
                    </option>
                    @foreach ($province as $value)
                        <option value="{{ $value->matinhthanh }}">
                            {{ $value->tentinhthanh }}
                        </option>
                    @endforeach
                </select>
            </p>
        </div>
        <div class="col-12">
            <p class="text-small pb-1 m-0">Quận huyện<colgroup></colgroup></p>
            <p>
                <select class="form-select inputform viennhat" name="district_id" data-placeholder=" Cấp huyện " required>
                    <option value="{{$user->id_district}}">
                        {{ $user_district -> tenquanhuyen}}
                    </option> 
                    <option value=""> Cấp huyện </option>
                </select>
            </p>
        </div>
        <div class="col-12">
            <p class="text-small pb-1 m-0">Phường xã<colgroup></colgroup></p>
            <p>
                <select class="form-select inputform viennhat" name="ward_id">
                    <option value="{{$user->id_ward}}">
                        {{ $user_ward }}
                    </option>
                    <option value=""> Cấp xã </option>
                </select>
            </p>
        </div>
        {{-- <div class="col-12">
            <p class="text-small pb-1 m-0">Người bản trợ</p>
            <p>
                <input class="inputform viennhat" value="Alojdy"></input>
            </p>
        </div> --}}
        <div class="col-12">
            <p class="text-small pb-1 m-0">Số điện thoại</p>
            <p>
                <input class="inputform viennhat" value="+84{{$user->phone}}" readonly></input>
            </p>
        </div>
        <div class="col-12">
            <p class="text-small pb-1 m-0">Email</p>
            <p>
                <input class="inputform viennhat" name="email" value="{{$user->email}}"></input>
            </p>
        </div>

        <div class="col-12 text-center pt-5">
            <button class="btn btn-radius btn-cam" style="width: 60%;font-size: 16px;">Lưu thông tin</button>
        </div>
    </div>
    @csrf
    </form>

</section>
</body>
@include('public.users.layout.footer')

