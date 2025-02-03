<?php 

$host = "localhost";
$dbname = "jardin";
$username = "postgres";
$password = "mysqlpassword";

try{
    $db = new PDO("pgsql:host=$host;dbname=$dbname",$username,$password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
    echo "Connexion échouée : ".$e->getMessage();
}
