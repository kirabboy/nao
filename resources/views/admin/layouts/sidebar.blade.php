<!--sidebar  -->
<div class="sidebar">
        <div class="logo-details">
            <div class="logo_name">
                <h3>Mevivu</h3>
            </div>
            <i class='fa fa-bars' id="btn"></i>
        </div>

        <ul class="nav-list p-0">
            <li class="dropdown">
                <a href="{{ URL::to('/admin') }}" class="dropbtn">
                    <i class="fa fa-frown-o" aria-hidden="true"></i>
                    <span class="links_name">Dashboard</span>
                </a>
            </li>
            <li class="dropdown">
                <a href="#" class="dropbtn">
                    <i class="fa fa-frown-o" aria-hidden="true"></i>
                    <span class="links_name w-100 align-items-center d-flex">Quản lý đối tác <i
                            class="fa fa-angle-double-right float-end" aria-hidden="true"></i></span>
                </a>
                <span class="dropdown-content">
                    <a href="{{ URL::to('/admin/doinhom') }}">Đội nhóm</a>
                    <a href="{{ URL::to('/admin/canhan') }}">Cá nhân</a>
                    <a href="{{ URL::to('/admin/nangcapdaily') }}">Nâng cấp đại lý</a>
                </span>
            </li>
            <li class="dropdown">
                <a href="#" class="dropbtn">
                    <i class="fa fa-frown-o" aria-hidden="true"></i>
                    <span class="links_name w-100 align-items-center d-flex">Quản lý sản phẩm <i
                            class="fa fa-angle-double-right float-end" aria-hidden="true"></i></span>
                </a>
                <span class="dropdown-content">
                    <a href="{{ route('nganh-nhom-hang.index') }}">Ngành/Nhóm hàng</a>
                    <a href="{{ route('thuong-hieu.index') }}">Thương hiệu</a>
                    <a href="{{ route('don-vi-tinh.index') }}">Đơn vị tính</a>
                    <a href="{{ route('san-pham.index') }}">Thông tin sản phẩm</a>
                </span>
            </li>
            <li class="dropdown">
                <a href="#" class="dropbtn">
                    <i class="fa fa-frown-o" aria-hidden="true"></i>
                    <span class="links_name w-100 align-items-center d-flex">Cài đặt khuyến mãi <i
                            class="fa fa-angle-double-right float-end" aria-hidden="true"></i></span>
                </a>
                <span class="dropdown-content">
                    <a href="{{ URL::to('/admin/khuyenmai') }}">Loại khuyến mãi</a>
                    <a href="{{ URL::to('/admin/loaikhuyenmai') }}">Cấu hình khuyến mại</a>
                </span>
            </li>
            <li class="dropdown">
                <a href="#" class="dropbtn">
                    <i class="fa fa-frown-o" aria-hidden="true"></i>
                    <span class="links_name w-100 align-items-center d-flex">Bán hàng <i
                            class="fa fa-angle-double-right float-end" aria-hidden="true"></i></span>
                </a>
                <span class="dropdown-content">
                    <a href="{{route('orderadmin.agency')}}">Đơn hàng đại lý</a>
                </span>
            </li>
            <li class="dropdown">
                <a href="{{ URL::to('admin/baocao') }}" class="dropbtn">
                    <i class="fa fa-frown-o" aria-hidden="true"></i>
                    <span class="links_name w-100 align-items-center d-flex">Báo cáo <i
                            class="fa fa-angle-double-right float-end" aria-hidden="true"></i></span>
                </a>
            </li>
            <li class="dropdown">
                <a href="{{ route('warehouse.index') }}" class="dropbtn">
                    <i class="fa fa-frown-o" aria-hidden="true"></i>
                    <span class="links_name w-100 align-items-center d-flex">Tồn kho </span>
                </a>
            </li>
            <li class="dropdown">
                <a href="#" class="dropbtn">
                    <i class="fa fa-frown-o" aria-hidden="true"></i>
                    <span class="links_name w-100 align-items-center d-flex">Bài viết <i
                            class="fa fa-angle-double-right float-end" aria-hidden="true"></i></span>
                </a>
                <span class="dropdown-content">
                    <a href="{{route('chuyenmuc-baiviet.index')}}">Chuyên mục bài viết</a>
                    <a href="{{route('baiviet.index')}}">Tất cả bài viết</a>
                </span>
            </li>
            <li class="dropdown">
                <a href="#" class="dropbtn">
                    <i class="fa fa-frown-o" aria-hidden="true"></i>
                    <span class="links_name w-100 align-items-center d-flex">Setting <i
                            class="fa fa-angle-double-right float-end" aria-hidden="true"></i></span>
                </a>
                <span class="dropdown-content">
                    <a href="{{URL::to('admin/cau-hinh-van-chuyen')}}">Cấu hình vận chuyển</a>
                    <a href="{{route('cauhinhbank')}}">Cấu hình chuyển khoản</a>
                </span>
            </li>
            <li class="profile">
                <div class="profile-details">
                    <img src="{{ asset('/public/images/admin.png') }}" alt="profileImg">
                    <div class="name_job">
                        <div class="name">Tom E. Riddler</div>
                        <div class="job">Science Technology</div>
                    </div>
                </div>
                <a href="{{route('logout')}}"><i class='bx bx-log-out' id="log_out"></i></a>
            </li>
        </ul>
    </div>
    <!-- end sidebar -->