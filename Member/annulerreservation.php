<?php
include '../bd/Connection.php';
require('PHPMailer-master/PHPMailerAutoload.php');
session_start();
$id_v=$_POST['id_v'];
$id_m=$_POST['id_m'];
echo $id_v." ".$id_m;
$m=$bd->query("SELECT Membre_id_m,ville_d,ville_a,date_depart from voyage v,reservation r where Voyage_id_voyage=id_voyage && etat_reservation=1 && membre_id_a=".$id_m." and id_voyage=".$id_v);

while($fet1=$m->fetch())
{
    $n=$bd->query("SELECT email from personne where id_p=".$fet1['Membre_id_m']);
    $fet2=$n->fetch();
    $mail             = new PHPMailer();
    $mail->IsSMTP(); 
    $mail->SMTPDebug  = 1;                   
    $mail->SMTPAuth   = true;                  
    $mail->SMTPSecure = 'ssl';                 
    $mail->Host       = "smtp.gmail.com";     
    $mail->Port       = 465; 
    $mail->IsHTML(true);               
    $mail->Username   = "Safe.AirlinesDz@gmail.com";  
    $mail->Password   = "Safe.Airlines";           
    $mail->SetFrom("Safe.AirlinesDz@gmail.com");
    $mail->Subject = "Annulation voyage";
    $mail->Body= "Votre Réservation du voyage allant de ".$fet1['ville_d']." à ".$fet1['ville_a']." a été annulé";
    $mail->AddAddress($fet2['email']);
    $mail->Send();
    $o=$bd->query("update reservation set etat_reservation=0 where Membre_id_m=".$id_m." and Voyage_id_voyage=".$id_v);
}
header("location: ConsulterTrajet.php");

?>