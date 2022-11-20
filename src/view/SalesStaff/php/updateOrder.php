<?php
include('../../../php/db_Connection.php');
session_start();
$uuid =  $_SESSION["id"];

if(isset(
    $_POST['ord_id'],
    $_POST['p_id'],
    $_POST['quantity'],
    $_POST['totalPrice'],
    $_POST['orderAt'],
    $_POST['email']))
    
    {
        $conn = getConnection(json_decode($_SESSION[$uuid])); 

        $sql = "UPDATE Orders SET pid = ?,quantity = ?,totalPrice = ?,orderAt = ?,email = ? WHERE ord_id= ?;";
        $preState =$conn->prepare($sql);
        $preState->bind_param("ssssss",$pid,$quantity,$totalPrice,$orderAt,$email,$ord_id);
        $ord_id = $_POST['ord_id'];
        $pid = $_POST['p_id'];
        $quantity = $_POST['quantity'];
        $totalPrice = $_POST['totalPrice'];
        $orderAt = $_POST['orderAt'];
        $email = $_POST['email'];
        $preState->execute();

    if ($preState == TRUE) {

        header("Location:../main.php");
   
    } else {
        header( "Location:../main.php?msg=".urlencode("Wrong data format"));
    }

    }else{
        header( "Location:../main.php?msg=".urlencode("Miss Data"));
    }






?>