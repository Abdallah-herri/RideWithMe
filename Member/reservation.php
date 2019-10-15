<?php
session_start();
include"../bd/Connection.php";
$date = date('Y-m-d');
$m=$bd->query("INSERT INTO reservation(date_reservation, tarif_reservation, etat_reservation, Voyage_id_voyage, Membre_id_m) VALUES(NOW(),".$_POST['tarif'].",1,".$_POST['id_v'].",".$_POST['id_m'].")");
header ("location: Profil.php");

?>