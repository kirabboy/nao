@extends('admin.layouts.master')
@section('content')
	<link rel="stylesheet" href="{{asset('/public/admin/css/khuyenmai.css')}}">

  	<section class="home-section">
		<div class="header bg-white shadow-sm header_mobile">
		</div>
			
		<div class="m-3">
			<div class="row">
				<div class="col-sm-12">
					<div class="card">
						<div class="card-body">
							<ul class="list-group list-group-flush">
									<div class="d-flex justify-content-between align-items-center">
										<p>
											<span class="caption-subject"><i class="fas fa-tags"></i>DANH SÁCH LOẠI KHUYẾN MẠI</span>
											<button class="btn btn_success"><i class="fas fa-plus"></i> Thêm
												mới</button>
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

										<div class="row d-flex justify-content-between mb-3">
											<div class="col-sm-2">
												<select class="form-select" name="" id="">
													<option value="">10</option>
													<option value="">20</option>
													<option value="">30</option>
												</select>
											</div>
											<div class="col-sm-3">
												<div class="input-group" style="width: 100%;">
													<input type="text" class="form-control" placeholder="Tìm kiếm" aria-label="Recipient's username" aria-describedby="basic-addon2">
													<span class="input-group-text" id="basic-addon2"><i class="fa fa-search" aria-hidden="true"></i></span>
												</div>
											</div>

										</div>
										<div class="row">
											<div class="col-sm-12" style="overflow-x: auto;">
												<table class="table table-hover align-middle">
													<thread>
														<tr>
															<th class="title">STT</th>
															<th class="title">Mã khuyến mại</th>
															<th class="title">Tên khuyến mại</th>
															<th class="title">Mô tả</th>
															<th class="title">Trạng thái</th>
														</tr>
													</thread>
													<tbody style="color: #748092; font-size: 14px;">
														<tr>
															<td>1</td>
															<td><a href="">TTT</a></td>
															<td><a href="">CKTM Tiền tặng tiền</a></td>
															<td></td>
															<td>
																<div class="input-group">
																	<span class="btn_trangthai status_active">Hoạt động</span>
																	<button class="btn" type="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-angle-down"></i></button>
																	<ul class="dropdown-menu dropdown-menu-end">
																	  <li><a class="dropdown-item" href="#">Xóa</a></li>
																	  <li><a class="dropdown-item" href="#">Ngừng</a></li>
																	</ul>
																</div>
															</td>
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
@endsection