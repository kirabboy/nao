<div class="pt-86"></div>
<div class="menu-fix d-flex justify-content-around">
    <a href="{{ route('home') }}" class="d-flex justify-content-center align-items-center flex-column item">
        <i class="fa fa-home" aria-hidden="true"></i>
        <span>Trang chủ</span>
    </a>
    <a href="{{ URL::to('/san-pham/dai-ly') }}" class="d-flex justify-content-center align-items-center flex-column item">
    <i class="fa fa-shopping-cart" aria-hidden="true"></i>
        <span>Sản phẩm</span>
    </a>
    <a href="{{ URL::to('/don-hang') }}" class="d-flex justify-content-center align-items-center flex-column item">
        <i class="fa fa-cube" aria-hidden="true"></i>
        <span>Đơn hàng</span>
    </a>
    <a href="{{url('/chi-tiet-khach-hang')}}" class="d-flex justify-content-center align-items-center flex-column item">
    <i class="fa fa-user" aria-hidden="true"></i>
        <span>Khách hàng</span>
    </a>
</div>