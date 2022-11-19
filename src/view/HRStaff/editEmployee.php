<?php
include('../../php/db_Connection.php');
session_start();

$uuid =  $_SESSION["id"];

if (isset(
    $_POST["user_id"],
    $_POST["Dept_id"],
    $_POST["firstName"],
    $_POST["lastName"],
    $_POST["BOD"],
    $_POST["salary"],
    $_POST["gender"],
    $_POST["address"],
    $_POST["ID_Card_No"],
    $_POST["tel"]
)) {
    $conn = getConnection(json_decode($_SESSION[$uuid]));
    $sql = "UPDATE comp3335.Employee SET Dept_id=?, firstName=?, lastName=?, BOD=?, salary=?, gender=?, address=?, ID_Card_No=?, tel=? WHERE user_id=?;";
    $preState = $conn->prepare($sql);
    $preState->bind_param("isssssssss", $Dept_id, $firstName, $lastName, $BOD, $salary, $gender, $address, $ID_Card_No, $tel, $userID);

    $userID = $_POST["user_id"];
    $Dept_id = $_POST["Dept_id"];
    $firstName = $_POST["firstName"];
    $lastName = $_POST["lastName"];
    $gender = $_POST["gender"];


    //encrpytion with pk in rsa
    include("protection.php");
    $Pkey_Path = "../../secure/{$userID}/{$userID}_PK.pem";
    $pubKey = openssl_get_publickey(file_get_contents($Pkey_Path));
    $BOD = RSA_encryption($_POST["BOD"], $pubKey);
    $salary = RSA_encryption($_POST["salary"], $pubKey);
    $address = RSA_encryption($_POST["address"], $pubKey);
    $ID_Card_No = RSA_encryption($_POST["ID_Card_No"], $pubKey);
    $tel = RSA_encryption($_POST["tel"], $pubKey);







    $preState->execute();

    if ($preState == true) {
        header("Location: main.php?msg=" . urlencode("Employee updated successfully."));
    } else {
        header("Location: main.php?msg=" . urlencode("Error Occured."));
    }
} else {
    header("Location: main.php?msg=" . urlencode("Missing Data"));
}
