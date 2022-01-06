$(document).ready(function() {
	$("form.form-login").submit(function(event) {
		event.preventDefault();
		$('#ModalLoginAlert').modal('show');
	});
	$("#rememberMe").change(function(event) {
		/* Act on the event */
		if($("#rememberMe:checked").length > 0){
			$("button[name='register-submit']").removeAttr('disabled');
		}else{
			$("button[name='register-submit']").attr('disabled', 'true');
		}
	});

});
$(document).on('click', '.form-group-input-icon i', function() {
	if($(this).siblings("input").attr('type') == 'password'){
		$(this).siblings("input").attr('type', 'text');
		$(this).replaceWith('<i class="fa fa-eye" aria-hidden="true"></i>');
	}else{
		$(this).siblings("input").attr('type', 'password');
		$(this).replaceWith('<i class="fa fa-eye-slash" aria-hidden="true"></i>');
	}
});