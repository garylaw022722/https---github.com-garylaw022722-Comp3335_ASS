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
    $_POST['issueDate']))
    
    {
        $conn = getConnection(json_decode($_SESSION[$uuid])); 
        $sql = "UPDATE Product SET pName = ?,price = ?,description = ? ,create_by = ?, codeVal = ?, issueDate = ? WHERE pid = ?;";
        $preState =$conn->prepare($sql);
        $preState->bind_param("sissisi",$pName,$price,$description,$create_by,$codeVal,$issueDate,$pid);
        $pName = $_POST['pName'];
        $price = $_POST['price'];
        $description = $_POST['description'];
        $create_by = $_POST['create_by'];
        $codeVal = $_POST['codeVal'];
        $issueDate = $_POST['issueDate'];
        $pid = $_POST['pid'];
        $preState->execute();

    if ( $preState == TRUE) {
        //success
        //go to main
        header("Location:../main.php");
   
    } else {
        header( "Location:../main.php?msg=".urlencode("Wrong data format"));
    }

    }else{
        header( "Location:../main.php?msg=".urlencode("Miss Data"));
    }






?>