<?php
try{
	$bd = new PDO('mysql:host=127.0.0.1;dbname=blablacar;charset=utf8','root','');
}catch(Exception $e){
	die('Erreur '.$e->getMessagr());
} 
?>