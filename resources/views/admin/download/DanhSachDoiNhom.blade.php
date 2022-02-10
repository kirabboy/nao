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