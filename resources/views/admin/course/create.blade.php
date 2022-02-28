<x-header_admin />
<link rel="stylesheet" href="{{ asset('/resources/css/quanlysanpham.css') }}">

<section class="home-section">

    <!-- menu mobile -->
    <div class="header bg-white shadow-sm header_mobile">
        <div class="text">Dashboard</div>
        <div class="icon_menu-mobile">
            <i class="fa fa-bars" data-bs-toggle="collapse" href="#menu-main" role="button" aria-expanded="false"
                aria-controls="menu-main"></i>
        </div>
    </div>
    <ul class="sub-menu collapse sidebar-mobile list-group list-group-flush" id="menu-main">
        <li class="list-group-item p-0 list-group-item-action">
            <a href="#" class="list-group-item-link p-3"><i class="fa fa-bar-chart-o"></i> Dashboard</a>
        </li>
        <li class="list-group-item p-0 list-group-item-action">
            <span class="list-group-item-link p-3" data-bs-toggle="collapse" href="#menu-mobile-doitac" role="button"
                aria-expanded="false" aria-controls="menu-mobile-doitac"><i class="fa fa-bar-chart-o"></i> Quản lý đối
                tác <i class="fa fa-angle-down fs-4 float-end"></i></span>
            <ul class="p-0 menu-child collapse" id="menu-mobile-doitac">
                <li class="list-group-item p-0 list-group-item-action">
                    <a href="doinhom.html" class="list-group-item-link list-item-custom px-5"><i
                            class="fa fa-bar-chart-o"></i> Đội nhóm</a>
                </li>
                <li class="list-group-item p-0 list-group-item-action">
                    <a href="canhan.html" class="list-group-item-link list-item-custom px-5"><i
                            class="fa fa-bar-chart-o"></i> Cá nhân</a>
                </li>
                <li class="list-group-item p-0 list-group-item-action">
                    <a href="thontinbanhang.html" class="list-group-item-link list-item-custom px-5"><i
                            class="fa fa-bar-chart-o"></i> Thông tin bán hàng</a>
                </li>
            </ul>
        </li>
        <li class="list-group-item p-0 list-group-item-action">
            <a href="#" class="list-group-item-link p-3"><i class="fa fa-bar-chart-o"></i> Quản lý nhân viên</a>
        </li>
        <li class="list-group-item p-0 list-group-item-action">
            <a href="#" class="list-group-item-link p-3"><i class="fa fa-bar-chart-o"></i> Quản lý sản phẩm</a>
        </li>
        <li class="list-group-item p-0 list-group-item-action">
            <a href="#" class="list-group-item-link p-3"><i class="fa fa-bar-chart-o"></i> Bán hàng</a>
        </li>
        <li class="list-group-item p-0 list-group-item-action">
            <a href="#" class="list-group-item-link p-3"><i class="fa fa-bar-chart-o"></i> Tồn kho</a>
        </li>
        <li class="list-group-item p-0 list-group-item-action">
            <a href="#" class="list-group-item-link p-3"><i class="fa fa-bar-chart-o"></i> Dữ liệu Master</a>
        </li>
        <li class="list-group-item p-0 list-group-item-action">
            <a href="#" class="list-group-item-link p-3"><i class="fa fa-bar-chart-o"></i> Setting</a>
        </li>
    </ul>
    </div>
    <!-- end menu mobile -->
    <div class="m-3">
        <div class="wrapper bg-white p-4">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="portlet-title">
                <div class="title-name">
                    <div class="caption">
                        <i class="fa fa-product-hunt icon-drec" aria-hidden="true"></i>
                        <span class="caption-subject bold uppercase">
                            Thông tin khóa học</span>
                    </div>
                </div>
            </div>
            <hr>
            <div class="portlet-body">
                <form action="{{ route('course.store') }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                <div class="fileinput-new thumbnail size-img-profile">
                                    <img src="{{ old('feature_img', 'http://api.salefie.vn/images/new_product_default.jpg')}}">
                                </div>
                                <div class="form-group my-2">
                                    <input id="ckfinder-input-1" type="hidden" name="feature_img" class="form-control" value="{{ old('feature_img') }}">
                                    <a style="cursor: pointer;" id="ckfinder-popup-1" class="btn btn-success">Chọn ảnh đại diện</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-9">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="col-md-12 control-label text-left">Trạng thái khóa học<span
                                                class="required" aria-required="true">(*)</span>:</label>
                                        <div class="col-md-12">
                                            <div class="form-group d-flex">
                                                <div class="input-group-btn" id="blog-status">
                                                    <select name="course_status" class="form-control">
                                                        <option value="0">Ngưng hoạt động</option>
                                                        <option value="1" selected>Hoạt động</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12 control-label text-left">Tên khóa học<span
                                                class="required" aria-required="true">(*)</span>:</label>
                                        <div class="col-md-12">
                                            <input type="text" name="course_title" class="form-control"
                                                required value="{{ old('course_title') }}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12 control-label text-left">Sản phẩm đi kèm<span
                                                class="required" aria-required="true">(*)</span>:</label>
                                        <div class="col-md-12">
                                            <select class="selectpicker form-control" name="course_product[]"
                                                required multiple>
                                                @foreach ($products as $item)
                                                    <option value="{{$item->id}}"
                                                        @php
                                                            if(old('course_product')) {
                                                                if(in_array($item->id, old('course_product'))) {
                                                                    echo "selected";
                                                                }
                                                            }
                                                        @endphp
                                                        >{{$item->id}} - {{$item->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-md-12 control-label text-left">Điểm Vpoint bán lẻ<span
                                                class="required" aria-required="true">(*)</span>:</label>
                                        <div class="col-md-12">
                                            <input type="number" step="0.1" min="0.1" name="course_vpoint"
                                                class="form-control" required value="{{ old('course_vpoint') }}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12 control-label text-left">Chiết khấu cổ đông 2<span
                                                class="required" aria-required="true">(*)</span>:</label>
                                        <div class="col-md-12">
                                            <input type="number" step="0.1" min="0.1" name="course_discount_2"
                                                class="form-control" required
                                                value="{{ old('course_discount_2') }}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12 control-label text-left">Chiết khấu cổ đông 1<span
                                                class="required" aria-required="true">(*)</span>:</label>
                                        <div class="col-md-12">
                                            <input type="number" step="0.1" min="0.1" name="course_discount_1"
                                                class="form-control" required
                                                value="{{ old('course_discount_1') }}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12 control-label text-left">Chiết khấu Platinum<span
                                                class="required" aria-required="true">(*)</span>:</label>
                                        <div class="col-md-12">
                                            <input type="number" step="0.1" min="0.1" name="course_discount_platinum"
                                                class="form-control" required
                                                value="{{ old('course_discount_platinum') }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-md-12 control-label text-left">Chiết khấu Diamond<span
                                                class="required" aria-required="true">(*)</span>:</label>
                                        <div class="col-md-12">
                                            <input type="number" step="0.1" min="0.1" name="course_discount_diamond"
                                                class="form-control" required
                                                value="{{ old('course_discount_diamond') }}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12 control-label text-left">Chiết khấu Gold<span
                                                class="required" aria-required="true">(*)</span>:</label>
                                        <div class="col-md-12">
                                            <input type="number" step="0.1" min="0.1" name="course_discount_gold"
                                                class="form-control" required
                                                value="{{ old('course_discount_gold') }}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12 control-label text-left">Chiết khấu Silver<span
                                                class="required" aria-required="true">(*)</span>:</label>
                                        <div class="col-md-12">
                                            <input type="number" step="0.1" min="0.1" name="course_discount_silver"
                                                class="form-control" required
                                                value="{{ old('course_discount_silver') }}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12 control-label text-left">Chiết khấu Member<span
                                                class="required" aria-required="true">(*)</span>:</label>
                                        <div class="col-md-12">
                                            <input type="number" step="0.1" min="0.1" name="course_discount_member"
                                                class="form-control" required
                                                value="{{ old('course_discount_member') }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 mb-3">
                            <div class="form-group">
                                <label class="col-md-12 control-label vertical text-left text-danger">Mô tả chi tiết:</label>
                                <div class="col-md-12">
                                    <textarea name="description" id="description" class="form-control" rows="3"
                                        placeholder="...">{{ old('description') }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <button type="submit" class="btn btn-info">Đăng khóa học</button>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="footer text-center">
        <spans style="font-size: 12px;">Copyright©2005-2021 . All rights reserved</spans>
    </div>
</section>

<script src={{ asset('/public/packages/ckeditor/ckeditor.js') }}></script>
<script src={{ asset('/public/packages/ckfinder/ckfinder.js') }}></script>

<script>
    $(document).ready(function() {
        $('select.selectpicker').select2({
            width: '100%',
            multiple: true,
            placeholder: "Sản phẩm đi kèm",
            allowClear: true,
        });

        CKEDITOR.replace('description', {
            toolbar :
            [
                { name: 'clipboard', items : [ 'Cut','Copy','Paste','PasteText','PasteFromWord','-','Undo','Redo' ] },
                { name: 'editing', items : [ 'Find','Replace','-','SelectAll','-','SpellChecker', 'Scayt' ] },
                { name: 'basicstyles', items : [ 'Bold','Italic','Underline','Strike','Subscript','Superscript','-','RemoveFormat' ] },
                { name: 'paragraph', items : [ 'NumberedList','BulletedList','-','Outdent','Indent','-','Blockquote','CreateDiv',
                '-','JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock','-','BidiLtr','BidiRtl' ] },
                { name: 'links', items : [ 'Link','Unlink','Anchor' ] },
                { name: 'insert', items : [ 'Image','Table','HorizontalRule','Smiley','SpecialChar','PageBreak','Iframe' ] },
                '/',
                { name: 'styles', items : [ 'Styles','Format','Font','FontSize' ] },
                { name: 'colors', items : [ 'TextColor','BGColor' ] },
                { name: 'tools', items : [ 'Maximize', 'ShowBlocks','-','About' ] }
            ]
        });

        $('#ckfinder-popup-1').click(function() {
            selectFileWithCKFinder('ckfinder-input-1');
        })
        function selectFileWithCKFinder(elementId) {
            CKFinder.popup({
                chooseFiles: true,
                width: 800,
                height: 600,
                onInit: function(finder) {
                    finder.on('files:choose', function(evt) {
                        var file = evt.data.files.first();
                        var output = document.getElementById(elementId);
                        output.value = file.getUrl();
                        $('.fileinput-new.thumbnail img').attr('src', file.getUrl())
                    });
                    finder.on('file:choose:resizedImage', function(evt) {
                        var output = document.getElementById(elementId);
                        output.value = evt.data.resizedUrl;
                        $('.fileinput-new img').attr('src', evt.data.resizedUrl)
                    });
                }
            });
        }
    });
</script>

<script src={{ asset('/resources/js/adminCourse.js') }}></script>

<x-footer_admin />
