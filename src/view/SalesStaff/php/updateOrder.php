<?php
include('../../../php/db_connect.php');
if(isset(
    $_POST['ord_id'],
    $_POST['pid'],
    $_POST['quantity'],
    $_POST['totalPrice'],
    $_POST['orderAt'],
    $_POST['email'],))
    
    {
    $ord_id = $_POST['ord_id'];
    $pid = $_POST['pid'];
    $quantity = $_POST['quantity'];
    $totalPrice = $_POST['totalPrice'];
    $orderAt = $_POST['orderAt'];
    $email = $_POST['email'];


    $sql = "UPDATE Orders
    SET pid = '$pid',
    quantity = '$quantity',
    totalPrice = '$totalPrice',
    orderAt = '$orderAt',
    email = '$email'
    WHERE ord_id = '$ord_id';";

    if ($con->query($sql) === TRUE) {
        header("Location:../main.php");
   
    } else {
        header( "Location:../main.php?msg=".urlencode("Wrong data format"));
    }

    }else{
        header( "Location:../main.php?msg=".urlencode("Miss Data"));
    }
?>