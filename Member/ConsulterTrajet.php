<!doctype html>
<?php 
	session_start();
if(!isset($_SESSION['id_m']))
	header ('location: ../login.php');
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Consulter Trajet</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet" />
    <link href="../css/material-dashboard.css" rel="stylesheet" />
    <link href="../css/font-awesome.min.css" rel="stylesheet">
    <link href="../css/material-design-iconic-font.css" rel="stylesheet" />
</head>

<body class="sidebar-mini">
    <div class="wrapper wrapper-full-page">
        <div class="sidebar" data-active-color="red">
            <div class="sidebar-wrapper">
                <ul class="nav">
                    <li>
                        <a href="Profil.php">
                            <i class="zmdi zmdi-account"></i>
                            <p> Mon profil</p>
                        </a>
                    </li>
                    <li>
                        <a href="logout.php">
                            <i class="zmdi zmdi-power"></i>
                            <p> Se déconnecter</p>
                        </a>
                    </li>
                </ul>
                <ul class="nav">
                    <li>
                        <a href="ChercherTrajet.php">
                            <i class="zmdi zmdi-search"></i>
                            <p>Rechercher un voyage</p>
                        </a>
                    </li>
                    <li class="active">
                        <a href="#">
                            <i class="zmdi zmdi-menu"></i>
                            <p>Consulter mes covoit</p>
                        </a>
                    </li>
                    <li>
                        <a href="AjouterVoyage.php">
                            <i class="zmdi zmdi-playlist-plus"></i>
                            <p>Proposer un covoit</p>
                        </a>
                    </li>
                    <li>
                        <a href="ConsulterVoyage.php">
                            <i class="zmdi zmdi-swap"></i>
                            <p>Consulter mes voyages</p>
                        </a>
                    </li>
                    <li>
                        <a href="AjouterVoiture.php">
                            <i class="zmdi zmdi-car"></i>
                            <p>Ajouter une voiture</p>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="main-panel">
            <div class="content">
                <div class="container-fluid">
                    <?php
            include"../bd/Connection.php";

$sele = "SELECT * FROM voyage v,reservation r WHERE Membre_id_m=".$_SESSION['id_m']." and Voyage_id_voyage=id_voyage and etat_reservation=1 order by date_depart";
                    $result = $bd->query($sele);

                if($result->rowCount() > 0){
                	echo '<div class="container">';
                    while($row = $result->fetch())
                    {


											$calculeNote = ("SELECT AVG(note) as note FROM avis WHERE membre_donné =".$row['membre_id_a']);
											$note = $bd->query($calculeNote);
											$moyen = $note->fetch();

											$calculeAvis = ("SELECT COUNT(*) as avis FROM avis WHERE membre_donné =".$row['membre_id_a']);
											$avis = $bd->query($calculeAvis);
											$nbAvis = $avis->fetch();

											$selectP = ("SELECT * FROM personne WHERE id_p=".$row['membre_id_a']);
											$returnP = $bd->query($selectP);
											if($returnP->rowCount() > 0)
											$donneesP = $returnP->fetch();

											$selectM = ("SELECT * FROM membre WHERE id_m=".$row['membre_id_a']);
											$returnM = $bd->query($selectM);
											if($returnM->rowCount() > 0)
											$donneesM = $returnM->fetch();


											$date2=date_create($donneesP["date_n"]);
											$date1=date_create(date('Y-m-d'));
											$diff=date_diff($date2,$date1);




		?>










                        <div class="row ">
                                <div class="col-md-12">
                                    <div class="card">

                        <div class="col-md-13">







												<!-- <div class="col-md-2">
														<img src="../img/membre.png" alt="membre" width="100" height="80">
												</div> -->

</br>
												<div class="col-md-2">
														<img src="../img/membre.png" alt="membre" width="100" height="80">
												</div>
												<h3><span class="tabulation"><?php echo$donneesP['nom'];?></span>
												<span class="tabulation"><?php echo$donneesP['prenom'];?></span>
												 <span class="tabulation"><?php echo$diff->y;?>ans </span>

														<?php
					if($donneesP['sexe']=='h')
						{
						echo '<span class="tabulation"> <strong  style="font-family:Impact; font-size: 50px; color:#0000FF";>♂</strong></span>';
						}
						else
						{
						echo '<span class="tabulation"> <strong  style="font-family:Impact; font-size: 50px; color:#FF1493";> ♀ </strong></span>';

						}

					 if($moyen['note']=='')
		  				echo '0<strong>/</strong>5 <span class="fa fa-star checked" style= color:#FFD700	;></span><span style = color:#808080;> - '.$nbAvis['avis'].' avis</span>';
					 else
					 		echo round($moyen['note'], 1).'<strong>/</strong>5 <span class="fa fa-star checked" style= color:#FFD700	;></span><span style = color:#808080;> - '.$nbAvis['avis'].' avis</span>';
						?>

						<span class="tabulation text-right"><?php echo $row['tarif_voyage'].' € / par place';?> </span>

															 <br /><br /></h3>

					 <div class="col-md-offset-4">
<h4>
						 Le<strong> <?php echo date("D,d-M-Y", strtotime($row['date_depart'])).'</strong> à <strong>'.date("H:i", strtotime($row['heure_depart']));?> </strong>
						 de<strong> <?php echo $row['ville_d'].'</strong> à <strong>'.$row['ville_a'];?> </strong>
</h4>









												<div class="col-md-6">
													<center>
												<?php
												if($donneesM['discussion'] == 1)
												{
														echo '<div class="col-md-3">';
														echo	'<img src="../img/disc.png" alt="discussion" width="100" height="80">';
														echo '</div>';
												}
												else
												{
														echo '<div class="col-md-3">';
														echo	'<img src="../img/nondisc.jpg" alt="discussion" width="100" height="80">';
														echo '</div>';
												}

												if($donneesM['ciguarette'] == 1)
												{
														echo '<div class="col-md-3">';
														echo	'<img src="../img/cig.png" alt="ciguarette" width="100" height="80">';
														echo '</div>';
												}
												else
												{
														echo '<div class="col-md-3">';
														echo '<img src="../img/noncig.png" alt="ciguarette" width="100" height="80">';
														echo '</div>';
												}

												if($donneesM['animal'] == 1)
												{
														echo '<div class="col-md-3">';
														echo '<img src="../img/anim.png" alt="animal" width="100" height="80">';
														echo '</div>';
												}
												else
												{
														echo '<div class="col-md-3">';
												echo	'<img src="../img/nonanim.jpg" alt="animal" width="100" height="80">';
												echo '</div>';
												}

												if($donneesM['musique'] == 1)
												{
													echo '<div class="col-md-3">';
												echo	'<img src="../img/mus.png" alt="musique" width="100" height="80">';
												echo '</div>';
												}
												else
												{
												echo '<div class="col-md-3">';
												echo	'<img src="../img/nonmus.jpg" alt="musique" width="100" height="80">';
												echo '</div>';
												}

												?>
</center>
												</div></div></div>


<?php
                        echo '</div>';
                        echo '<div class="col-md-12 text-center">
                                <form method="post" action="noter.php">
                                    <button class="btn btn-info">noter le conducteur</button>
                                    <input type="hidden" name="id_v" value="'.$row['membre_id_a'].'"/>
                                    <input type="hidden" name="id_m" value="'.$_SESSION['id_m'].'"/>
                                    </form>
                                </div>';
                         echo '';
                        echo '      </div>
                                </div>
                            </div>';
                    }
                    echo '</div>';
                }
                else
                {
                    echo '<div class="row">
                                    <div class="col-md-12">
                                        <div class="card">
                                        <h1>Pas de voyage disponibles :(
                                        </div>
                                    <div>
                                </div>';
                }

            
            ?>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
