<?php

function insertLocation($data){
    global $pdo;
    $sql = "INSERT INTO `locations` (`title`, `type`, `lat`, `lng`) VALUES (:title, :type, :lat, :lng)";
    $stmt =$pdo->prepare($sql);
    $stmt->execute([':title' => $data['title'],':type' => $data['type'],':lat' => $data['lat'],':lng' => $data['lng']]);
    return $stmt->rowCount();
}
