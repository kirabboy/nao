@include('public.users.layout.header')
<section>  
    <div class="row p-3">
        <div class="col-12">
            <h5>
                <a href="{{asset('/')}}"><i class="fa fa-chevron-left" aria-hidden="true"></i><span class="ps-3"> Cá nhân</span></a>
                
            </h5>
        </div>
    </div>
</section>

<section>
    <div class="row pl-3 px-3">
        <div class="col-12 pb-3 text-center">
            <img src="{{asset('user/image/ic_user.png')}}" width="100" height="100">
            <p class="m-0 pt-1">{{$user->name}}</p>
            <p class="pt-1">
                <!-- <i class="fa fa-map-marker px-2" style="color: #247bff; font-size: 20px;" aria-hidden="true"></i> 
                <span class="px-2">Việt Nam</span>
                <i class="fa fa-circle px-2" aria-hidden="true" style="font-size: 8px;"></i>
                <span> 0397473723</span> -->
                @if ($user->level == 1)
                    <button class="btn btn-radius btn-xanhngoc">Cộng tác viên</button>
                @elseif ($user->level == 2)
                    <button class="btn btn-radius btn-cam">Đại lý chuẩn</button>
                @elseif ($user->level == 3)
                    <button class="btn btn-radius btn-cam">Đại lý mới</button>
                @else 
                    <button class="btn btn-radius btn-cam">Đang xét duyệt lên đại lý</button>
                @endif
            </p>
            <button class="btn btn-radius btn-xanhngoc-white">0 đ</button>
        </div>  

        <div class="col-6 pb-4">
            <div class="card card-vip">
                <div class="card-body text-center">
                    <img src="{{asset('user/image/ic_user.png')}}" class="pb-2" width="50">
                    <p class="mb-2">Hoa hồng bán lẻ</p>
                    <a href="{{asset('/hoahongbanle')}}" class="btn btn-xanhngoc-no-radius">
                        0 đ</a>
                </div>
              </div>
        </div>
        <div class="col-6">
            <div class="card card-vip">
                <div class="card-body text-center">
                    <img src="{{asset('user/image/ic_user.png')}}" class="pb-2" width="50">
                    <p class="mb-2">Hoa hồng nhóm</p>
                    <a href="{{asset('/hoahongnhom')}}" class="btn btn-xanhngoc-no-radius">
                        0 đ</a>
                </div>
            </div>
        </div>

        <div class="col-6 pb-4">
            <div class="card card-vip">
                <div class="card-body text-center">
                    <img src="{{asset('user/image/ic_user.png')}}" class="pb-2" width="50">
                    <p class="mb-2">Hoa hồng lãnh đạo</p>
                    <a href="#" class="btn btn-xanhngoc-no-radius">
                        0 đ</a>
                </div>
              </div>
        </div>
        <div class="col-6">
            <div class="card card-vip">
                <div class="card-body text-center">
                    <img src="{{asset('user/image/ic_user.png')}}" class="pb-2" width="50">
                    <p class="mb-2">Hoa hồng tài chính</p>
                    <a href="#" class="btn btn-xanhngoc-no-radius">
                        0 đ</a>
                </div>
            </div>
        </div>

        <div class="col-3"></div>

        <div class="col-6">
            <div class="card card-vip">
                <div class="card-body text-center">
                    <img src="{{asset('user/image/ic_user.png')}}" class="pb-2" width="50">
                    <p class="mb-2">Chi phí</p>
                    <a href="{{asset('/chiphi')}}" class="btn btn-xanhngoc-no-radius">
                        0 đ</a>
                </div>
            </div>
        </div>
    </div>

</section>
@include('public.users.layout.footer')