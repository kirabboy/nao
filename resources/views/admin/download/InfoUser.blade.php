<table>
    <thead>
        <tr>
            <th>STT</th>
            <th>Mã đại lý</th>
            <th>Họ tên</th>
            <th>Số CMND</th>
            <th>Số điện thoại</th>
            <th>Số nhà/ Đường</th>
            <th>Phường/Xã</th>
            <th>Quận/Huyện</th>
            <th>Tỉnh/Tp</th>
            <th>Số tài khoản</th>
            <th>Họ tên trên thẻ</th>
            <th>Ngân hàng</th>
            <th>Chi nhánh</th>
            <th>Mã đại lý cấp trên</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($user as $value)
        <tr>
            <td>{{$value->id}}</td>
            <td>{{$value->code_user}}</td>
            <td>{{$value->name}}</td>
            <td>{{$value->cmnd}}</td>
            <td>0{{$value->phone}}</td>
            <td>{{$value->address}}</td>
            <td>{{DB::table('ward')->where('maphuongxa', $value->id_ward)
                ->select('tenphuongxa')->first()->tenphuongxa ?? ''}}</td>
            <td>{{DB::table('district')->where('maquanhuyen', $value->id_district)
                ->select('tenquanhuyen')->first()->tenquanhuyen ?? ''}}</td>
            <td>{{DB::table('ward')->where('maphuongxa', $value->id_ward)
                ->select('tenphuongxa')->first()->tenphuongxa ?? ''}}</td>
            <td>{{$value->bank_number}}</td>
            <td>{{$value->bank_name}}</td>
            <td>{{$value->bank}}</td>
            <td>{{$value->bank_chinhanh}}</td>
            <td>{{$value->getIdDad->getNameDad->code_user}}</td> 
        </tr>
        @endforeach
    </tbody>
</table>

