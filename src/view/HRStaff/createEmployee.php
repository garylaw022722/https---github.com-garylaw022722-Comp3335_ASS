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
    // data from create employee form
    $conn = getConnection(json_decode($_SESSION[$uuid]));
    $userID = $_POST["user_id"];
    $Dept_id = $_POST["Dept_id"];
    $firstName = $_POST["firstName"];
    $lastName = $_POST["lastName"];
    $BOD = $_POST["BOD"];
    $salary = $_POST["salary"];
    $gender = $_POST["gender"];
    $address = $_POST["address"];
    $ID_Card_No = $_POST["ID_Card_No"];
    $tel = $_POST["tel"];
    

    $sql = 'INSERT INTO comp3335.Employee(user_id,Dept_id,firstName,lastName,BOD,salary,gender,address,ID_Card_No,tel) values (?,?,?,?,?,?,?,?,?,?)';
    $preState = $conn->prepare($sql);
    $preState->bind_param("sisssissss", $userID, $Dept_id, $firstName, $lasbtName, $BOD, $salary, $gender, $address, $ID_Card_No, $tel);
  

    $sql = "INSERT INTO comp3335.Employee 
       VALUES ('$userID', '$Dept_id', '$firstName', '$lastName', '$BOD', '$salary', '$gender', '$address', '$ID_Card_No', '$tel')";
}

?>