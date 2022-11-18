<?php

include("../php/db_Connection.php");
$uuid =  $_SESSION["id"];
$conn = getConnection(json_decode($_SESSION[$uuid]));












?>