<?php
include('../../../php/db_connect.php');
if(isset(
    $_POST['task_id'],
    $_POST['project_id'],
    $_POST['assigner'],$_POST['assignee'],$_POST['details'],
    $_POST['end_date']
    )){
        $task_id = $_POST['task_id'];
        $project_id = $_POST['project_id'];
        $assigner = $_POST['assigner'];
        $assignee = $_POST['assignee'];
        $details = $_POST['details'];
        $end_date = $_POST['end_date'];

        $sql = "UPDATE Task 
        SET assigner = '$assigner',
        assignee = '$assignee',
        details = '$details' ,
        end_date = '$end_date' 
        WHERE task_id='$task_id'";

    if ($con->query($sql) === TRUE) {
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