<?php
include('../../../php/db_connect.php');

if(isset($_POST['project_id'])){

    $project_id = $_POST['project_id'];
// sql to delete a record
$sql = "DELETE FROM Project WHERE project_id='$project_id'";

if ($con->query($sql) === TRUE) {
    header("Location:../main.php");
} else {
    header( "Location:../main.php?msg=".urlencode("Wrong data format"));
}

}else{
    header( "Location:../main.php?msg=".urlencode("Miss Data"));
}


?>