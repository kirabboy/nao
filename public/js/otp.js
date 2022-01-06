$(document).ready(function() {
	$("input[name='codeOTP[]']").keyup(function () {
		var that = $(this);
		if(that.val() == '' && !Number.isInteger(parseInt(that.val()))){
			that.prev().focus();
		}
	    if (that.val().length == 1 && Number.isInteger(parseInt(that.val()))) {
	      that.next().focus();
	      // historyValue = that.val();
	    }
	    if (that.val().length > 1 && Number.isInteger(parseInt(that.val()))) {
	    	var value = that.val()[that.val().length -1];
	    	that.val(that.val()[0]);
			that.next().focus();
	      	that.next().val(value);
	    }
	});
});