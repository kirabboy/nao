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
                            Thông tin bài viết</span>
                    </div>
                </div>
            </div>
            <hr>
            <div class="portlet-body">
                <form action="{{ route('baiviet.update', $blog->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                <div class="fileinput-new thumbnail size-img-profile">
                                    <img src="{{ old('feature_img', $blog->feature_img)}}">
                                </div>
                                <div class="form-group my-2">
                                    <input id="ckfinder-input-1" type="hidden" name="feature_img" class="form-control" value="{{ old('feature_img', $blog->feature_img)}}">
                                    <a style="cursor: pointer;" id="ckfinder-popup-1" class="btn btn-success">Chọn ảnh đại diện</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-9">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="col-md-12 control-label text-left">Trạng thái bài viết<span
                                                class="required" aria-required="true">(*)</span>:</label>
                                        <div class="col-md-12">
                                            <div class="form-group d-flex">
                                                <div class="input-group-btn" id="blog-status">
                                                    <select name="blog_status" class="selectpicker form-control">
                                                        <option value="0" 
                                                        {{$blog->status == 0 ? 'selected' : ''}} 
                                                        {{ old('blog_status') == 0 ? 'selected' : ''}}
                                                        >Ngưng hoạt động</option>
                                                        <option value="1" 
                                                        {{$blog->status == 1 ? 'selected' : ''}}
                                                        {{ old('blog_status') == 1 ? 'selected' : ''}}
                                                            >Hoạt động</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12 control-label text-left">Tiêu đề bài viết<span
                                                class="required" aria-required="true">(*)</span>:</label>
                                        <div class="col-md-12">
                                            <input type="text" name="blog_title" class="form-control"
                                                required value="{{ old('blog_title' , $blog->name) }}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12 control-label text-left">Chuyên mục bài viết<span
                                                class="required" aria-required="true">(*)</span>:</label>
                                        <div class="col-md-12">
                                            <select class="selectpicker form-control" name="blog_category"
                                                required>
                                                <option></option>
                                                @foreach ($categories as $item)
                                                    <option value="{{$item->id}}"
                                                        {{$blog->id_ofcategory == $item->id ? 'selected' : ''}}
                                                        {{ old('blog_category') == $item->id ? 'selected' : ''}}
                                                        >{{$item->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 mb-3">
                            <div class="form-group">
                                <label class="col-md-12 control-label vertical text-left text-danger">Mô tả chi tiết:</label>
                                <div class="col-md-12">
                                    <textarea name="description" id="description" class="form-control" rows="5">
                                        {{ old('description', $blog->content) }}
                                    </textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <button type="submit" class="btn btn-info">Cập nhật bài viết</button>
                            <a href="{{route('baiviet.delete', $blog->id)}}" class="btn btn-danger">Xóa bài viết</a>
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
            $('select.selectpicker').select2({
                width: '100%',
                placeholder: 'Chọn chuyên mục bài viết',
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
@endpush

@endsection