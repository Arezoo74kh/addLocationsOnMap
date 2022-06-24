<?php

include "constants.php";
include BASE_PATH . "bootstrap/config.php";
include BASE_PATH . "libs/helpers.php";

try {
    $pdo = new PDO("mysql:dbname=$database_config->db;host={$database_config->host}",$database_config->user,$database_config->pass);
}catch (PDOException $e) {
    diePage('connection failed: ' . $e->getMessage());
}

include BASE_PATH . "libs/libLocations.php";

// echo "Connection to database is OK!";

