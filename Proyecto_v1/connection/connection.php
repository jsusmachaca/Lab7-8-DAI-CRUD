<?php
$server = "localhost";
$user = "root";
$passwd = "godylody31";
$database = "PRODUCTS";

try{
     $conn = new PDO("mysql:host=$server;dbname=$database", $user, $passwd);
     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 

} catch(PDOException $e){
     echo "Ha ocurrido un error con la base de datos". $e->getMessage();
}

?>

