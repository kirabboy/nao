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
            <div class="portlet-title d-flex justify-content-between align-items-center">
                <div class="title-name d-flex align-items-center">
                    <div class="caption">
                        <i class="fa fa-product-hunt icon-drec" aria-hidden="true"></i>
                        <span class="caption-subject text-uppercase">
                            SẢN PHẨM </span>
                        <span class="caption-helper"></span>
                    </div>
                    <div class="ps-5">
                        <a href="{{ route('san-pham.create') }}" class="btn btn-add"><i class="fa fa-plus"></i>
                            Thêm mới </a>
                        {{-- <a href="#group_category_create" data-toggle="modal" class="btn btn-add"><i
                                class="fa fa-file-excel-o" aria-hidden="true"></i>
                            Import </a>
                        <a href="#group_category_create" data-toggle="modal" class="btn btn-add"><i
                                class="fa fa-file-excel-o" aria-hidden="true"></i>
                            Export </a> --}}
                    </div>
                </div>
            </div>
            <hr>
            <div class="portlet-body">
                {{-- <div class="row">
                    <div class="col-lg-10">
                        <div class="col-md-12 flex-row gap-2">
                            <select class="form-select fs-14" aria-label="Default select example">
                                <option selected>10</option>
                                <option value="1">25</option>
                                <option value="2">50</option>
                                <option value="3">100</option>
                            </select>
                            <div class="dropdown" style="border: 1px solid #c2cad8; border-radius: 5px;">
                                <button class="btn dropdown-toggle fs-14" type="button" id="dropdownMenuButton1"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    Hiển thị tất cả hàng ngang
                                </button>
                                <ul class="dropdown-menu dropdown-menu1 fs-14" aria-labelledby="dropdownMenuButton1">
                                    <li class="ps-2 pe-2"><input class="p-1"
                                            style="width: 100%; border-radius: 5px;border: 1px solid #c2cad8;"
                                            type="text"></li>
                                    <li><a class="dropdown-item" href="#">Hiển thị tất cả hàng ngang</a></li>
                                    <li><a class="dropdown-item" href="#">Ngành hàng gia dụng</a></li>
                                    <li><a class="dropdown-item" href="#">POSM</a></li>
                                    <li><a class="dropdown-item" href="#">Khác</a></li>
                                    <li><a class="dropdown-item" href="#">Mỹ Phẩm</a></li>
                                    <li><a class="dropdown-item" href="#">Vũ Đức</a></li>
                                    <li><a class="dropdown-item" href="#">Sebia</a></li>
                                </ul>
                            </div>
                            <div class="dropdown" style="border: 1px solid #c2cad8; border-radius: 5px;">
                                <button class="btn dropdown-toggle fs-14" type="button" id="dropdownMenuButton1"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    Hiển thị tất cả nhóm sản phẩm
                                </button>
                                <ul class="dropdown-menu dropdown-menu1 fs-14" aria-labelledby="dropdownMenuButton1">
                                    <li class="ps-2 pe-2"><input class="p-1"
                                            style="width: 100%; border-radius: 5px;border: 1px solid #c2cad8;"
                                            type="text"></li>
                                    <li><a class="dropdown-item" href="#">Hiển thị tất cả hàng ngang</a></li>
                                    <li><a class="dropdown-item" href="#">Ngành hàng gia dụng</a></li>
                                    <li><a class="dropdown-item" href="#">POSM</a></li>
                                    <li><a class="dropdown-item" href="#">Khác</a></li>
                                    <li><a class="dropdown-item" href="#">Mỹ Phẩm</a></li>
                                    <li><a class="dropdown-item" href="#">Vũ Đức</a></li>
                                    <li><a class="dropdown-item" href="#">Sebia</a></li>
                                </ul>
                            </div>
                            <div class="dropdown" style="border: 1px solid #c2cad8; border-radius: 5px;">
                                <button class="btn dropdown-toggle fs-14" type="button" id="dropdownMenuButton1"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    Hiển thị tất cả thương hiệu
                                </button>
                                <ul class="dropdown-menu dropdown-menu1 fs-14" aria-labelledby="dropdownMenuButton1">
                                    <li class="ps-2 pe-2"><input class="p-1"
                                            style="width: 100%; border-radius: 5px;border: 1px solid #c2cad8;"
                                            type="text"></li>
                                    <li><a class="dropdown-item" href="#">Hiển thị tất cả hàng ngang</a></li>
                                    <li><a class="dropdown-item" href="#">Ngành hàng gia dụng</a></li>
                                    <li><a class="dropdown-item" href="#">POSM</a></li>
                                    <li><a class="dropdown-item" href="#">Khác</a></li>
                                    <li><a class="dropdown-item" href="#">Mỹ Phẩm</a></li>
                                    <li><a class="dropdown-item" href="#">Vũ Đức</a></li>
                                    <li><a class="dropdown-item" href="#">Sebia</a></li>
                                </ul>
                            </div>
                            <div class="dropdown" style="border: 1px solid #c2cad8; border-radius: 5px;">
                                <button class="btn dropdown-toggle fs-14" type="button" id="dropdownMenuButton1"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    Hiển thị tất cả thuộc tính
                                </button>
                                <ul class="dropdown-menu dropdown-menu1 fs-14" aria-labelledby="dropdownMenuButton1">
                                    <li class="ps-2 pe-2"><input class="p-1"
                                            style="width: 100%; border-radius: 5px;border: 1px solid #c2cad8;"
                                            type="text"></li>
                                    <li><a class="dropdown-item" href="#">Hiển thị tất cả hàng ngang</a></li>
                                    <li><a class="dropdown-item" href="#">Ngành hàng gia dụng</a></li>
                                    <li><a class="dropdown-item" href="#">POSM</a></li>
                                    <li><a class="dropdown-item" href="#">Khác</a></li>
                                    <li><a class="dropdown-item" href="#">Mỹ Phẩm</a></li>
                                    <li><a class="dropdown-item" href="#">Vũ Đức</a></li>
                                    <li><a class="dropdown-item" href="#">Sebia</a></li>
                                </ul>
                            </div>
                            <button class="btn fs-14 text-white" style="background:#36c6d3;">Hoạt động (66)</button>
                            <button class="btn fs-14 text-white" style="background:#f1c40f;">Mới (0)</button>
                            <button class="btn fs-14 text-white" style="background:#bac3d0;">Ngừng (0)</button>
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="col-md-12">
                            <div class="input-group" style="width: 100%;">
                                <input type="text" class="form-control" placeholder="Tìm kiếm"
                                    aria-label="Recipient's username" aria-describedby="basic-addon2">
                                <span class="input-group-text" id="basic-addon2"><i class="fa fa-search"
                                        aria-hidden="true"></i></span>
                            </div>
                        </div>
                    </div>
                </div> --}}


                <div class="pt-3" style="overflow-x: auto;">
                    <table id="table-product" class="table table-hover table-main">
                        <thead class="thead1" style="vertical-align: middle;">
                            <tr>
                                <th class="title-text" style="width: 2%">
                                    STT </th>
                                <th class="title-text">
                                    Hình ảnh
                                </th>
                                <th class="title-text" style="width: 12%">
                                    Model/Mã SP
                                </th>
                                <th class="title-text">
                                    Tên sản phẩm
                                </th>
                                <th class="title-text">
                                    Thương hiệu
                                </th>
                                <th class="title-text">
                                    Nhóm sản phẩm con
                                </th>
                                <th class="title-text">
                                    Nhóm sản phẩm
                                </th>
                                <th class="title-text">
                                    Ngành hàng
                                </th>
                                <th class="title-text">
                                    Đơn vị tính
                                </th>
                                <th class="title-text">
                                    Khối lượng(g)
                                </th>
                                <th class="title-text">
                                    Chiều dài(cm)
                                </th>
                                <th class="title-text">
                                    Chiều rộng(cm)
                                </th>
                                <th class="title-text">
                                    Chiều cao(cm)
                                </th>
                                <th class="title-text">
                                    Đơn giá bán lẻ
                                </th>
                            </tr>
                        </thead>
                        <tbody style="color: #748092; font-size: 14px; vertical-align: middle;">
                            @foreach ($products as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td><img src="{{ $item->feature_img }}" width="70" height="60" alt=""></td>
                                    <td>{{ $item->sku }}</td>
                                    <td><a style="text-decoration: none;"
                                            href="{{ route('san-pham.edit', $item->id) }}">{{ $item->name }}</a></td>
                                    <td>{{ $item->productBrand->name }}</td>
                                    <td>{{ $item->productCategory->typeof_category == 2 ? $item->productCategory->name : '' }}
                                    </td>
                                    <td>
                                        <!-- Nhom san pham -->
                                        @if ($item->productCategory->typeof_category == 1)
                                            {{ $item->productCategory->name }}
                                        @elseif($item->productCategory->parentCategories != null && $item->productCategory->typeof_category == 2)
                                            {{ $item->productCategory->parentCategories->name }}
                                        @endif
                                    </td>
                                    <td>
                                        <!-- Nganh hang -->
                                        @if ($item->productCategory->parentCategories->typeof_category == 0)
                                            {{ $item->productCategory->parentCategories->name }}
                                        @elseif($item->productCategory->parentCategories->megaParentCategories != null)
                                            {{ $item->productCategory->parentCategories->megaParentCategories->name }}
                                        @endif
                                    </td>
                                    <td>{{ $item->productCalculationUnit->name }}</td>
                                    <td>{{ $item->weight }} gam</td>
                                    <td>{{ $item->length }}cm</td>
                                    <td>{{ $item->width }}cm</td>
                                    <td>{{ $item->height }}cm</td>
                                    <td>{{ moneyFormat($item->productPrice->regular_price) }}đ</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="footer text-center">
        <spans style="font-size: 12px;">Copyright©2005-2021 . All rights reserved</spans>
    </div>
</section>

<script>
    $('#table-product').DataTable({
        ordering: false,
        columnDefs: [
            { "type": "string", "targets": [1, 3] },
            { "type": "html", "targets": [4, 5, 6, 7] },
            { "orderable": false, "targets": 1 },
        ],
		searchBuilder: {
			conditions: {
				num: {
					'!between': null,
					'between': null,
					'!=': null,
					'<': null,
					'>': null,
					'<=': null,
					'>=': null,
                    'null': null,
                    '!null': null,
				},
				string: {
					'!=': null,
					'=': null,
                    'null': null,
                    '!null': null,
				},
                html: {
                    '!=': null,
                    'null': null,
                    '!null': null,
                    'contains': null,
                },
			}
		},
		language: {
            searchBuilder: {
                add: 'Tạo bộ lọc',
                condition: 'Điều kiện',
                clearAll: 'Reset',
                deleteTitle: 'Delete',
                data: 'Cột',
                leftTitle: 'Left',
                logicAnd: 'VÀ',
                logicOr: 'HOẶC',
                rightTitle: 'Right',
                title: {
                    0: '',
                    _: 'Kết quả lọc (%d)'
                },
                value: 'Giá trị',
                valueJoiner: 'et',
                conditions :{
                        number: {
                            equals: '=',
                        },
                        string: {
                            contains: '=',
                            startsWith: 'Bắt đầu bằng ký tự',
                            endsWith: 'Kết thúc bằng ký tự',
                        },
                        html: {
                            equals: '=',
                            startsWith: '',
                            endsWith: '',
                        },
                    },
            },
			search: "Tìm kiếm:",
			lengthMenu: "Hiển thị _MENU_ kết quả",
			info: "Hiển thị _START_ đến _END_ trong _TOTAL_ kết quả",
			infoEmpty: "Hiển thị 0 trên 0 trong 0 kết quả",
			zeroRecords: "Không tìm thấy",
			emptyTable: "Hiện tại chưa có dữ liệu",
			paginate: {
				first: ">>",
				last: "<<",
				next: ">",
				previous: "<"
			},
        },
        dom: '<Q><"wrapper d-flex justify-content-between mb-3"lf><"custom-export-button"B>tip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    });
</script>
@endsection
