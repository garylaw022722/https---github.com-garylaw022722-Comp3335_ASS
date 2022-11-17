<?php
include('../../../php/db_connect.php');

if(isset($_POST['task_id'])){

    $task_id = $_POST['task_id'];
// sql to delete a record
$sql = "DELETE FROM Task WHERE task_id='$task_id'";

if ($con->query($sql) === TRUE) {
    
    header("Location:../main.php");

} else {
    header( "Location:../main.php?msg=".urlencode("Wrong data format"));
}

}else{
    header( "Location:../main.php?msg=".urlencode("Miss Data"));
}


?>