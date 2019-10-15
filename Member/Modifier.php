<?php
include '../bd/Connection.php';
session_start();
  $nb=$bd->query("UPDATE membre SET ciguarette =".$_POST['ciguarette']."  WHERE id_m=" .$_SESSION['id_m'].";");
  $nb=$bd->query("UPDATE membre SET discussion =".$_POST['discussion']."  WHERE id_m=" .$_SESSION['id_m'].";");
  $nb=$bd->query("UPDATE membre SET musique =".$_POST['musique']."  WHERE id_m=" .$_SESSION['id_m'].";");
  $nb=$bd->query("UPDATE membre SET animal =".$_POST['animal']."  WHERE id_m=" .$_SESSION['id_m'].";");
header ("location: Profil.php");

?>