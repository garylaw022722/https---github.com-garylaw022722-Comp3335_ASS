<?php
include('../../../php/db_Connection.php');
session_start();
$uuid =  $_SESSION["id"];

if(isset(
    $_POST['email'],
    $_POST['CompanyName'],
    $_POST['tel']))
    
    {
        $conn = getConnection(json_decode($_SESSION[$uuid])); 

        $sql = "UPDATE Customer SET CompanyName = ?,tel = ? WHERE email=?;";
        $preState =$conn->prepare($sql);
        $preState->bind_param("sis",$CompanyName,$tel,$email);
        $CompanyName = $_POST['CompanyName'];
        $tel = $_POST['tel'];
        $email = $_POST['email'];
        $preState->execute();

    if ( $preState == TRUE) {

        header("Location:../main.php");
   
    } else {
        header( "Location:../main.php?msg=".urlencode("Wrong data format"));
    }

    }else{
        header( "Location:../main.php?msg=".urlencode("Miss Data"));
    }






?>