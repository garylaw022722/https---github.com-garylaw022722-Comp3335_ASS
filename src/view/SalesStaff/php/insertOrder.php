<?php
include_once('../../../php/db_connect.php');
if(isset(
    $_POST['ord_id'],
    $_POST['p_id'],
    $_POST['quantity'],
    $_POST['totalPrice'],
    $_POST['orderAt'],
    $_POST['email'],))
    
    {
    $ord_id = $_POST['ord_id'];
    $p_id = $_POST['p_id'];
    $quantity = $_POST['quantity'];
    $totalPrice = $_POST['totalPrice'];
    $orderAt = $_POST['orderAt'];
    $email = $_POST['email'];




    $sql = "INSERT INTO Orders(ord_id,pid,quantity,totalPrice,orderAt,email)
     VALUES ('$ord_id','$p_id', '$quantity', '$totalPrice', '$orderAt' ,'$email');";

    $query= mysqli_query($con,$sql);
    $lastId = mysqli_insert_id($con);
    if($query ==true)
    {

      
      header("Location:../main.php");


    }
    else
    {

        header( "Location:../main.php?msg=".urlencode("Order ID and pid should be unique"));
    } 


}else{
    echo "Missing Data";
}

?>