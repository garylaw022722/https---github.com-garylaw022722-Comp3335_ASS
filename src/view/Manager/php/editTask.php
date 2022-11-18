<?php
include('../../../php/db_Connection.php');
session_start();
$uuid =  $_SESSION["id"];
if(isset(
    $_POST['task_id'],
    $_POST['project_id'],
    $_POST['assigner'],$_POST['assignee'],$_POST['details'],
    $_POST['end_date']
    )){
        $conn = getConnection(json_decode($_SESSION[$uuid])); 
        //htmlxxx
        $sql = "UPDATE Task SET assigner = ?,assignee = ?,details = ? ,end_date = ? WHERE task_id = ?;";
        $preState =$conn->prepare($sql);
        $preState->bind_param("ssssi",$assigner,$assignee,$details,$end_date,$task_id);
        $task_id = $_POST['task_id'];
        $project_id = $_POST['project_id'];
        $assigner = $_POST['assigner'];
        $assignee = $_POST['assignee'];
        $details = $_POST['details'];
        $end_date = $_POST['end_date'];
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