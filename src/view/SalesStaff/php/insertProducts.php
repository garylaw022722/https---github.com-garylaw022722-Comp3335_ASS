<?php
include_once('../../../php/db_connect.php');

    $pid = $_POST['pid'];
    $pName = $_POST['pName'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    $create_by = $_POST['create_by'];
    $codeVal = $_POST['codeVal'];
    $issueDate = date('Y-m-d', strtotime($_POST['issueDate']));


    $sql = "INSERT INTO Product(pid,pName,price,description,create_by,codeVal,issueDate)
     VALUES ('$pid','$pName', '$price', '$description', '$create_by', '$codeVal','$issueDate');";


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






?>