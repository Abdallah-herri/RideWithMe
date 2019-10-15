<!doctype html>
<?php
	session_start();
if(!isset($_SESSION['id_m']))
	header ('location: ../login.php');
	// $id = $_GET['id_m'];

if(isset($_POST['appliquer'])) header('location: ChercherTrajet.php');
?>
    <!doctype html>
    <html lang="en">

    <head>
        <meta charset="utf-8" />
        <title>Mon Profil</title>
        <link href="../css/bootstrap.min.css" rel="stylesheet" />
        <link href="../css/material-dashboard.css" rel="stylesheet" />
        <link href="../css/font-awesome.min.css" rel="stylesheet">
        <link href="../css/material-design-iconic-font.css" rel="stylesheet" />
        <style>
            img {
                border-radius: 50%;
            }
            
            .tabulation {
                margin-left: 20px;
            }

        </style>
    </head>

    <body class="sidebar-mini">
        <?php
	include '../bd/Connection.php';

			$selectP = ("SELECT * FROM personne WHERE id_p=".$_SESSION['id_m']);
			$returnP = $bd->query($selectP);
			if($returnP->rowCount() > 0)
			$donneesP = $returnP->fetch();

			$selectM = ("SELECT * FROM membre WHERE id_m=".$_SESSION['id_m']);
			$returnM = $bd->query($selectM);
			if($returnM->rowCount() > 0)
			$donneesM = $returnM->fetch();
			// $date_expire = $donneesP["date_n"];
			// $date = new DateTime($date_expire);
			// $now = new DateTime();

			$date2=date_create($donneesP["date_n"]);
			$date1=date_create(date('Y-m-d'));
			$diff=date_diff($date2,$date1);

			// echo $date->diff($now)->format('Y-m-d');

			// $date = DateTime::createFromFormat('Y-m-d', $donneesP["date_n"]);
			// $age=date_diff(date('Y-m-d'),date('Y-m-d') ) / 365;
			// // $donneesP = $return->fetch();

?>

            <div class="wrapper">
                <div class="sidebar" data-active-color="red">
                    <div class="sidebar-wrapper">
                        <ul class="nav">
                            <li class="active">
                                <a href="#">
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
                            <li>
                                <a href="ConsulterTrajet.php">
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
                        <div class="container container-fluid">
                            <div class="col-md-12">

                                <div class="card">
                                    <div class="card-header card-header-icon" data-background-color="red">
                                        <i class="zmdi zmdi-account"></i>
                                    </div>
                                    <strong style="font-size: 20px;"><h3 class="card-title">Profil</h3></strong><br>
                                    <br>

                                    <div class="col-md-2">
                                        <img src="../img/membre.png" alt="membre" width="100" height="80">
                                    </div>


                                    <h3><strong>Nom </strong> :
                                        <?php echo $donneesP['nom']; ?>
                                        <span class="tabulation"><strong>Prenom </strong> : <?php echo $donneesP['prenom']; ?></span><br /> </h3>

                                    <h3><strong>Age </strong> :
                                        <?php echo $diff->y; ?>

                                        <?php
											if($donneesP['sexe']=='h')
												{
 												echo '<span class="tabulation"><strong>Sexe </strong> : <strong  style="font-family:Impact; font-size: 50px; color:#0000FF";>♂</strong>';
												}
												else
												{
												echo '<span class="tabulation"><strong>Sexe </strong> : <strong  style="font-family:Impact; font-size: 50px; color:#FF1493";>♀</strong>';

												}

										 ?>
                                            <br /> <br /></h3>


                                </div>

                                <div class="card">
                                    <div class="card-header card-header-icon" data-background-color="red">
                                        <i class="zmdi zmdi-account"></i>
                                    </div>
                                    <strong style="font-size: 20px;"><h3 class="card-title">Préférences</h3></strong><br>
                                    <br>

                                    <br>
                                    <div class="col-md-6">
                                    <?php
                                    if($donneesM['discussion'] == 1)
                                    {
                                        echo '<div class="col-md-2">';
                                        echo	'<img src="../img/disc.png" alt="discussion" width="100" height="80">';
                                        echo '</div>';
                                    }
                                    else
                                    {
                                        echo '<div class="col-md-2">';
                                        echo	'<img src="../img/nondisc.jpg" alt="discussion" width="100" height="80">';
                                        echo '</div>';
                                    }

                                    if($donneesM['ciguarette'] == 1)
                                    {
                                        echo '<div class="col-md-2">';
                                        echo	'<img src="../img/cig.png" alt="ciguarette" width="100" height="80">';
                                        echo '</div>';
                                    }
                                    else
                                    {
                                        echo '<div class="col-md-2">';
                                        echo '<img src="../img/noncig.png" alt="ciguarette" width="100" height="80">';
                                        echo '</div>';
                                    }

                                    if($donneesM['animal'] == 1)
                                    {
                                        echo '<div class="col-md-2">';
                                        echo '<img src="../img/anim.png" alt="animal" width="100" height="80">';
                                        echo '</div>';
                                    }
                                    else
                                    {
                                        echo '<div class="col-md-2">';
                                    echo	'<img src="../img/nonanim.jpg" alt="animal" width="100" height="80">';
                                    echo '</div>';
                                    }

                                    if($donneesM['musique'] == 1)
                                    {
                                    echo '<div class="col-md-2">';
                                    echo	'<img src="../img/mus.png" alt="musique" width="100" height="80">';
                                    echo '</div>';
                                    }
                                    else
                                    {
                                    echo '<div class="col-md-2">';
                                    echo	'<img src="../img/nonmus.jpg" alt="musique" width="100" height="80">';
                                    echo '</div>';
                                    }

                                    ?>
                                        
                                    </div>
                                   
                                    <div id="mo" class="col-md-6">
                                        
                                    </div>
                                     <br><br>
                                </div>
                            </div>
                            <div class="text-right">
                            <button class="btn btn-success " name="Modifier" onclick="modif();">Modifier</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </body>
    <script>
        function modif() {
            document.getElementById("mo").innerHTML="<form method=\"post\" action=\"Modifier.php\"><div class=\"form-group col-md-3\"><label class=\"control-label\">discussion<small>*</small></label><select class=\"form-control\" name=\"discussion\"><option value=\"1\">oui </option><option value=\"0\">non</option></select></div><div class=\"form-group col-md-3\"><label class=\"control-label\">ciguarette<small>*</small></label><select class=\"form-control\" name=\"ciguarette\"><option value=\"1\">oui </option><option value=\"0\">non</option></select></div><div class=\"form-group col-md-3\"><label class=\"control-label\">animal<small>*</small></label><select class=\"form-control\" name=\"animal\"><option value=\"1\">oui </option><option value=\"0\">non</option></select></div><div class=\"form-group col-md-3\"><label class=\"control-label\">musique<small>*</small></label><select class=\"form-control\" name=\"musique\"><option value=\"1\">oui </option><option value=\"0\">non</option></select></div> <div class=\"text-center\"><button class=\"btn btn-danger btn-simple\" name=\"Appliquer\"type=\"submit\" value=\" appliquer\">Appliquer</button></div></form>";
        }

    </script>





    </html>
