
var urlHome = jQuery('meta[name="url-home"]').attr('content');

var token = jQuery('meta[name="csrf-token"]').attr('content');

function formatNumber(n) {
    // format number 1000000 to 1,234,567
    return n.toString().replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",")
}

$(document).ready(function () {
    $(".show-modal").click(function () {
        $('#modalAddress').modal('show');
    })
    $(".delete-address-shipping").click(function () {
        if(!confirm("Có chắc là bạn muốn xóa ?")){
            return;
        }
        var action = $(this).data('action'), form = $("#deleteAddressShipping");
        form.attr('action', action);
        form.submit();
    })
    
});

// function sendAjax(){
//     $(".content-checkout").prepend('<div class="submit-overlay"><div class="spinner-border text-primary"></div></div>');
//     $('select[name="sel_ward"]').html('<option value="">--- Cấp phường xã---</option>');
//     $(".order-total .amount").text(formatNumber(order_total) + 'đ');
//     $('.checkout-shipping-method').remove();
//     $('.checkout-shipping-label td').css("opacity", "1");
// }

// function RecieveAjax(){
//     $(".submit-overlay").remove();
// }

// $(document).ready(function() {
//     $('.select2').select2({
//         allowClear: true,
//         theme: "classic",
//         width: '100%'
//     });
// });
$(document).on('change', 'select[name="province_id"]', function(event) {
    event.preventDefault();
    /* Act on the event */
    flag = false;
    $('select[name="district_id"]').html('<option value="">---Chọn quận / huyện---</option>');
    $('select[name="ward_id"]').html('<option value="">---Chọn phường / xã---</option>');
    // sendAjax();
    // if($(this).val() == ''){
    //     RecieveAjax();
    //     return;
    // }
    $.ajax({
        url: urlHome+'/lay-quan-huyen-theo-tinh-thanh',
        type: 'GET',
        dataType: 'json',
        data: {id: $(this).val()},
    })
    .done(function(data) {
        var html = '<option value="">---Chọn quận / huyện---</option>';
        $.each(data, function( index, value ) {
            html += '<option value="'+value.maquanhuyen+'">'+value.tenquanhuyen+'</option>';
        });
        

        $('select[name="district_id"]').html(html);
        
    });
    
});

$(document).on('change', 'select[name="district_id"]', function(event) {
    event.preventDefault();
    /* Act on the event */
    flag = false;
    // sendAjax();
    var district = $(this).val();
    // if($(this).val() == ''){
    //     RecieveAjax();
    //     return;
    // }

    $('select[name="ward_id"]').html('---Chọn phường / xã---</option>');
    $.ajax({
        url: urlHome+'/lay-phuong-xa-theo-quan-huyen',
        type: 'GET',
        dataType: 'json',
        data: {id: district},
    })
    .done(function(data) {
        var html = '<option value="">---Chọn phường / xã---</option>';
        $.each(data, function( index, value ) {
            html += '<option value="'+value.maphuongxa+'">'+value.tenphuongxa+'</option>';
        });
        
        $('select[name="ward_id"]').html(html);

        

    });
    
});
$(document).on('submit', '#addAddressShipping', function(e) {
    e.preventDefault();
    var that = $(this);
    $.ajax({
        url: that.attr('action'),
        type: 'POST',
        data: that.serialize(),
    })
    .done(function() {
        // $('.info-shipping').html(data);
        // $('#modalAddress').modal('hide');
        // that.trigger("reset");
        location.reload();
    });
})
$(document).on('submit', '#addAddressShipping', function(e) {
    e.preventDefault();
    var that = $(this);
    $.ajax({
        url: that.attr('action'),
        type: 'POST',
        data: that.serialize(),
    })
    .done(function() {
        // $('.info-shipping').html(data);
        // $('#modalAddress').modal('hide');
        // that.trigger("reset");
        location.reload();
    });
})

$(document).on('submit', '#editAddressShipping', function(e) {
    e.preventDefault();
    var that = $(this);
    $.ajax({
        url: that.attr('action'),
        type: 'PUT',
        data: that.serialize(),
    })
    .done(function() {
        // $('.info-shipping').html(data);
        // $('#modalAddress').modal('hide');
        // that.trigger("reset");
        location.reload();
    });
})

$(document).on('change', 'input[name="shipping"]', function(event) {
    
    event.preventDefault();
    
    var that = $(this), form = $("#shippingFee");

    if(this.checked && that.val() == 'VNPOST') {
        //Do stuff
        

        $.ajax({
            url: form.attr('action'),
            type: 'POST',
            data: { _token: $('meta[name="csrf-token"]').attr('content'), id_order: 0 },
        })
        .done(function(data) {
            $(".fee-shipping").text(formatNumber(data.fee_shipping) + ' đ');
        })
        .fail(function(data) {
            alert(data.responseJSON.msg);
        });
    }
});
