<?php
session_start();

if ($_POST["captcha"] != $_SESSION["security_code"]) {
print<<<end
<font color="red">Sorry Your Verification Code is wrong.</font>
end;
} else {
print<<<end
<font color="blue">You entered the correct code this time...</font>
end;
}
?>
<br/>
<br/>
<a href="index.php">Return to main page</a>