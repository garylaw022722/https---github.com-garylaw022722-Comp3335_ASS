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
        //htmlxxx
        $sql = "INSERT INTO Customer(email,CompanyName,tel) values (?,?,?)";
        $preState =$conn->prepare($sql);
        $preState->bind_param("sss",$email,$CompanyName, $tel);
        $email = $_POST['email'];
        $CompanyName = $_POST['CompanyName'];
        $tel = $_POST['tel'];
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