<!doctype html>
<?php
session_start();
if(!isset($_SESSION['id_m']))
	header ('location: ../login.php');
?>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Ajouter Voiture</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet" />
    <link href="../css/material-dashboard.css" rel="stylesheet" />
    <link href="../css/font-awesome.min.css" rel="stylesheet">
    <link href="../css/material-design-iconic-font.css" rel="stylesheet" />
</head>

<body class="sidebar-mini">
    <div class="wrapper">
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
                    <li>
                        <a href="ConsulterVoyage.php">
                            <i class="zmdi zmdi-swap"></i>
                            <p>Consulter mes voyages</p>
                        </a>
                    </li>
                    <li class="active">
                        <a href="#">
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
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <form id="RegisterValidation" action="AjouterVoiture.php" method="post">
                                    <div class="card-header card-header-icon" data-background-color="red">
                                        <i class="zmdi zmdi-car"></i>
                                    </div>
                                    <div class="card-content">
                                        <h4 class="card-title">Ajouter Voiture</h4>
                                        <div class="form-group col-md-12">
                                            <label class="control-label">
                                                Marque
                                                <small>*</small>
                                            </label>
                                            <input class="form-control " name="marque_v" type="text" required="true" />
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label class="control-label">
                                                Modele
                                                <small>*</small>
                                            </label>
                                            <input class="form-control" name="modele_v" type="text" required="true" />
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label class="control-label">
                                                Immatruculation
                                                <small>*</small>
                                            </label>
                                            <input class="form-control" name="immatruculation" type="text" required="true" />
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label class="control-label">
                                                Couleur
                                                <small>*</small>
                                            </label>
                                            <input class="form-control" name="couleur_v" type="text" required="true" />
                                        </div>
                                        <div class="form-footer text-right">
                                            <button type="submit" class="btn btn-success btn-fill" name="valid">Valider</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<?php
include '../bd/Connection.php';
if(isset($_POST['valid']))
{
    $req = $bd->prepare('INSERT INTO Voiture(marque_v, modele_v, immatruculation, couleur_v ,membre_id_m) VALUES (?, ?, ?, ?, ?)');
    $req->execute(array($_POST['marque_v'],$_POST['modele_v'],$_POST['immatruculation'],$_POST['couleur_v'],intval($_SESSION['id_m'])));
        $_POST=array();
}
?>

</html>
