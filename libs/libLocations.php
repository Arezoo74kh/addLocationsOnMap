<?php

function insertLocation($data){
    global $pdo;
    $sql = "INSERT INTO `locations` (`title`, `type`, `lat`, `lng`) VALUES (:title, :type, :lat, :lng)";
    $stmt =$pdo->prepare($sql);
    $stmt->execute([':title' => $data['title'],':type' => $data['type'],':lat' => $data['lat'],':lng' => $data['lng']]);
    return $stmt->rowCount();
}

function getLocations($params = []){
    global $pdo;
    $condition = '';
    if(isset($params['verified']) and in_array($params['verified'] , ['0','1'])){
        $condition = "where verified = {$params['verified']}";
    }
    $sql = "SELECT * FROM `locations` $condition";
    $stmt =$pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_OBJ);
}