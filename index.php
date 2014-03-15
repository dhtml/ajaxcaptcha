<html>
<head>
<title>Ajax Captcha</title>
<script src="captcha.js"></script>

<style>
#captcha_image {cursor:pointer;cursor:hand;}
#captcha {width:150px;}
</style>
</head>
<body>

<form action="post.php" method="post" onsubmit="return validate(this)">
<p>Type code: 
<input type="text" autocomplete="off" placeholder="Press enter to submit" name="captcha" id="captcha">
<input type="submit">
</p> 
<p>
<img src="captcha.php" id="imgCaptcha" >
<img src="refresh.gif" border="0" id="captcha_image" onclick="refreshc();"  title="Refresh captcha">
</p>
</form>

 </body>
 </html>