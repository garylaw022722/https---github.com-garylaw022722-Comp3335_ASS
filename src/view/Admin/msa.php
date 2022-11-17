<?php
include("../../php/db_Connection.php");
session_start();
$uuid =$_SESSION["id"];
echo $_SESSION[$uuid];
$conn = getConnection(json_decode($_SESSION[$uuid]));



?>