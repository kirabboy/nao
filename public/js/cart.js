$('#add-to-cart').submit(function(e) {
    e.preventDefault(); // avoid to execute the actual submit of the form.
    var form = $(this);
    $.ajax({
        type: form.attr('method'),
        url: form.attr('action'),
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        data: form.serialize(),
        success: function(response) {
            console.log(response);
            $('#add-to-cart-success').modal('show');
        },
        error: function(response) {
            console.log(response);

        }
    });
});

function updateCart(e, f) {

    var qty = e.val();
    var rowid = e.data('rowid');
    var url = e.data('url');

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: 'POST',
        url: url,
        data: { qty: qty, rowid: rowid },
        error: function(data) {
            console.log(data);
        },
        success: function(response) {
            f.text(response);
        }
    });
}

function updateCheckout() {
    rowids = [];
    $(".list-items input:checkbox:checked").each(function() {
        rowids.push($(this).val());
    });
    $.ajax({
        type: 'GET',
        url: $('#check-out-all').data('url'),
        data: { rowids: rowids },
        success: function(response) {
            console.log(response);
            $('#subtotal').text(response[0]);
            $('input[name="rowids"]').val(response[1]);
            if (response[1] != '') {
                $('#btn-checkout').prop('disabled', false);
            } else {
                $('#btn-checkout').prop('disabled', true);
            }
        },
        error: function(response) {
            console.log(response);
        }
    });
}
$('.list-items input[name="rowid"]').click(function() {
    updateCheckout();
})
$("#check-out-all").click(function() {
    $('.list-carts input:checkbox').not(this).prop('checked', this.checked);
    updateCheckout();
});