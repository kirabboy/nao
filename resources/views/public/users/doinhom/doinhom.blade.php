@include('public.users.layout.header')
<body>
<style>
    input#myDate {
        background-color: white;
    }
</style>
<section>  
    <div class="row p-3">
        <div class="col-12">
            <h5>
                <a href="{{asset('/')}}"><i class="fa fa-chevron-left" aria-hidden="true"></i></a>
                <span class="ps-3"> Đội nhóm</span>
            </h5>
        </div>
    </div>
</section>

<section>
    <div class="row p-3 pt-0">
        <div class="col-12 pb-4">
            <i class="fa fa-search" id="icon_form_search" aria-hidden="true"></i>
            <input id="searchbar" onkeyup="search_thanhvien()" type="text"
            name="search" class="inputform vienformsearch" placeholder="Tìm kiếm thành viên">
        </div>

        <div class="col-6 pb-3">
            <input class="inputform" style="width: 85%;" type="date" id="myDate" value="2021-12-21">
        </div>

        <div class="col-12">
            <p class="fw-bold">Danh sách đội ngũ của bạn</p>
        </div>

        <div class="col-12 pb-4">
            <ol id='list' style="list-style: none; padding: 0;">
                <li class="list_name_group">
                    <a class="text-dark" href="{{asset('profile/chitietthanhvien')}}">
                        <div class="card-hoahong" style="box-shadow: none; border: 1px solid #199DA4">
                            <div class="card-body pt-0 pb-0">
                                <p class="m-0">Nguyễn Văn A <span id="btn_ctv">CTV</span></p>
                            </div>
                        </div>
                    </a>
                </li>
                <li class="list_name_group">
                    <div class="card-hoahong" style="box-shadow: none; border: 1px solid #f6954b">
                        <div class="card-body pt-0 pb-0">
                            <p class="m-0">Nguyễn Văn B <span id="btn_daily">Đại lý</span></p>
                        </div>
                    </div>
                </li>
                <li class="list_name_group">
                    <div class="card-hoahong" style="box-shadow: none; border: 1px solid #199DA4">
                        <div class="card-body pt-0 pb-0">
                            <p class="m-0">Nguyễn Văn C <span id="btn_ctv">CTV</span></p>
                        </div>
                    </div>
                </li>
                <li class="list_name_group">
                    <div class="card-hoahong" style="box-shadow: none; border: 1px solid #199DA4">
                        <div class="card-body pt-0 pb-0">
                            <p class="m-0">Nguyễn Văn D <span id="btn_ctv">CTV</span></p>
                        </div>
                    </div>
                </li>
                <li class="list_name_group">
                    <div class="card-hoahong" style="box-shadow: none; border: 1px solid #199DA4">
                        <div class="card-body pt-0 pb-0">
                            <p class="m-0">Nguyễn Văn E <span id="btn_ctv">CTV</span></p>
                        </div>
                    </div>
                </li>
                <li class="list_name_group">
                    <div class="card-hoahong" style="box-shadow: none; border: 1px solid #f6954b">
                        <div class="card-body pt-0 pb-0">
                            <p class="m-0">Nguyễn Văn F <span id="btn_daily">Đại lý</span></p>
                        </div>
                    </div>
                </li>
            </ol>
        </div>
      

    </div>  
</section>
</body>
@include('public.users.layout.footer')