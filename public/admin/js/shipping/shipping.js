var urlHome = jQuery('meta[name="url-home"]').attr('content');

var token = jQuery('meta[name="csrf-token"]').attr('content');

var order_total = parseInt($(".order-total .amount").data('total').replace(",",""));

var flag = false;

function formatNumber(n) {
    // format number 1000000 to 1,234,567
    return n.toString().replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",")
  }

function sendAjax(){
    $(".content-checkout").prepend('<div class="submit-overlay"><div class="spinner-border text-primary"></div></div>');
    $('select[name="sel_ward"]').html('<option value="">---Chọn phường xã---</option>');
    $(".order-total .amount").text(formatNumber(order_total) + 'đ');
    $('.checkout-shipping-method').remove();
    $('.checkout-shipping-label td').css("opacity", "1");
}

function RecieveAjax(){
    $(".submit-overlay").remove();
}

$(document).ready(function() {
    $('.select2').select2({
        allowClear: true,
        theme: "classic",
        width: '100%'
    });
});
$(document).on('change', 'select[name="sel_province"]', function(event) {
    event.preventDefault();
    /* Act on the event */
    flag = false;
    $('select[name="sel_district"]').html('<option value="">---Chọn quận huyên---</option>');
    sendAjax();
    if($(this).val() == ''){
        RecieveAjax();
        return;
    }
    $.ajax({
        url: urlHome+'/lay-quan-huyen-theo-tinh-thanh',
        type: 'GET',
        dataType: 'json',
        data: {id: $(this).val()},
    })
    .done(function(data) {
        var html = '<option value="">---Chọn quận huyên---</option>';
        $.each(data, function( index, value ) {
            html += '<option value="'+value.maquanhuyen+'">'+value.tenquanhuyen+'</option>';
        });
        

        $('select[name="sel_district"]').html(html);
        
    }).always(function() {
        RecieveAjax();
    });
    
});

$(document).on('change', 'select[name="sel_district"]', function(event) {
    event.preventDefault();
    /* Act on the event */
    flag = false;
    sendAjax();
    var district = $(this).val();
    if($(this).val() == ''){
        RecieveAjax();
        return;
    }
    $.ajax({
        url: urlHome+'/lay-phuong-xa-theo-quan-huyen',
        type: 'GET',
        dataType: 'json',
        data: {id: district},
    })
    .done(function(data) {
        var html = '<option value="">---Chọn phường xã---</option>';
        $.each(data, function( index, value ) {
            html += '<option value="'+value.maphuongxa+'">'+value.tenphuongxa+'</option>';
        });
        
        $('select[name="sel_ward"]').html(html);

        
        var province = $('select[name="sel_province"]').val();

        var id_order = $('input[name="in_id_order"]').val();
        if(!id_order){
            id_order = 0;
        }
        
        $.ajax({
            url: urlHome+'/tinh-phi-van-chuyen',
            type: 'POST',
            dataType: 'html',
            data: {_token: token, district: district, province: province, id_order: id_order},
        })
        .done(function(data) {
            $(".checkout-shipping-label").after(data);
            $('.checkout-shipping-label td').css("opacity", "0");
            $(".order-total .amount").text(formatNumber(order_total + parseInt($("#shipping-ems").val())) + 'đ');
        })
        .always(function() {
            RecieveAjax();
        });

    })
    .fail(function() {
        RecieveAjax();
    });
    
});
$(document).on('change', 'input[name="in_shipping"]', function(event) {
    $('input[name="shipping_method"]').val($(this).data('method'));
    $(".order-total .amount").text(formatNumber(order_total + parseInt($(this).val())) + 'đ');
});