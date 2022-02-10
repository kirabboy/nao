@extends('admin.layouts.master')
@section('content')
<link rel="stylesheet" href="{{ asset('/public/admin/css/doitac.css') }}">
<link rel="stylesheet" href="{{ asset('/public/admin/table/table.css') }}" type="text/css">

	<section class="home-section">
        <div class="header bg-white shadow-sm header_mobile"></div>
        <!-- Team -->
        <div class="team m-3">
            <div class="team_container py-3 px-4">
                <div class="team__top d-flex justify-content-between team-mobile">
                    <div class="team__top-left d-flex align-items-center team-mobile">
                        <div class="d-flex">
                            <i class="fa fa-bars team_bars me-2" aria-hidden="true"></i>
                            <h4 class="mb-0 me-4 text-uppercase fs-5 team-title">Đội nhóm của {{$boss->name}}</h4>
                        </div>
                        <div class="team-mobile-btn d-flex align-items-center">
                            <a href="{{route('listdoinhom')}}/{{$boss->id}}/download" class="rounded-pill p-1 btn_team-top px-3 m-1 text-decoration-none">
                                <i class="fa fa-file-excel-o" aria-hidden="true"></i> Export
                            </a>
                            <a href="{{route('listdoinhom')}}" class="rounded-pill p-1 btn_team-top px-3 text-decoration-none">
                                <i class="fa fa-file-excel-o" aria-hidden="true"></i> Quay Lại
                            </a>
                        </div>
                    </div>
                </div>
                <!-- table -->
                    @if ($user->first() != null)
                    <div class="table__container mt-2" style="overflow-x: auto;">
                        <table class="styled-table table-sortable" id="myTable" style="width: 100%;">
                            <thead>
                                <tr>
                                    <th scope="col">Mã đại lý</th>
                                    <th scope="col">Họ tên</th>
                                    <th scope="col">Số điện thoại</th>
                                    <th scope="col">Địa chỉ</th>
                                    <th scope="col">Phường/Xã</th>
                                    <th scope="col">Quận/Huyện</th>
                                    <th scope="col">Tỉnh/TP</th>
                                    <th scope="col">Level</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($user->where('id_child','!=',$boss->id) as $value)
                                <tr>
                                    <td>{{$value->getNameSon->code_user}}</td>
                                    <td>{{$value->getNameSon->name}}</td>
                                    <td>0{{$value->getNameSon->phone}}</td>
                                    <td>{{$value->getNameSon->address}}</td>
                                    <td>{{DB::table('ward')->where('maphuongxa', $value->getNameSon->id_ward)
                                        ->select('tenphuongxa')->first()->tenphuongxa ?? ''}}</td>
                                    <td>{{DB::table('district')->where('maquanhuyen', $value->getNameSon->id_district)
                                        ->select('tenquanhuyen')->first()->tenquanhuyen ?? ''}}</td>
                                    <td>{{DB::table('province')->where('matinhthanh', $value->getNameSon->id_province)
                                        ->select('tentinhthanh')->first()->tentinhthanh ?? ''}}</td>
                                    <td>{{$value->getNameSon->level}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @else
                        Hiện khách hàng này chưa mời được ai!
                    @endif
            </div>
        </div>
	</section>

<script type="text/javascript" src="{{asset('public/admin/table/table.js')}}"></script>
@endsection