<?php
include('../../../php/db_Connection.php');
session_start();
$uuid =  $_SESSION["id"];
if(isset(
    $_POST['pid'],
    $_POST['pName'],
    $_POST['price'],
    $_POST['description'],
    $_POST['create_by'],
    $_POST['codeVal'],
    $_POST['issueDate'],))

    {

        $conn = getConnection(json_decode($_SESSION[$uuid])); 
        //htmlxxx
        $sql = "INSERT INTO Product(pid,pName,price,description,create_by,codeVal,issueDate) values (?,?,?,?,?,?,?)";
        $preState =$conn->prepare($sql);
        $preState->bind_param("sssssss",$pid, $pName, $price, $description, $create_by, $codeVal,$issueDate);
        $pid = $_POST['pid'];
        $pName = $_POST['pName'];
        $price = $_POST['price'];
        $description = $_POST['description'];
        $create_by = $_POST['create_by'];
        $codeVal = $_POST['codeVal'];
        $issueDate = date('Y-m-d', strtotime($_POST['issueDate']));
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