<x-header_admin />
	<link rel="stylesheet" href="{{asset('/resources/css/khuyenmai.css')}}">
	


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
		<div class="m-3">
			<div class="row">
				<div class="col-sm-12">
					<div class="card">
						<div class="card-body">
							<ul class="list-group list-group-flush">
									<div class="d-flex justify-content-between align-items-center">
										<p>
											<span><i class="far fa-hourglass"></i>DANH SÁCH TỒN KHO</span>
											<button class="btn btn_success"><i class="fas fa-plus"></i> Thêm
												mới</button>
											<button class="btn btn_success"><i class="fas fa-plus"></i> Import</button>
										</p>
	
										<span>
											<span data-bs-toggle="collapse" href="#collapseExample" role="button"
												aria-expanded="false" aria-controls="collapseExample">
												<i class="fas fa-chevron-down"></i>
											</span>&nbsp;
											<span><i class="fas fa-sync-alt"></i></span>&nbsp;
											<span><i class="fas fa-expand"></i></span>
										</span>
									</div>
									<div class="collapse show" id="collapseExample">
	
										<div class="row g-2">
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
	
										</div>
										<div class="row">
											<div class="col-sm-12" style="overflow-x: auto;">
												<table class="table table-hover align-middle">
													<thread>
														<tr>
															<th class="title">STT</th>
                                                            <th class="title">Mã chi nhánh NPP</th>
                                                            <th class="title">Tên chi nhánh NPP</th>
                                                            <th class="title">Loại kho</th>
                                                            <th class="title">Model</th>
                                                            <th class="title">Mã ERP</th>
                                                            <th class="title">Tên sản phẩm</th>
                                                            <th class="title">Đơn vị tính</th>
                                                            <th class="title">Nhóm sản phẩm</th>
                                                            <th class="title">Ngành hàng</th>
                                                            <th class="title">Số lượng tồn kho</th>
                                                            <th class="title">Thời gian</th>
                                                            <th class="title">Thao tác</th>
														</tr>
													</thread>
													<tbody style="color: #748092; font-size: 14px;">
														<tr>
															<td></td>
															<td></td>
															<td></td>
															<td></td>
															<td></td>
															<td></td>
															<td></td>
															<td></td>
															<td></td>
															<td></td>
															<td></td>
															<td></td>
															<td><a href=""><i class="fas fa-history"></i></a></td>
                                                        </tr>
													</tbody>
												</table>
											</div>
										</div>
									</div>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
<x-footer_admin />