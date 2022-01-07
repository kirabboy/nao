@extends('admin.layouts.master')
@section('content')
	<link rel="stylesheet" href="{{asset('/public/admin/css/khuyenmai.css')}}">
	
  	<section class="home-section">
		<div class="header bg-white shadow-sm header_mobile">
			<div class="text">Dashboard</div>
			<div class="icon_menu-mobile">
				<i class="fa fa-bars" data-bs-toggle="collapse" href="#menu-main" role="button" aria-expanded="false" aria-controls="menu-main"></i>
			</div>
		</div>
		  <ul class="sub-menu collapse sidebar-mobile list-group list-group-flush" id="menu-main">
			  <li class="list-group-item p-0 list-group-item-action">
				  <a href="#" class="list-group-item-link p-3"><i class="fa fa-bar-chart-o"></i> Dashboard</a>
			  </li>
			  <li class="list-group-item p-0 list-group-item-action">
				  <span class="list-group-item-link p-3" data-bs-toggle="collapse" href="#menu-mobile-doitac" role="button" aria-expanded="false" aria-controls="menu-mobile-doitac"><i class="fa fa-bar-chart-o"></i> Quản lý đối tác <i class="fa fa-angle-down fs-4 float-end"></i></span>
				  <ul class="p-0 menu-child collapse" id="menu-mobile-doitac">
					  <li class="list-group-item p-0 list-group-item-action">
						  <a href="doinhom.html" class="list-group-item-link list-item-custom px-5"><i class="fa fa-bar-chart-o"></i> Đội nhóm</a>
					  </li>
					  <li class="list-group-item p-0 list-group-item-action">
						  <a href="canhan.html" class="list-group-item-link list-item-custom px-5"><i class="fa fa-bar-chart-o"></i> Cá nhân</a>
					  </li>
					  <li class="list-group-item p-0 list-group-item-action">
						  <a href="thontinbanhang.html" class="list-group-item-link list-item-custom px-5"><i class="fa fa-bar-chart-o"></i> Thông tin bán hàng</a>
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


    <!-- Modal -->
    <div class="modal fade" id="warehouse_create" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><i class="fas fa-anchor"></i> Thông tin chi nhánh NPP </h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" id="formCreateUnit" action="{{ route('warehouse.store') }}"
                        role="form" method="POST">
                        @csrf
                        <div class="form-body">
                            <div class="form-group d-flex mb-2">
                                <label class="col-md-3 control-label">Mã chi nhánh:<span class="required"
                                        aria-required="true">(*)</span></label>
                                <div class="col-md-9">
                                    <input type="text" name="warehouseCode" class="form-control" required
                                        value="{{ old('warehouseCode') }}">
                                </div>
                            </div>
                            <div class="form-group d-flex mb-2">
                                <label class="col-md-3 control-label">Tên chi nhánh NPP:<span class="required"
                                        aria-required="true">(*)</span></label>
                                <div class="col-md-9">
                                    <input type="text" name="warehouseName" class="form-control" required
                                        value="{{ old('warehouseName') }}">
                                </div>
                            </div>
                            <div class="form-group d-flex mb-2">
                                <label class="col-md-3 control-label">Địa chỉ kho:<span class="required"
                                    aria-required="true">(*)</span></label>
                                <div class="col-md-9">
                                    <textarea class="form-control" name="warehouseAddress" rows="3"
                                        value="{{ old('warehouseAddress') }}" required></textarea>
                                </div>
                            </div>
                            <div class="form-group d-flex mb-2">
                                <label class="col-md-3 control-label">Sản phẩm<span class="required"
                                        aria-required="true">(*)</span></label>
                                <div class="col-md-9">
                                    <select name="product" class="form-control productId">
                                        <option value="-1" selected>Chọn sản phẩm</option>
                                        @foreach ($products as $item)
                                            <option value="{{$item->id}}">{{$item->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group d-flex mb-2">
                                <label class="col-md-3 control-label">Số lượng:<span class="required"
                                        aria-required="true">(*)</span></label>
                                <div class="col-md-9">
                                    <input type="number" name="productQuantity" class="form-control" required
                                        value="{{ old('productQuantity', 1) }}" min="1">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Hủy</button>
                            <button type="submit" class="btn btn-info btn-submit-unit">Lưu</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
    <!-- END MODAL -->

		<div class="m-3">
			<div class="row">
				<div class="col-sm-12">
					<div class="card">
						<div class="card-body">
                            @if ($errors->any())
                                <div class="bg-danger p-2 mb-2">
                                    <p class="text-light m-0">{{$errors->first()}}</p>
                                </div>
                            @elseif(session('success'))    
                                <div class="bg-success p-2 mb-2">
                                    <p class="text-light m-0">{{session('success')}}</p>
                                </div>
                            @endif
							<ul class="list-group list-group-flush">
									<div class="d-flex justify-content-between align-items-center">
										<p>
											<span class="caption-subject"><i class="far fa-hourglass"></i> DANH SÁCH TỒN KHO</span>
											<a href="#warehouse_create" data-toggle="modal" class="btn btn_success"><i
                                                class="fa fa-plus"></i> Thêm mới </a>
											{{-- <button class="btn btn_success"><i class="fas fa-plus"></i> Import</button> --}}
										</p>
	
										<span>
											<span data-bs-toggle="collapse" href="#collapseExample" role="button"
												aria-expanded="false" aria-controls="collapseExample">
												<i class="fas fa-chevron-down"></i>
											</span>&nbsp;
											<span style="cursor: pointer;" onclick="window.location.reload();"><i class="fas fa-sync-alt"></i></span>
										</span>
									</div>
							</ul>
                            <div class="collapse show" id="collapseExample">

                                {{-- <div class="row g-2">
                                    <div class="col-sm-1">
                                        <select class="form-select" name="" id="">
                                            <option value="">10</option>
                                            <option value="">20</option>
                                            <option value="">30</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="dropdown">
                                            <button class="form-select" data-bs-toggle="dropdown"
                                                aria-expanded="false">
                                                Chi nhánh NPP
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li>
                                                    <a class="dropdown-item" href="#">
                                                        <input type="text" class="form-control" name=""
                                                            id="">
                                                    </a>
                                                </li>
                                                <li><a class="dropdown-item" href="#">Perfectone Ha Noi(VINMART_MB)</a></li>


                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-sm-2 mb-3">
                                        <div class="dropdown">
                                            <button class="form-select" data-bs-toggle="dropdown"
                                                aria-expanded="false">
                                                Kho
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li>
                                                    <a class="dropdown-item" href="#">
                                                        <input type="text" class="form-control" name=""
                                                            id="">
                                                    </a>
                                                </li>
                                                <li><a class="dropdown-item" href="#">Product</a></li>
                                                <li><a class="dropdown-item" href="#">Exhibit</a></li>
                                                <li><a class="dropdown-item" href="#">Promotion</a></li>
                                                <li><a class="dropdown-item" href="#">POSM</a></li>


                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="dropdown">
                                            <button class="form-select" data-bs-toggle="dropdown"
                                                aria-expanded="false">
                                                Sản phẩm
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li>
                                                    <a class="dropdown-item" href="#">
                                                        <input type="text" class="form-control" name=""
                                                            id="">
                                                    </a>
                                                </li>
                                                <li><a class="dropdown-item" href="#">Đèn sưởi nhà tắm (2 bóng) model KG256(KG256)</a></li>
                                                <li><a class="dropdown-item" href="#">Đèn sưởi nhà tắm (2 bóng) model KG256(KG256)</a></li>
                                                <li><a class="dropdown-item" href="#">Đèn sưởi nhà tắm (2 bóng) model KG256(KG256)</a></li>
                                                <li><a class="dropdown-item" href="#">Đèn sưởi nhà tắm (2 bóng) model KG256(KG256)</a></li>
                                                <li><a class="dropdown-item" href="#">Đèn sưởi nhà tắm (2 bóng) model KG256(KG256)</a></li>


                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="dropdown">
                                            <button class="form-select" data-bs-toggle="dropdown"
                                                aria-expanded="false">
                                                Ngành hàng
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li>
                                                    <a class="dropdown-item" href="#">
                                                        <input type="text" class="form-control" name=""
                                                            id="">
                                                    </a>
                                                </li>
                                                <li><a class="dropdown-item" href="#">Đèn sưởi nhà tắm (2 bóng) model KG256(KG256)</a></li>
                                                <li><a class="dropdown-item" href="#">Đèn sưởi nhà tắm (2 bóng) model KG256(KG256)</a></li>
                                                <li><a class="dropdown-item" href="#">Đèn sưởi nhà tắm (2 bóng) model KG256(KG256)</a></li>
                                                <li><a class="dropdown-item" href="#">Đèn sưởi nhà tắm (2 bóng) model KG256(KG256)</a></li>
                                                <li><a class="dropdown-item" href="#">Đèn sưởi nhà tắm (2 bóng) model KG256(KG256)</a></li>


                                            </ul>
                                        </div>
                                    </div>

                                </div> --}}

                                <div class="row">
                                    <div class="col-sm-12" style="overflow-x: auto;">
                                        <table id="warehouse_table" class="table table-hover align-middle">
                                            <thead>
                                                <tr>
                                                    <th class="title">STT</th>
                                                    <th class="title">Mã chi nhánh NPP</th>
                                                    <th class="title">Tên chi nhánh NPP</th>
                                                    <th class="title">Loại kho</th>
                                                    <th class="title">Model</th>
                                                    <th class="title">Tên sản phẩm</th>
                                                    <th class="title">Đơn vị tính</th>
                                                    <th class="title">Nhóm sản phẩm</th>
                                                    <th class="title">Ngành hàng</th>
                                                    <th class="title">Số lượng tồn kho</th>
                                                    <th class="title">Thời gian</th>
                                                    <th class="title">Thao tác</th>
                                                </tr>
                                            </thead>
                                            <tbody style="color: #748092; font-size: 14px;">
                                                @foreach ($warehouses as $item)
                                                    @foreach ($item->products as $product)
                                                    <tr>
                                                        <td>{{$index}}</td>
                                                        <td>{{$item->code}}</td>
                                                        <td>{{$item->name}}</td>
                                                        <td>Promotion</td>
                                                        <td>PerfectCream01</td>
                                                        <td>{{$product->name}}</td>
                                                        <td>{{$product->productCalculationUnit->name}}</td>
                                                        @if ($product->productCategory->typeof_category == 2)
                                                            <td>{{$product->productCategory->parentCategories->name}}</td>
                                                            <td>{{$product->productCategory->parentCategories->megaParentCategories->name}}</td>
                                                        @else
                                                            <td>{{$product->productCategory->name}}</td>
                                                            <td>{{$product->productCategory->parentCategories->name}}</td>
                                                        @endif
                                                        <td>{{$product->getOriginal('pivot_quantity')}}</td>
                                                        <td>{{$product->getOriginal('pivot_created_at')}}</td>
                                                        <td><a href=""><i class="fas fa-history"></i></a></td>
                                                    </tr>
                                                    <?php $index++; ?>
                                                    @endforeach
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

<script>
    $('#warehouse_table').DataTable({
        ordering: false,
        columnDefs: [
            { "type": "string", "targets": [10] },
            { "type": "html", "targets": [1, 2, 5, 7, 8] },
            { "orderable": true, "targets": 10 },
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

    $(document).ready(function () {
        $("form").validate({
            rules: {
                warehouseCode: {
                    required: true,
                },
                warehouseName: {
                    required: true,
                },
                warehouseAddress: {
                    required: true,
                },
                product: {
                    required: true,
                },
                productQuantity: {
                    required: true,
                    min: 1,
                },
            },
            messages: {
                warehouseCode: "Không được để trống",
                warehouseName: "Không được để trống",
                warehouseAddress: "Không được để trống",
                product: "Không được để trống",
                productQuantity: "Không được để trống",
            }
        });
    });

</script>

@endsection