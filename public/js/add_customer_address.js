$(document).ready(function(){
	$('input[name="isOldCustomer"]').change(function(event) {
		/* Act on the event */
		if($(this).val() == 0){
			$(".search-old-customer").html('');
		}else{
			$(".search-old-customer").html(`<h3>Tìm kiếm khách hàng</h3>
            <div class="row justify-content-between align-items-center">
                <div class="col-12">
                    <input type="text" name="searchCustomer" class="form-control btn-rounded" placeholder="Nhập tên tìm kiếm ...">
                </div>
            </div>`);
		}
	});
});
$(document).on('keyup', 'input[name="searchCustomer"]', function(event) {
	event.preventDefault();
	$.ajax({
        url: urlHome + '/tim-kiem-dia-chi-khach-hang',
        type: 'GET',
        data: { key: $(this).val() },
    })
    .done(function(data) {
    	$(".search-old-customer ul.list-group").html(data);
    });
});
$(document).on("click", function(event){
    if(!$(event.target).closest(".search-old-customer").length){
        $(".search-old-customer ul.list-group").html('');
    }
});
$(document).on("click", '.search-old-customer ul.list-group li',function(event){
    event.preventDefault();
	$.ajax({
        url: urlHome + '/tra-ve-thong-tin-khach-hang',
        type: 'GET',
        data: { id: $(this).data('id') },
    })
    .done(function(data) {
    	$('input[name="id"]').val(data['id']);
    	$('input[name="fullname"]').val(data['name']);
    	$('input[name="phone"]').val(data['phone']);
    	$('input[name="address"]').val(data['address']);
    	$('select[name="province_id"]').html(data['province']);
    	$('select[name="district_id"]').html(data['district']);
    	$('select[name="ward_id"]').html(data['ward']);
    	$('select[name="warehouse_id"]').html(data['warehouse']);

        $(".search-old-customer ul.list-group").html('');
    });
});