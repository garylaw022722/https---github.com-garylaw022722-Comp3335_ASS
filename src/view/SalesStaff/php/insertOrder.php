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
    $_POST['email'],))
    
    {

        $conn = getConnection(json_decode($_SESSION[$uuid])); 
        $sql = "INSERT INTO Orders(ord_id,pid,quantity,totalPrice,orderAt,email) values (?,?,?,?,?,?)";
        $preState =$conn->prepare($sql);
        $preState->bind_param("ssssss",$ord_id, $pid, $quantity, $totalPrice, $orderAt, $email);
        $ord_id = $_POST['ord_id'];
        $pid = $_POST['p_id'];
        $quantity = $_POST['quantity'];
        $totalPrice = $_POST['totalPrice'];
        $orderAt = $_POST['orderAt'];
        $email = $_POST['email'];
        $preState->execute();

    if($preState == true)
    {

      
      header("Location:../main.php");


    }
    else
    {

        header( "Location:../main.php?msg=".urlencode("Email should be unique"));
    } 


}else{
    header( "Location:../main.php?msg=".urlencode("Miss Data"));
}

?>