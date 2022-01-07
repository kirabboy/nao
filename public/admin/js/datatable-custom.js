
$(document).ready(function() {
    var order = $('#order').DataTable({
        columnDefs: [
            { orderable: false, targets: 9 }
          ],
          order: [[0, 'desc']],
        "language": {
            "lengthMenu": "Hiển thị _MENU_ kết quả",
            "zeroRecords": "Không tìm thấy đơn hàng nào",
            "info": "hiển thị trang _PAGE_ trong _PAGES_",
            "infoEmpty": "Không có đơn hàng",
            "paginate": {
                "previous": '‹',
                "next":     '›'
            },
            "search": "Tìm kiếm: "
        }
    });
    $("#fdate" ).datetimepicker({
        format:'Y-m-d H:i:s',
        formatTime:'H:i:s',
        formatDate:'Y-m-d'
    });

} );