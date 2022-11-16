<?php
session_start();
session_destroy();
header( "Location:../index.php?msg=".urlencode("You are successfully logged out, you can close your browser."));

?>