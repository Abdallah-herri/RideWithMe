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
    <title>Consulter Voyage</title>
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
                    <li class="active">
                        <a href="#">
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
            $sele = "SELECT * FROM voyage WHERE membre_id_a=".$_SESSION['id_m']." and date_depart>NOW() and etat=1";
            $result = $bd->query($sele);
                if($result->rowCount() > 0){
                	echo '<div class="container">';
                    while($row = $result->fetch())
                    {
                        echo '<div class="row ">
                                <div class="col-md-12 voyage">
                                    <div class="card">
                                        <div class="col-md-3">';
                        echo '<h3>Nom prenom</h3>';
                        echo '<h3>age</h3></div>';
                        echo '<div class="col-md-8">';
                        echo`id_voyage : `.$row['id_voyage'];
                        echo `ville_d : `.$row['ville_d'];
                        echo `ville_a : `.$row['ville_a'];
                        echo `distance : `.$row['distance'];
                        echo `temps_estm : `.$row['temps_estm'];
                        echo `tarif_unitaire : `.$row['tarif_unitaire'];
                        echo `date_depart : `.$row['date_depart'];
                        echo `heure_depart : `.$row['heure_depart'];
                        echo `nbr_personne : `.$row['nbr_personne'];
                        echo `description_voyage : `.$row['description_voyage'];
                        echo `taille_bagage : `.$row['taille_bagage'];
                        echo `tarif_voyage : `.$row['tarif_voyage'];
                        echo `etat : `.$row['etat'];
                        echo `adresse_rdv : `.$row['adresse_rdv'];
                        echo `membre_id_a : `.$row['membre_id_a'];
                        echo '</div>';
                         echo '<div class="col-md-12 text-center">
                                <form method="post" action="annulervoyage.php">
                                <button class="btn btn-danger" >Annuler le voyage</button>
                                <input type="hidden" name="id_v" value="'.$row['id_voyage'].'"/>
                                <input type="hidden" name="id_m" value="'.$_SESSION['id_m'].'"/>
                                </div>
                                </div>';
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
                                        <center><h1>Pas de voyage disponibles :(</h1></center>
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
