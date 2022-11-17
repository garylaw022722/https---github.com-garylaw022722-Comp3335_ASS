<?php

function  getConnection($jsonData){
    $newConnection = new mysqli(
        $jsonData->host,
        $jsonData->user,
        $jsonData->pwd,
        $jsonData->database
    );
    return $newConnection;
}


?>