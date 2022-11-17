<?php
include('../../../php/db_connect.php');

if(isset($_POST['team_id'])){

    $team_id = $_POST['team_id'];
// sql to delete a record
$sql = "DELETE FROM Team WHERE team_id='$team_id'";

if ($con->query($sql) === TRUE) {
    
    header("Location:../main.php");

} else {
    header( "Location:../main.php?msg=".urlencode("Wrong data format"));
}

}else{
    header( "Location:../main.php?msg=".urlencode("Miss Data"));
}


?>