@extends('admin.layouts.master')
@section('content')

@push('css')
    <link rel="stylesheet" href="{{ asset('/public/admin/css/doitac.css') }}">
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
            <div class="portlet-title d-flex justify-content-between align-items-center">
                <div class="title-name d-flex align-items-center">
                    <div class="caption">
                        <i class="fa fa-anchor icon-drec" aria-hidden="true"></i>
                        <span class="caption-subject text-uppercase">
                            DANH SÁCH CÁC BÀI VIẾT </span>
                        <span class="caption-helper"></span>
                    </div>
                    <div class="ps-5">
                        <a href="{{route('baiviet.create')}}" class="btn btn-add"><i
                                class="fa fa-plus"></i>
                            Thêm mới </a>
                    </div>
                </div>

            </div>
            <hr>
            <div class="portlet-body">
                <div class="pt-3" style="overflow-x: auto;">
                    <table id="table-calculation-unit" class="table table-hover table-main">
                        <thead class="thead1" style="vertical-align: middle;">
                            <tr>
                                <th class="title-text" style="width: 50px">
                                    STT </th>
                                <th class="title-text title1">
                                    Ảnh đại diện</th>
                                <th class="title-text title2">
                                    Tiêu đề
                                </th>
                                <th class="title-text title2">
                                    Chuyên mục
                                </th>
                                <th class="title-text title4">
                                    Trạng thái</th>
                            </tr>
                        </thead>
                        <tbody style="color: #748092; font-size: 14px; vertical-align: middle;">
                            @foreach ($blogs as $item)
                                <tr>
                                    <td>{{$item->id}}</td>
                                    <td><img src="{{$item->feature_img}}" alt=""></td>
                                    <td>
                                        <a class="text-decoration-none" href="{{route('baiviet.edit', $item->id)}}">
                                            {{$item->name}}
                                        </a>
                                    </td>
                                    <td>{{$item->blogCategory->name}}</td>
                                    @if ($item->status == 1)
                                        <td>
                                            <span style=" max-width: 82px;min-width: 82px;" type="text"
                                                    class="form-control form-control-sm font-size-s text-white active text-center d-inline">Hoạt động</span>
                                            <button class="btn bg-status-drop border-0 text-white py-0 px-2" type="button"
                                                data-bs-toggle="dropdown" aria-expanded="false"><i class="fa fa-angle-down"
                                                    aria-hidden="true"></i></button>
                                            <ul class="dropdown-menu dropdown-menu-end">
                                                <li>
                                                    <form
                                                        action="{{ route('baiviet.updateStatus', $item->id) }}"
                                                        method="post">
                                                        @csrf
                                                        @method('put')
                                                        <input type="hidden" name="unitStatus" value="0">
                                                        <button type="submit"
                                                            class="dropdown-item">Ngừng</button>
                                                    </form>
                                                </li>
                                                <li>
                                                    <form
                                                        action="{{ route('baiviet.delete', $item->id) }}"
                                                        method="post">
                                                        @csrf
                                                        @method('delete')
                                                        <button type="submit" class="dropdown-item"
                                                            onclick="confirm('Bạn có chắc muốn xóa');">Xoá</button>
                                                    </form>
                                                </li>
                                            </ul>
                                        </td>
                                    @else
                                        <td>
                                            <span style=" max-width: 82px;min-width: 82px;" type="text"
                                            class="form-control form-control-sm font-size-s text-white stop text-center d-inline">Ngừng</span>
                                            <button class="btn bg-status-drop border-0 text-white py-0 px-2" type="button"
                                                data-bs-toggle="dropdown" aria-expanded="false"><i class="fa fa-angle-down"
                                                    aria-hidden="true"></i></button>
                                            <ul class="dropdown-menu dropdown-menu-end">
                                                <li>
                                                    <form
                                                        action="{{ route('baiviet.updateStatus', $item->id) }}"
                                                        method="post">
                                                        @csrf
                                                        @method('put')
                                                        <input type="hidden" name="unitStatus" value="1">
                                                        <button type="submit"
                                                            class="dropdown-item">Hoạt động</button>
                                                    </form>
                                                </li>
                                                <li>
                                                    <form
                                                        action="{{ route('baiviet.delete', $item->id) }}"
                                                        method="post">
                                                        @csrf
                                                        @method('delete')
                                                        <button type="submit" class="dropdown-item"
                                                            onclick="confirm('Bạn có chắc muốn xóa');">Xoá</button>
                                                    </form>
                                                </li>
                                            </ul>
                                        </td>
                                    @endif
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
    <div class="footer text-center">
        <spans style="font-size: 12px; color: #333;">Copyright©2005-2021 . All rights reserved</spans>
    </div>
</section>

@push('js')
    <script>
        $(document).ready(function() {
            var table = $('#table-calculation-unit').DataTable({
                ordering: false,
                columnDefs: [
                    { "type": "html", "targets": [3] },
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
                dom: '<Q><"wrapper d-flex justify-content-between mb-3"lf>tip',
            });
        });
    </script>
@endpush

@endsection
