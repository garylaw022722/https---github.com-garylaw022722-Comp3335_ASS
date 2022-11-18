<?php
include('../../../php/db_connect.php');
if(isset(
    $_POST['team_id'],
    $_POST['user_id'],$_POST['project_id'])){

        $team_id = $_POST['team_id'];
        $user_id = $_POST['user_id'];
        $project_id = $_POST['project_id'];
    
        $sql = "UPDATE Team 
        SET user_id = '$user_id',
        project_id = '$project_id'
        WHERE team_id='$team_id'";

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