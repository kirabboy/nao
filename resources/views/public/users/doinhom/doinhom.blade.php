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
                <a href="{{asset('/')}}"><i class="fa fa-chevron-left" aria-hidden="true"></i>
                <span class="ps-3"> Đội nhóm</span></a>
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

        <!-- <div class="col-6 pb-3">
            <input class="inputform" style="width: 85%;" type="date" id="myDate" value="2021-12-21">
        </div> -->

        <div class="col-12">
            <p class="fw-bold">Danh sách đội ngũ của bạn</p>
        </div>

        <div class="col-12 pb-4">
            @if ($listPoint_getGroup != null)
            <ol id='list' style="list-style: none; padding: 0;">
                @foreach($listPoint_getGroup as $value)
                <li class="list_name_group">
                    <a class="text-dark" href="{{route('doinhom.show',$value->id)}}">
                        <div class="card-hoahong" style="box-shadow: none; border: 1px solid #199DA4">
                            <div class="card-body pt-0 pb-0">
                                <p class="m-0">
                                    @if($value->name != null)
                                        {{ $value->name }}
                                    @else 
                                        Chưa có tên
                                    @endif
                                @if($value->level == 1)
                                    <span id="btn_ctv">CTV</span></p>
                                @else
                                    <span id="btn_daily">Đại lý</span></p>
                                @endif
                            </div>
                        </div>
                    </a>
                </li>
                @endforeach
            @else
                <div class="card-hoahong" style="box-shadow: none; border: 1px solid #a41919">
                    <div class="card-body pt-0 pb-0 text-center">
                    <p class="m-0">Bạn hiện tại chưa giới thiệu được ai cả!</p>
                    </div>
                </div>
            @endif
            </ol>
        </div>
      

    </div>  
</section>
</body>
@include('public.users.layout.footer')