<?php

require ('conf.php'); //or include or require_once
go_home();

//PDO * PHP Data Objects           
try{
	$conn = new PDO("mysql:host=$server;dbname=test",$user,$pass);
	$conn -> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	echo "<p>PDO ühendus on olemas</p>";
}       

catch(PDOException $err) {
	echo "PDOga halvasti:".$err -> getMessage();
}    

$conn = null;   
?>  