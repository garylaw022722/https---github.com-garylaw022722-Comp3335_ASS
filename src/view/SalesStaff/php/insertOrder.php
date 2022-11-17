<?php
include('../../../php/db_connect.php');
if(isset(
    $_POST['ord_id'],
    $_POST['p_id'],
    $_POST['quantity_id'],
    $_POST['email_id'],
    $_POST['totalPrice_id']))
    
    {
    $ord_id = $_POST['ord_id'];
    $p_id = $_POST['p_id'];
    $quantity_id = $_POST['quantity_id'];
    $email_id = $_POST['email_id'];
    $totalPrice_id = $_POST['totalPrice_id'];

    $sql = "INSERT INTO Orders(ord_id,pid,quantity,totalPrice,email)
     value ('$ord_id','$p_id', '$quantity_id', '$totalPrice_id', '$email_id')";

    $query= mysqli_query($con,$sql);
    $lastId = mysqli_insert_id($con);
    if($query ==true)
    {

      
      header("Location:../main.php");


    }
    else
    {
        //private key project id wrong
        header( "Location:../main.php?msg=".urlencode("Order ID and pid should be unique"));
    } 


}else{
    header( "Location:../main.php?msg=".urlencode("Miss Data"));
}

?>