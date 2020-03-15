<?php
session_start();
session_destroy();

	setcookie('Cuid', "", time()+3600*24, '/', $domain, false);
	setcookie("Cname","", time()+3600*24, '/', $domain, false);
	setcookie("Culevel","", time()+3600*24, '/', $domain, false);
header("Location: index.php");
?>
