<?php 
try {
    $pdo = new PDO("mysql:dbname=projeto-crud2;host=localhost", "root", "");
} catch(PDOException $e) {
    echo "ERRO: ".$e->getMessage();
}

global $pdo;