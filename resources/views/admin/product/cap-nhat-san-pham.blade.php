@extends('admin.layouts.master')
@section('content')
<link rel="stylesheet" href="{{ asset('/public/admin/css/quanlysanpham.css') }}">

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
            @if (session('success'))
                <div class="portlet-status">
                    <div class="caption bg-success p-3">
                        <span class="caption-subject bold uppercase text-light">{{session('success')}}</span>
                    </div>
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
                <form action="{{ route('san-pham.update', $product->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                <div class="fileinput-new thumbnail size-img-profile">
                                    <img src="{{$product->feature_img}}">
                                </div>
                                <div class="form-group my-2">
                                    <input id="ckfinder-input-1" type="text" name="feature_img" class="form-control" value="{{old('feature_img', $product->feature_img)}}" readonly required>
                                    <a style="cursor: pointer;" id="ckfinder-popup-1" class="btn btn-success">Chọn ảnh</a>
                                </div>
                            </div>

                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                <div class="form-group my-2">
                                    <input id="ckfinder-input-2" type="text" name="gallery_img"
                                    data-type="multiple" data-hasid="{{$product->id}}"
                                    readonly class="form-control"
                                    value="{{old('gallery_img', $product->gallery)}}">
                                    <a style="cursor: pointer;" id="ckfinder-popup-2" class="btn btn-success">Chọn nhiều ảnh</a>
                                </div>
                                <div class="fileinput-gallery thumbnail">
                                    <div class="row">
                                        @php
                                            $gallery = explode(", ",$product->gallery);
                                        @endphp
                                        @if ($product->gallery != null)
                                            @foreach ($gallery as $img)
                                                <div class="col-md-3">
                                                    <span style="cursor: pointer;" data-id='{{$product->id}}' data-url="{{$img}}" class="delete_gallery">
                                                        <i class="fas fa-times"></i>
                                                    </span>
                                                    <img src="{{$img}}">
                                                </div>
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
                                                    required value="{{old('product_sku', $product->sku)}}">
                                                <div class="input-group-btn w-50" id="product-status">
                                                    <select name="product_status" class="selectpicker form-control">
                                                        <option value="0" {{ $product->status == 0 ? 'selected' : ''}}>Ngưng hoạt động</option>
                                                        <option value="1" {{ $product->status == 1 ? 'selected' : ''}}>Hoạt động</option>
                                                        <option value="2" {{ $product->status == 2 ? 'selected' : ''}}>Mới</option>
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
                                                required value="{{ old('product_name', $product->name) }}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12 control-label text-left">Nhóm ngành hàng<span
                                                class="required" aria-required="true">(*)</span>:</label>
                                        <div class="col-md-12">
                                            <select class="selectpicker form-control selectCategory nhomhang" name="category_parent"
                                                required data-placeholder="Nhóm ngành hàng" data-type="megaParent">
                                                <option value="-1">Nhóm ngành hàng</option>
                                                @if ( $product->productCategory->typeof_category == 2 )
                                                    @foreach ($nganhHang as $item)
                                                        <option value="{{ $item->id }}" {{$item->id == $product->productCategory->parentCategories->megaParentCategories->id ? 'selected' : ''}}>{{ $item->name }}</option>
                                                    @endforeach
                                                @else
                                                    @foreach ($nganhHang as $item)
                                                        <option value="{{ $item->id }}" {{$item->id == $product->productCategory->parentCategories->id ? 'selected' : ''}}>{{ $item->name }}</option>
                                                    @endforeach
                                                @endif
                                                
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12 control-label text-left">Nhóm sản phẩm<span
                                                class="required" aria-required="true">(*)</span>:</label>
                                        <div class="col-md-12">
                                            <select class="selectpicker form-control selectCategory nhomsp" name="category_parent"
                                                required data-placeholder="Nhóm sản phẩm" data-type="parent">
                                                @if ( $product->productCategory->typeof_category == 2 )
                                                    @php
                                                        $cates = \App\Models\ProductCategory::where('category_parent', $product->productCategory->parentCategories->megaParentCategories->id)
                                                                                                ->where('typeof_category', 1)
                                                                                                ->get(); 
                                                    @endphp
                                                    @foreach ($cates as $item)
                                                        <option value="{{ $item->id }}" {{$item->id == $product->productCategory->parentCategories->id ? 'selected' : ''}}>{{ $item->name }}</option>
                                                    @endforeach
                                                @else
                                                    @php
                                                        $cates = \App\Models\ProductCategory::where('category_parent', $product->productCategory->parentCategories->id)
                                                                                                ->where('typeof_category', 1)
                                                                                                ->get(); 
                                                    @endphp
                                                    @foreach ($cates as $item)
                                                        <option value="{{ $item->id }}" {{ $item->id == $product->category_id ? 'selected' : ''}}>{{ $item->name }}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12 control-label text-left">Nhóm sản phẩm con:</label>
                                        <div class="col-md-12">
                                            <select class="selectpicker form-control nhomspcon" name="child_category"
                                                data-placeholder="Nhóm sản phẩm con">
                                                <option value="-1">Chọn nhóm sản phẩm con</option>
                                                @if ( $product->productCategory->typeof_category == 2 )
                                                    @php
                                                        $cates = \App\Models\ProductCategory::where('category_parent', $product->productCategory->parentCategories->id)
                                                                                                ->where('typeof_category', 2)
                                                                                                ->get(); 
                                                    @endphp
                                                    @foreach ($cates as $item)
                                                        <option value="{{ $item->id }}" {{$item->id == $product->productCategory->id ? 'selected' : ''}}>{{ $item->name }}</option>
                                                    @endforeach
                                                @else
                                                    @php
                                                        $cates = \App\Models\ProductCategory::where('typeof_category', 2)
                                                                                                ->get(); 
                                                    @endphp
                                                    @foreach ($cates as $item)
                                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-md-12 control-label text-left">Thương hiệu<span
                                                class="required" aria-required="true">(*)</span>:</label>
                                        <div class="col-md-12">
                                            <select name="product_brand" class="selectpicker form-control" required
                                                title="Thương hiệu" data-placeholder="Thương hiệu">
                                                <option value="-1">Chọn thương hiệu</option>
                                                @foreach ($brands as $item)
                                                    <option value="{{ $item->id }}" {{$item->id == $product->productBrand->id ? 'selected' : ''}}>{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12 control-label text-left">Đơn vị tính<span
                                                class="required" aria-required="true">(*)</span>:</label>
                                        <div class="col-md-12">
                                            <select class="selectpicker form-control" name="product_calculation_unit"
                                                required data-placeholder="Đơn vị tính">
                                                <option value="-1">Chọn đơn vị tính</option>
                                                @foreach ($calculationUnits as $item)
                                                    <option value="{{ $item->id }}" {{$item->id == $product->productCalculationUnit->id ? 'selected' : ''}}>{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    {{-- <div class="form-group">
                                        <label class="col-md-12 control-label text-left">Tồn kho<span
                                                class="required" aria-required="true">(*)</span>:</label>
                                        <div class="col-md-12">
                                            <input type="number" step="1" name="product_quantity" class="form-control"
                                                min="1" value="{{ old('product_quantity', $product->quantity) }}">
                                        </div>
                                    </div> --}}
                                    <div class="form-group">
                                        <label class="col-md-12 control-label text-left">Khối lượng (g)<span
                                                class="required" aria-required="true">(*)</span>:</label>
                                        <div class="col-md-12">
                                            <input type="number" step="0.1" max="1000000" min="1" name="product_weight" class="form-control"
                                                placeholder="" value="{{ old('product_weight', $product->weight) }}">
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
                                                        value="{{ old('product_length', $product->length) }}">
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <label class="col-md-12 control-label text-left">Chiều cao (cm)<span
                                                        class="required" aria-required="true">(*)</span>:</label>
                                                <div class="col-md-12">
                                                    <input type="number" step="0.1" max="10000" min="1" name="product_height"
                                                        class="form-control" placeholder=""
                                                        value="{{ old('product_height', $product->height) }}">
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <label class="col-md-12 control-label text-left">Chiều rộng (cm)<span
                                                        class="required" aria-required="true">(*)</span>:</label>
                                                <div class="col-md-12">
                                                    <input type="number" step="0.1" max="10000" min="1" name="product_width"
                                                        class="form-control" placeholder=""
                                                        value="{{ old('product_width', $product->width) }}">
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
                                                value="{{ old('product_regular_price', $product->productPrice->regular_price) }}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12 control-label text-left">Điểm Vpoint bán lẻ<span
                                                class="required" aria-required="true">(*)</span>:</label>
                                        <div class="col-md-12">
                                            <input type="number" step="0.1" min="0.1" name="product_vpoint"
                                                class="form-control" required value="{{ old('product_vpoint', $product->productPrice->vpoint_retail) }}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12 control-label text-left">Chiết khấu cổ đông 2<span
                                                class="required" aria-required="true">(*)</span>:</label>
                                        <div class="col-md-12">
                                            <input type="number" step="0.1" min="0.1" name="product_discount_2"
                                                class="form-control" required
                                                value="{{ old('product_discount_2', $product->productPrice->vpoint_2_star) }}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12 control-label text-left">Chiết khấu cổ đông 1<span
                                                class="required" aria-required="true">(*)</span>:</label>
                                        <div class="col-md-12">
                                            <input type="number" step="0.1" min="0.1" name="product_discount_1"
                                                class="form-control" required
                                                value="{{ old('product_discount_1', $product->productPrice->vpoint_1_star) }}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12 control-label text-left">Chiết khấu Platinum<span
                                                class="required" aria-required="true">(*)</span>:</label>
                                        <div class="col-md-12">
                                            <input type="number" step="0.1" min="0.1" name="product_discount_platinum"
                                                class="form-control" required
                                                value="{{ old('product_discount_platinum',$product->productPrice->vpoint_platinum) }}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12 control-label text-left">Chiết khấu Diamond<span
                                                class="required" aria-required="true">(*)</span>:</label>
                                        <div class="col-md-12">
                                            <input type="number" step="0.1" min="0.1" name="product_discount_diamond"
                                                class="form-control" required
                                                value="{{ old('product_discount_diamond', $product->productPrice->vpoint_diamond) }}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12 control-label text-left">Chiết khấu Gold<span
                                                class="required" aria-required="true">(*)</span>:</label>
                                        <div class="col-md-12">
                                            <input type="number" step="0.1" min="0.1" name="product_discount_gold"
                                                class="form-control" required
                                                value="{{ old('product_discount_gold', $product->productPrice->vpoint_gold) }}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12 control-label text-left">Chiết khấu Silver<span
                                                class="required" aria-required="true">(*)</span>:</label>
                                        <div class="col-md-12">
                                            <input type="number" step="0.1" min="0.1" name="product_discount_silver"
                                                class="form-control" required
                                                value="{{ old('product_discount_silver', $product->productPrice->vpoint_silver) }}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12 control-label text-left">Chiết khấu Member<span
                                                class="required" aria-required="true">(*)</span>:</label>
                                        <div class="col-md-12">
                                            <input type="number" step="0.1" min="0.1" name="product_discount_member"
                                                class="form-control" required
                                                value="{{ old('product_discount_member', $product->productPrice->vpoint_member) }}">
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
                                        placeholder="...">{{ old('short_description', $product->short_desc) }}</textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12 control-label vertical text-left text-danger">Mô tả chi tiết:</label>
                                <div class="col-md-12">
                                    <textarea name="description" id="description" class="form-control" rows="3"
                                        placeholder="...">{{ old('description', $product->long_desc) }}</textarea>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <button type="submit" class="btn btn-info">Cập nhật sản phẩm</button>
                        </div>

                    </div>
                </form>

                <div class="col-sm-12">
                    <form action="{{route('san-pham.delete', $product->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="confirm('Bạn có chắc muốn xóa sản phẩm?')">Xóa sản phẩm</button>
                    </form>
                </div>

            </div>
        </div>
    </div>
    <div class="footer text-center">
        <spans style="font-size: 12px;">Copyright©2005-2021 . All rights reserved</spans>
    </div>
</section>

<script src={{ url('/public/packages/ckeditor/ckeditor.js') }}></script>
<script src={{ url('/public/packages/ckfinder/ckfinder.js') }}></script>

<script>
    $(document).ready(function() {
        $('select.selectpicker').select2();

        setInterval(() => {
            $('.portlet-status').remove();
        }, 1500);

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
            var hasid = $(`#${elementId}`).data('hasid')
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
                                if(hasid != ''){
                                    $('.fileinput-gallery .row').append(`<div class="col-md-3">
                                    <span style="cursor: pointer;" data-id='${hasid}' data-url="${file.getUrl()}" class="delete_gallery">
                                        <i class="fas fa-times"></i>
                                        </span>
                                                <img src="${file.getUrl()}">
                                            </div>`)
                                } else {
                                    $('.fileinput-gallery .row').append(`<div class="col-md-3">
                                        <span style="cursor: pointer;" data-id='' data-url="${file.getUrl()}" class="delete_gallery">
                                            <i class="fas fa-times"></i>
                                            </span>
                                                    <img src="${file.getUrl()}">
                                                </div>`)
                                }
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

@endsection