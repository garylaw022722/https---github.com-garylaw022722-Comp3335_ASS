<?php
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
function  getConnection($jsonData){
    try{

        $newConnection = new mysqli(
            $jsonData->host,
            $jsonData->user,
            $jsonData->pwd,
            $jsonData->database
        );
        return $newConnection;

    }catch(Exception $e){return "AccessDeline";}
}


?>