<!-- HR Staff - employee create--->
<?php
require_once("../../php/db_connect.php");

// data from create employee form
$user_id = $_POST["user_id"];
$Dept_id = $_POST["Dept_id"];
$firstName = $_POST["firstName"];
$lastName = $_POST["lastName"];
$BOD = $_POST["BOD"];
$salary = $_POST["salary"];
$gender = $_POST["gender"];
$address = $_POST["address"];
$ID_Card_No = $_POST["ID_Card_No"];
$tel = $_POST["tel"];

$sql = "INSERT INTO comp3335.Employee 
    VALUES ('$user_id', '$Dept_id', '$firstName', '$lastName', '$BOD', '$salary', '$gender', '$address', '$ID_Card_No', '$tel')";

if ($con -> query($sql) == TRUE) {
    header("Location:../main.php?msg=".urlencode("Employee create successfully."));
} else {
    header( "Location:../main.php?msg=".urlencode("Error occured."));
}


?>