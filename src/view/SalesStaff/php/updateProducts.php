<?php
include_once('../../../php/db_connect.php');
if(isset(
    $_POST['pid'],
    $_POST['pName'],
    $_POST['price'],
    $_POST['description'],
    $_POST['create_by'],
    $_POST['codeVal'],
    $_POST['issueDate']))
    
    {

    $pid = $_POST['pid'];
    $pName = $_POST['pName'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    $create_by = $_POST['create_by'];
    $codeVal = $_POST['codeVal'];
    $issueDate = date('Y-m-d', strtotime($_POST['issueDate']));



    $sql = "UPDATE Product 
    SET pName = '$pName',
    price = '$price',
    description = '$description',
    create_by = '$create_by',
    codeVal = '$codeVal',
    issueDate = '$issueDate'
    Where pid = '$pid';";
    

    if ($con->query($sql) === TRUE) {
        header("Location:../main.php");
   
    } else {
        header( "Location:../main.php?msg=".urlencode("Wrong data format"));
    }

    }else{
        header( "Location:../main.php?msg=".urlencode("Miss Data"));
    }
?>