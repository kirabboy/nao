@extends('admin.layouts.master')
@section('content')
	<link rel="stylesheet" href="{{asset('/public/admin/css/doitac.css')}}">

  	<section class="home-section">
		<div class="header bg-white shadow-sm header_mobile">
		</div>
		<!-- Team -->
		<div class="team m-3">
			<div class="team_container py-3 px-4">
				<div class="team__top d-flex justify-content-between team-mobile">
					<div class="team__top-left d-flex align-items-center team-mobile">
						<div class="d-flex">
							<i class="fa fa-user-o team_bars me-2" aria-hidden="true"></i>
							<h4 class="mb-0 me-4 text-uppercase fs-5 text-center">ROLE</h4>
						</div>
                    </div>
				</div>
				<!-- table -->
				<div class="table__container mt-2 w-100" style="overflow: auto;">
					<table class="table table-hover">
						<thead class="table__daily">
						    <tr style="vertical-align: top;">
                                <th>STT</th>
                                <th>Mã đại lý</th>
                                <th>Họ tên</th>
						    </tr>
						</thead>
						<tbody class="font-size-1">
						    <tr>
                                <th scope="row">1</th>
                                <td>DL001</td>
                                <td>Nguyễn Thị B</td>
						    </tr>
						</tbody>
					</table>
					
				</div>


				<!-- end table -->
			</div>
		</div>
  	</section>
@endsection