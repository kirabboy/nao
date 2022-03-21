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

function writeStyles(styleName, cssText) {
	var styleElement = document.getElementById(styleName);
	if (styleElement) document.getElementsByTagName('head')[0].removeChild(
		styleElement);
	styleElement = document.createElement('style');
	styleElement.type = 'text/css';
	styleElement.id = styleName;
	styleElement.innerHTML = cssText;
	document.getElementsByTagName('head')[0].appendChild(styleElement);
}

function writeStyles2(styleName, cssText) {
	var styleElement = document.getElementById(styleName);
	if (styleElement) document.getElementsByTagName('head')[0].removeChild(
		styleElement);
	styleElement = document.createElement('style');
	styleElement.type = 'text/css';
	styleElement.id = styleName;
	styleElement.innerHTML = cssText;
	document.getElementsByTagName('head')[0].appendChild(styleElement);
}

function tatInfo() {
	var cssText = '#trangInfo{ display: none !important; } #trangOption{display: block !important}';
	writeStyles('styles_js', cssText);
}

function showRegister() {
	var cssText = '#trangInfo{ display: block !important;} #trangOption{display: none !important}';
	writeStyles('styles_js', cssText)
}

function showNangCap1() {
	var cssText = '#trangInfo{ display: none !important; } #showNangCap1{display: block !important} #trangOption{ display: none !important;} ';
	writeStyles('styles_js', cssText)
}

function final1() {
	var cssText = '#trangInfo{ display: none !important; } #showNangCap1{display: none !important} #final1{display: block !important} #trangOption{ display: none !important;} ';
	writeStyles('styles_js', cssText)
}

function showNangCap2() {
	var cssText = '#trangInfo{ display: none !important; } #showNangCap2{display: block !important} #trangOption{ display: none !important;} ';
	writeStyles('styles_js', cssText)
}

function final2() {
	var cssText = '#trangInfo{ display: none !important; } #showNangCap2{display: none !important} #final2{display: block !important} #trangOption{ display: none !important;} ';
	writeStyles('styles_js', cssText)
}