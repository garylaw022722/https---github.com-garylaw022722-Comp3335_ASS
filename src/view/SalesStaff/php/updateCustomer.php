<?php
include('../../../php/db_connect.php');
if(isset(
    $_POST['email'],
    $_POST['CompanyName'],
    $_POST['tel']))
    
    {
    $email = $_POST['email'];
    $CompanyName = $_POST['CompanyName'];
    $tel = $_POST['tel'];



    $sql = "UPDATE Customer
    SET CompanyName = '$CompanyName',
    tel = '$tel'
    WHERE email= '$email';";

    if ($con->query($sql) === TRUE) {
        header("Location:../main.php");
        
   
    } else {
        header( "Location:../main.php?msg=".urlencode("Wrong data format"));
    }

    }else{
        header( "Location:../main.php?msg=".urlencode("Miss Data"));
    }
?>