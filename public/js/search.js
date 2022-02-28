function showSearchSuggest(e) {

    key = $(e).val();
    if (key.length >= 3) {
        $.ajax({
            type: 'GET',
            url: $(e).data('url'),
            data: { 'keyword': key },
            error: function(data) {
                console.log(data);
            },
            success: function(response) {
                console.log(response);
                $('.show-search-suggest ul').html(response);
                $('.show-search-suggest').css('display', 'block');

            }
        });
    } else {
        $('.show-search-suggest').css('display', 'none');
    }
}
$('input[name="keyword"]').click(function() {

    showSearchSuggest($(this));
});
$(document).click(function() {
    $('.show-search-suggest').css('display', 'none');
});