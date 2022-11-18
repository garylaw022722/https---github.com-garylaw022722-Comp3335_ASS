<?php
include_once('../../../php/db_connect.php');
if(isset(
    $_POST['email'],
    $_POST['CompanyName'],
    $_POST['tel']))
    
    {
    $email = $_POST['email'];
    $CompanyName = $_POST['CompanyName'];
    $tel = $_POST['tel'];



    $sql = "INSERT INTO Customer(email,CompanyName,tel)
     VALUES ('$email', '$CompanyName', '$tel');";

    $query= mysqli_query($con,$sql);
    $lastId = mysqli_insert_id($con);
    if($query ==true)
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