<?php
include('../../../php/db_connect.php');
if(isset(
    $_POST['project_id'],
    $_POST['title_id'],$_POST['task_id'],$_POST['team_id'])){
        $project_id = $_POST['project_id'];
        $title_id = $_POST['title_id'];
        $task_id = $_POST['task_id'];
        $team_id = $_POST['team_id'];

        $sql = "UPDATE Project 
        SET title = '$title_id',
        task_id = '$task_id',
        team_id = '$team_id' 
        WHERE project_id='$project_id'";

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