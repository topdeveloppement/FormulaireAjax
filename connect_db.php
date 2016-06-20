<?php 
//Connection à la base de donnée
try {
	$db = new PDO('mysql:host=localhost;dbname=users','root','');
} catch (PDOException $e) {
	die('Erreur: '.$e->getMessage());	
}


?>