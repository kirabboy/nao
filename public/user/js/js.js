var copyTextareaBtn = document.querySelector('.linkgioithieu');
copyTextareaBtn.addEventListener('click', function(event) {
  var copyTextarea = document.querySelector('.btn_linkgioithieu');
  copyTextarea.focus();
  copyTextarea.select();

  try {
    var successful = document.execCommand('copy');
    var msg = successful ? 'successful' : 'unsuccessful';
    console.log('Copying text command was ' + msg);
  } catch (err) {
    console.log('Oops, unable to copy');
  }
});

var magioithieuBTN = document.querySelector('.magioithieu');
magioithieuBTN.addEventListener('click', function(event) {
  var copyTextarea = document.querySelector('.btn_magioithieu');
  copyTextarea.focus();
  copyTextarea.select();

  try {
    var successful = document.execCommand('copy');
    var msg = successful ? 'successful' : 'unsuccessful';
    console.log('Copying text command was ' + msg);
  } catch (err) {
    console.log('Oops, unable to copy');
  }
});

