@extends('admin.layouts.master')
@section('content')

@push('css')
    <link rel="stylesheet" href="{{ asset('/public/admin/css/quanlysanpham.css') }}">
@endpush

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
                            Thông tin sản phẩm</span>
                    </div>
                </div>
            </div>
            <hr>
            <div class="portlet-body">
                <form action="{{ route('san-pham.store') }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                <div class="fileinput-new thumbnail size-img-profile">
                                    <img 
                                    @if (old('feature_img'))
                                    src="{{old('feature_img')}}"
                                    @else
                                    src="http://api.salefie.vn/images/new_product_default.jpg"
                                    @endif
                                    >
                                </div>
                                <div class="form-group my-2">
                                    <input id="ckfinder-input-1" type="hidden" name="feature_img" class="form-control" value="{{old('feature_img')}}">
                                    <a style="cursor: pointer;" id="ckfinder-popup-1" class="btn btn-success">Chọn ảnh đại diện</a>
                                </div>
                            </div>

                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                <div class="form-group my-2">
                                    <input id="ckfinder-input-2" type="hidden" name="gallery_img" data-type="multiple" class="form-control" value="{{old('gallery_img').' '}}">
                                    <a style="cursor: pointer;" id="ckfinder-popup-2" class="btn btn-success">Chọn thư viện ảnh</a>
                                </div>
                                <div class="fileinput-gallery thumbnail">
                                    <div class="row">
                                        @if (old('gallery_img'))
                                            @php
                                            $galleries = explode(',', old('gallery_img'));
                                            @endphp
                                            @foreach($galleries as $img)
                                                @if ($img != null || $img != '')
                                                <div class="col-md-3">
                                                    <span style="cursor: pointer;" data-id='' data-url="{{$img}}" class="delete_gallery">
                                                        <i class="fas fa-times"></i>
                                                    </span>
                                                    <img src="{{$img}}">
                                                </div>
                                                @endif
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-9">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-md-12 control-label text-left">Mã sản phẩm/Model<span
                                                class="required" aria-required="true">(*)</span>:</label>
                                        <div class="col-md-12">
                                            <div class="form-group d-flex">
                                                <input type="text" name="product_sku" class="form-control w-50"
                                                    required value="{{ old('product_sku') }}">
                                                <div class="input-group-btn w-50" id="product-status">
                                                    <select name="product_status" class="selectpicker form-control">
                                                        <option value="0">Ngưng hoạt động</option>
                                                        <option value="1" selected>Hoạt động</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12 control-label text-left">Tên sản phẩm<span
                                                class="required" aria-required="true">(*)</span>:</label>
                                        <div class="col-md-12">
                                            <input type="text" name="product_name" class="form-control" placeholder=""
                                                required value="{{ old('product_name') }}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12 control-label text-left">Nhóm ngành hàng<span
                                                class="required" aria-required="true">(*)</span>:</label>
                                        <div class="col-md-12">
                                            <select class="form-control selectCategory nhomhang" name="category_parent"
                                                required data-placeholder="Nhóm ngành hàng" data-type="megaParent">
                                                <option></option>
                                                @foreach ($nganhHang as $item)
                                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12 control-label text-left">Nhóm sản phẩm:</label>
                                        <div class="col-md-12">
                                            <select class="selectpicker form-control selectCategory nhomsp" name="category_child"
                                                data-placeholder="Nhóm sản phẩm" data-type="parent">

                                            </select>
                                        </div>
                                    </div>
                                    <!-- <div class="form-group">
                                        <label class="col-md-12 control-label text-left">Nhóm sản phẩm con:</label>
                                        <div class="col-md-12">
                                            <select class="selectpicker form-control nhomspcon" name="child_category"
                                                data-placeholder="Nhóm sản phẩm con">

                                            </select>
                                        </div>
                                    </div> -->
                                    
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-md-12 control-label text-left">Thương hiệu<span
                                                class="required" aria-required="true">(*)</span>:</label>
                                        <div class="col-md-12">
                                            <select name="product_brand" class="selectpicker form-control" required
                                                title="Thương hiệu" data-placeholder="Chọn thương hiệu">
                                                <option></option>
                                                @foreach ($brands as $item)
                                                    <option value="{{ $item->id }}"
                                                        @if (old('product_brand') == $item->id)
                                                            selected
                                                        @endif
                                                        >{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12 control-label text-left">Đơn vị tính<span
                                                class="required" aria-required="true">(*)</span>:</label>
                                        <div class="col-md-12">
                                            <select class="selectpicker form-control" name="product_calculation_unit"
                                                required data-placeholder="Chọn đơn vị tính">
                                                <option></option>
                                                @foreach ($calculationUnits as $item)
                                                    <option value="{{ $item->id }}"
                                                        @if (old('product_calculation_unit') == $item->id)
                                                            selected
                                                        @endif
                                                        >{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    {{-- <div class="form-group">
                                        <label class="col-md-12 control-label text-left">Tồn kho<span
                                                class="required" aria-required="true">(*)</span>:</label>
                                        <div class="col-md-12">
                                            <input type="number" step="1" name="product_quantity" class="form-control"
                                                min="1" value="{{ old('product_quantity') }}">
                                        </div>
                                    </div> --}}
                                    <div class="form-group">
                                        <label class="col-md-12 control-label text-left">Khối lượng (g) <span
                                                class="required" aria-required="true">(*)</span>:</label>
                                        <div class="col-md-12">
                                            <input type="number" step="0.1" max="1000000" min="0.1" name="product_weight" class="form-control"
                                                placeholder="" value="{{ old('product_weight', 1.1) }}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-4">
                                                <label class="col-md-12 control-label text-left">Chiều dài (cm)<span
                                                        class="required" aria-required="true">(*)</span>:</label>
                                                <div class="col-md-12">
                                                    <input type="number" step="0.1" max="10000" min="1" name="product_length"
                                                        class="form-control" placeholder=""
                                                        value="{{ old('product_length', 1.1) }}">
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <label class="col-md-12 control-label text-left">Chiều cao (cm)<span
                                                        class="required" aria-required="true">(*)</span>:</label>
                                                <div class="col-md-12">
                                                    <input type="number" step="0.1" max="10000" min="1" name="product_height"
                                                        class="form-control" placeholder=""
                                                        value="{{ old('product_height', 1.1) }}">
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <label class="col-md-12 control-label text-left">Chiều rộng (cm)<span
                                                        class="required" aria-required="true">(*)</span>:</label>
                                                <div class="col-md-12">
                                                    <input type="number" step="0.1" max="10000" min="1" name="product_width"
                                                        class="form-control" placeholder=""
                                                        value="{{ old('product_width', 1.1) }}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="col-md-12 control-label text-left">Đơn giá bán lẻ<span
                                                class="required" aria-required="true">(*)</span>:</label>
                                        <div class="col-md-12">
                                            <input type="number" step="1" min="1" name="product_regular_price"
                                                class="form-control" required
                                                value="{{ old('product_regular_price') }}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12 control-label text-left">Chiết khấu CTV<span
                                                class="required" aria-required="true">(*)</span>:</label>
                                        <div class="col-md-12">
                                            <input type="number" step="0.1" min="0.1" name="price_ctv"
                                                class="form-control" required
                                                value="{{ old('price_ctv') }}">
                                        </div>
                                    </div>
                                    {{--<div class="form-group">
                                        <label class="col-md-12 control-label text-left">Chiết khấu Đại lý mới<span
                                                class="required" aria-required="true">(*)</span>:</label>
                                        <div class="col-md-12">
                                            <input type="number" step="0.1" min="0.1" name="price_new_daily"
                                                class="form-control" required
                                                value="{{ old('price_new_daily') }}">
                                        </div> --}}
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12 control-label text-left">Chiết khấu Đại lý<span
                                                class="required" aria-required="true">(*)</span>:</label>
                                        <div class="col-md-12">
                                            <input type="number" step="0.1" min="0.1" name="price_daily_chuan"
                                                class="form-control" required
                                                value="{{ old('price_daily_chuan') }}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12 control-label text-left">Chiết khấu Khách hàng VIP<span
                                                class="required" aria-required="true">(*)</span>:</label>
                                        <div class="col-md-12">
                                            <input type="number" step="0.1" min="0.1" name="price_vip"
                                                class="form-control" required
                                                value="{{ old('price_vip') }}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12 control-label text-left">NAO Point<span
                                                class="required" aria-required="true">(*)</span>:</label>
                                        <div class="col-md-12">
                                            <input type="number" step="0.1" min="0.1" name="nao_point"
                                                class="form-control" required
                                                value="{{ old('nao_point') }}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12 control-label text-left">Link driver:</label>
                                        <div class="col-md-12">
                                            <input type="text" name="link_driver"
                                                class="form-control" 
                                                value="{{ old('link_driver') }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 mb-3">
                            <div class="form-group mb-2">
                                <label class="col-md-12 control-label vertical text-left">Mô tả ngắn:</label>
                                <div class="col-md-12">
                                    <textarea name="short_description" id="short_description" class="form-control" rows="2"
                                        placeholder="...">{{ old('short_description') }}</textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12 control-label vertical text-left text-danger">Mô tả chi tiết:</label>
                                <div class="col-md-12">
                                    <textarea name="description" id="description" class="form-control" rows="3"
                                        placeholder="...">{{ old('description') }}</textarea>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <button type="submit" class="btn btn-info">Đăng sản phẩm</button>
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

@push('js')
    <script src={{ asset('/public/packages/ckeditor/ckeditor.js') }}></script>
    <script src={{ asset('/public/packages/ckfinder/ckfinder.js') }}></script>

    <script>
        $(document).ready(function() {
            $('select.selectpicker').select2();

            $('select.nhomhang').select2({
                placeholder: 'Chọn nhóm ngành hàng',
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

            CKEDITOR.replace('short_description', {
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

            $('#ckfinder-popup-2').click(function() {
                selectFileWithCKFinder('ckfinder-input-2');
            })

            function selectFileWithCKFinder(elementId) {
                var type = $(`#${elementId}`).data('type')
                CKFinder.popup({
                    chooseFiles: true,
                    width: 800,
                    height: 600,
                    onInit: function(finder) {
                        finder.on('files:choose', function(evt) {
                            if(type == "multiple") {
                                var files = evt.data.files;
                                var chosenFiles = $(`#${elementId}`).val();
                                files.forEach( function(file, idx, array) {
                                    chosenFiles += file.getUrl() + ', ';
                                    $('.fileinput-gallery .row').append(`<div class="col-md-3">
                                        <span style="cursor: pointer;" data-id='' data-url="${file.getUrl()}" class="delete_gallery">
                                            <i class="fas fa-times"></i>
                                            </span>
                                                    <img src="${file.getUrl()}">
                                                </div>`)
                                });
                                var output = document.getElementById(elementId);
                                output.value = chosenFiles;
                            } else {
                                var file = evt.data.files.first();
                                var output = document.getElementById(elementId);
                                output.value = file.getUrl();
                                $('.fileinput-new.thumbnail img').attr('src', file.getUrl())
                            }
                        });
                        // finder.on('file:choose:resizedImage', function(evt) {
                        //     var output = document.getElementById(elementId);
                        //     output.value = evt.data.resizedUrl;
                        //     $('.fileinput-new img').attr('src', evt.data.resizedUrl)
                        // });
                    }
                });
            }

            $(document).on('click', '.delete_gallery', function(event) {
                var t = $(this);
                var in_value = $("#ckfinder-input-2");
                var url = $(this).data('url');
                if(t.parent().is(':last-child') && t.parent().is(':first-child')){
                    var newValue = '';
                }
                else if(t.parent().is(':last-child') && !t.parent().is(':first-child')){
                    var newValue = in_value.val().replace(', '+url, '');
                } 
                else {
                    var newValue = in_value.val().replace(url+', ', '');
                }
                in_value.val(newValue);
                t.parent().remove();
            });

            $('select.selectCategory').change(function(e) {
                e.preventDefault();
                let html = '';
                var type = $(this).data('type');
                $.ajax({
                    type: "GET",
                    url: "{{ route('san-pham.getCategory') }}",
                    data: {
                        id: $(this).val()
                    },
                    success: function(response) {
                        if (response.data.length > 0) {
                            if ( type == 'megaParent') {
                                console.log(response.data);
                                html = "<option value='-1' selected>Chọn nhóm sản phẩm</option>";
                                $.each(response.data, function(idx, val) {
                                    html += "<option value=" + val.id + ">" + val.name +
                                        "</option>"
                                });
                                $('select.nhomsp').html('').append(html);
                                $('select.nhomspcon').html('');
                            } else {
                                html = "<option value='-1' selected>Chọn nhóm sản phẩm con</option>";
                                $.each(response.data, function(idx, val) {
                                    html += "<option value=" + val.id + ">" + val.name +
                                        "</option>"
                                });
                                $('select.nhomspcon').html('').append(html);
                            }
                        } else {
                            if ( type == 'megaParent') {
                                $('select.nhomsp').html('')
                                $('select.nhomspcon').html('');
                            }
                        }
                    }
                });
            });

        });
    </script>

    <script type="text/javascript" src="{{ asset('/resources/js/adminProductCreateUpdate.js') }}"></script>
@endpush

@endsection
