<!doctype html>
<?php 
	session_start();
if(!isset($_SESSION['id_m']))
	header ('location: ../login.php');
?>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Ajouter Voyage</title>
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
                    <li class="active">
                        <a href="#">
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
                    <div class="col-md-12">
                        <div class="card">
                            <form id="RegisterValidation" action="AjouterVoyage.php" method="post">
                                <div class="card-header card-header-icon" data-background-color="red">
                                    <i class="zmdi zmdi-playlist-plus"></i>
                                </div>
                                <div class="card-content">
                                    <h4 class="card-title">Ajouter Trajet</h4>
                                    <div class="form-group col-md-12">
                                        <label class="control-label">
                                                Ville de départ
                                                <small>*</small>
                                            </label>
                                        <input id="autocomplete" class="form-control " name="ville_d" type="text" required="true" />
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label class="control-label">
                                                Ville d'arrivé
                                                <small>*</small>
                                            </label>
                                        <input id="autocomplete2" class="form-control" name="ville_a" type="text" required="true" />
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label class="control-label">
                                                Tarif (en euros)
                                                <small>*</small>
                                            </label>
                                        <input class="form-control" name="tarif_voyage" type="number" required="true" />
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label class="control-label">
                                                Temps éstimé
                                                <small>*</small>
                                            </label>
                                        <input class="form-control" name="temps_estm" type="time" required="true" />
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label class="control-label">
                                                Nombre de personne
                                                <small>*</small>
                                            </label>
                                        <input class="form-control" name="nbr_personne" type="number" required="true" />
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label class="control-label">
                                                Date de départ
                                                <small>*</small>
                                            </label>
                                        <input class="form-control" name="date_depart" type="date" required="true" />
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label class="control-label">
                                                Heure de départ
                                                <small>*</small>
                                            </label>
                                        <input class="form-control" name="heure_depart" type="time" required="true" />
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label class="control-label">
                                                Taille Bagage
                                                <small>*</small>
                                            </label>
                                        <select class="form-control" name="taille_bagage" title="" data-size="3">
                                                        <option value="1">Petit</option>
                                                        <option value="2">Moyen</option>
                                                        <option value="3">Grand</option>
                                            </select>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label class="control-label">
                                                Adresse RDV
                                                <small>*</small>
                                            </label>
                                        <input class="form-control" name="adresse_rdv" type="text" required="true" />
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label class="control-label">
                                                Adresse dépot
                                                <small>*</small>
                                            </label>
                                        <input class="form-control" name="adresse_depot" type="text" required="true" />
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label class="control-label">
                                                Modèle voiture
                                                <small>*</small>
                                            </label>
                                        <input class="form-control" name="modele_v" type="text" required="true" />
                                    </div>
                                    <br>
                                    <div class="text-right">
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
    <script src="../js/search.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD3aPM67ddoocyNklBwJaparDZHlitsZ3M&libraries=places&callback=initAutocomplete" async defer></script>
</body>
<?php
include '../bd/Connection.php';

if(isset($_POST['valid']))
{
    $req = $bd->prepare('INSERT INTO voyage(ville_d, ville_a, temps_estm, date_depart, heure_depart, nbr_personne, taille_bagage, tarif_voyage, adresse_rdv,adresse_depot,etat,membre_id_a) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 1,?)');

    $req->execute(array($_POST['ville_d'],$_POST['ville_a'],$_POST['temps_estm'],$_POST['date_depart'],$_POST['heure_depart'],$_POST['nbr_personne'],$_POST['taille_bagage'],$_POST['tarif_voyage'],$_POST['adresse_rdv'],$_POST['adresse_depot'],$_SESSION['id_m']));
    header ("location: ChercherTrajet.php");
    
}
?>
</html>
