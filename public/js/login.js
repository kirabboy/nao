$(document).ready(function() {
	$("form.form-login").submit(function(event) {
		event.preventDefault();
		$('#ModalLoginAlert').modal('show');
	});
});