<section id="showNangCap1" style="display: none;">
    <div class="row p-3">
        <div class="col-12">
            <h5>
                <a onclick="showRegister()"><i class="fa fa-chevron-left" aria-hidden="true"></i>
                <span class="ps-3"> Thông tin đăng ký</span></a>
            </h5>
        </div>
    </div>
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
                    <p class="m-0 pb-3 color-xanhngoc">{{$bank->price_upgrade}}</p>
                    <p class="m-0 pb-2 color-xanhngoc" style="margin-top: -7px !important;">
                        <a class="btn btn-radius btn-xanhngoc">
                           Chuyển khoản
                        </a>
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
            <a class="btn btn-radius btn-cam" style="width: 60%;font-size: 16px;"
                onclick="final1()">Đồng ý</a>
        </div>
    </div>  
</section>

<section id="final1" style="display: none">
    <div class="row p-3">
        <div class="col-12">
            <h5>
                <a href="{{asset('profile')}}"><i class="fa fa-chevron-left" aria-hidden="true"></i>
                <span class="ps-3"> Chuyển khoản</span></a>
            </h5>
        </div>
    </div>
    <div class="row p-3 pt-0">
        <div class="col-12 pb-4">
            <div class="row">
                <div class="col-6 text-start">
                    <p class="m-0 pb-3">Ngân hàng</p>
                </div>
                <div class="col-6 text-end">
                    <p class="m-0 pb-3 color-xanhngoc">{{$bank->bank_name}} {{$bank->bank_chinhanh}}</p>
                </div>
                <div class="col-6 text-start">
                    <p class="m-0 pb-3">Số tài khoản</p>
                    <p class="m-0 pb-3">Chủ tài khoản</p>
                    
                </div>
                <div class="col-6 text-start">
                    <p class="m-0 pb-3 color-xanhngoc">
                        <span class="btn_linkgioithieu">{{$bank->bank_number}}</span>
                        <!-- <span class="linkgioithieu"><i class="fa fa-clone" aria-hidden="true"></i></span> -->
                    </p>
                    <p class="m-0 pb-3 color-xanhngoc">{{$bank->bank_boss}}</p>

                    
                </div>
                <div class="col-6 text-start">
                    <p class="m-0 pb-3">Nội dung CK</p>
                    <!-- <p class="m-0 pb-3">Hạn thanh toán</p> -->
                    <p class="m-0 fw-bold pb-3" style="font-size: 20px;">Tổng tiền</p>
                </div>
                <div class="col-6 text-end">
                <p class="m-0 pb-3 color-xanhngoc">
                        <span class="btn_linkgioithieu">Nangcap CTV</span>
                        <!-- <span class="linkgioithieu"><i class="fa fa-clone" aria-hidden="true"></i></span> -->
                    </p>
                    <!-- <p class="m-0 pb-3 color-xanhngoc">58:09</p> -->
                    <p class="m-0 pb-3 fw-bold color-xanhngoc" style="font-size: 20px;">
                        {{$bank->price_upgrade}} VNĐ
                    </p>
                </div>
            </div>
        </div>

        
            <div class="col-12 pb-5">
                <div class="card-hoahong" style="box-shadow: none; border: 1px solid #f6974f">
                    <div class="card-body pt-1 pb-1">
                        <p class="m-0 pb-3 fw-bold">Hướng dẫn chuyển khoản</p>
                        <p class="m-0">{{$bank->note}}</p>
                    </div>
                </div>
                <div class="pt-3">
                    <i class="fa fa-upload" aria-hidden="true"></i>
                    <label for="uploadImage" class="color-camVIP">Tải hình ảnh chuyển khoản lên</label>
                    <input id="uploadImage" style="display:none;" name="imageChuyenKhoan" type="file">
                    <div id="result" class="uploadPreview">
                </div>
            </div>

            <div class="col-12 text-center pt-3">
                <button type="submit" class="btn btn-radius btn-cam" style="width: 60%;font-size: 16px;"  data-bs-toggle="modal"
                 data-bs-target="#exampleModal">Hoàn tất</button>
            </div>
        @csrf
        </form>
</section>