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
    }elseif(isset($params['keyword'])){
        $condition = "where verified = 1 and title like '%{$params['keyword']}%'";
    }
    $sql = "SELECT * FROM `locations` $condition";
    $stmt =$pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_OBJ);
}

function getLocation($id){
    global $pdo;
    $sql = "SELECT * FROM `locations` where id = :id";
    $stmt =$pdo->prepare($sql);
    $stmt->execute([':id' => $id]);
    return $stmt->fetch(PDO::FETCH_OBJ);
}

function toggleStatus($id){
    global $pdo;
    $sql = "UPDATE `locations` SET verified = 1 - verified WHERE id = :id";
    $stmt =$pdo->prepare($sql);
    $stmt->execute([':id' => $id]);
    return $stmt->rowCount();
}