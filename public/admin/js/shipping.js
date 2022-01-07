
function viewShippingOrder(e){
    url = $(e).data('url');
    id_order = $(e).data('id');
    $.ajax({
        url: url,
        type: 'GET',
        dataType: 'html',
        data: {id_order: id_order},
    })
    .done(function(data) {
        $('body').after(data)
    })
    .always(function() {
        RecieveAjax();
    });
}
function destroyModal() {
    $('#order-shipping-view').remove();
}
function modalClose(element){
    $(element).modal('hide');
}


$(document).on('submit', '#form-order-shipping-create', function(event){
    $(".content-checkout").prepend('<div class="submit-overlay"><div class="spinner-border text-primary"></div></div>');
    event.preventDefault();
    $.ajax({
        url: $(this).data('action'),
        type: 'POST',
        dataType: 'html',
        data: $(this).serialize(),
    })
    .done(function(data) {
        
        $(".has-shipping-bill").remove();

        $("#btn-order-shipping-create").after('<button class="btn btn-success">'+
        '<i class="fas fa-shipping-fast"></i> Đã tạo đơn vận chuyển</button>');

        $(".card-title span").replaceWith('<span class="text-info">Đang xử lý</span>');

        $("#btn-order-shipping-create").remove();
        
        destroyModal();
        
        $(".content-order").after(data);

        $.toast({
            heading: 'Thành công',
            text: 'Đã tạo đơn vận chuyển thành công',
            position: 'top-right',
            icon: 'success'
        });
        
    })
    .fail(function() {
        $.toast({
            heading: 'Thất bại',
            text: 'Tạo đơn vận chuyển không thành công',
            position: 'top-right',
            icon: 'error'
        });
    })
    .always(function() {
        RecieveAjax();
    });
});


$(document).on('click','#btn-destroy-shipping-order', function(e){
    $('input[name="shipping_id"]').val($(this).data('shipping_id'));
    $("#modal-shipping-destroy").modal("show");
});

$(document).on('submit','#form-shipping-order-destroy', function(e){
    e.preventDefault();
    $.ajax({
        url: urlHome+'/admin/van-chuyen/huy-don-hang',
        type: 'DELETE',
        data: $(this).serialize(),
    })
    .done(function(data) {
        if(data == 204){
            modalClose('#modal-shipping-destroy');
            $(".card-title span").replaceWith('<span class="text-danger">Đã hủy</span>');
            $(".status_shipping span").replaceWith('<span class="text-danger">Đã hủy</span>');
            $("#btn-destroy-shipping-order").remove();
            $.toast({
                heading: 'Thành công',
                text: 'Hủy đơn vận chuyển thành công',
                position: 'top-right',
                icon: 'success',
                hideAfter: 6000 
            });
        }else if(data == 422){
            $.toast({
                heading: 'Thất bại',
                text: 'Đơn hàng không tim thấy hoặc bạn không phải là chủ đơn hàng này',
                position: 'top-right',
                icon: 'error',
                hideAfter: 6000
            });
        }else if(data == 401){
            $.toast({
                heading: 'Thất bại',
                text: 'Xác thực thất bại vui lòng liên hệ Admin để sửa lỗi này',
                position: 'top-right',
                icon: 'error',
                hideAfter: 6000
            });
        }else{
            $.toast({
                heading: 'Thất bại',
                text: 'VNpost Tạm thời đóng cửa',
                position: 'top-right',
                icon: 'warning',
                hideAfter: 6000
            });
        }
        
        
    })
    .fail(function() {
        $.toast({
            heading: 'Thất bại',
            text: 'Hủy đơn vận chuyển không thành công',
            position: 'top-right',
            icon: 'error'
        });
    })
    .always(function() {

    });
});

