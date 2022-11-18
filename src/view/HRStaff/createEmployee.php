<!-- HR Staff - employee create--->
<?php
session_start();
include('../../php/db_Connection.php');

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

    $conn = getConnection(json_decode($_SESSION[$uuid]));
    $sql = "INSERT INTO comp3335.Employee(user_id,Dept_id,firstName,lastName,BOD,salary,gender,address,ID_Card_No,tel) values (?,?,?,?,?,?,?,?,?,?)";
    $preState = $conn->prepare($sql);
    $preState->bind_param("sisssissss", $user_id, $Dept_id, $firstName, $lasbtName, $BOD, $salary, $gender, $address, $ID_Card_No, $tel);
    $preState->execute();

    //$sql = "INSERT INTO comp3335.Employee 
    //    VALUES ('$user_id', '$Dept_id', '$firstName', '$lastName', '$BOD', '$salary', '$gender', '$address', '$ID_Card_No', '$tel')";

    if ($preState == TRUE) {
        header("Location: /main.php?msg=" . urlencode("Employee create successfully."));
    } else {
        header("Location: /main.php?msg=" . urlencode("Error occured."));
    }
} else {
    header("Location: /main.php?msg=" . urlencode("Missing Data."));
}

?>