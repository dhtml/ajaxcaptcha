function refreshc() {
setTimeout('reset_captcha()', 300); return false;
}

function reset_captcha() {
document.getElementsByName("captcha").value="";
with(document.getElementById('imgCaptcha')) {
	src = ""; 
	src = 'captcha.php?' + Math.random();
}
}

function validate(form) {
if(form.captcha.value=="") {alert("Please enter verification code.");form.captcha.focus();return false;}
return true;
}