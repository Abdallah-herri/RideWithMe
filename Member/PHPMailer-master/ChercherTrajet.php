<?php 
	session_start();
if(!isset($_SESSION['id_m']))
	header ('location: ../login.php');
?>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Chercher Voyage</title>
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
                    <li class="active">
                        <a href="#">
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
                <div class="col-md-12">
                    <div class="card">
                        <form id="RegisterValidation" action="ChercherTrajet.php" method="post">
                            <div class="card-header card-header-icon" data-background-color="red">
                                <i class="zmdi zmdi-playlist-plus"></i>
                            </div>
                            <div class="card-content">
                                <h4 class="card-title">Ajouter Trajet</h4>
                                <div class="form-group col-md-3">
                                    <label class="control-label">
                                                Ville de Départ
                                                <small>*</small>
                                            </label>
                                    <input id="autocomplete" class="form-control" name="ville_d" type="text" required="true" />
                                </div>
                                <div class="form-group col-md-3">
                                    <label class="control-label">
                                                Ville d'arrivé
                                                <small>*</small>
                                            </label>
                                    <input id="autocomplete2" class="form-control" name="ville_a" type="text" required="true" />
                                </div>
                                <div class="form-group col-md-3">
                                    <label class="control-label">
                                                Date de départ
                                                <small>*</small>
                                            </label>
                                    <input class="form-control" name="date_d" type="date" required="true" />
                                </div>
                                <div class="form-group col-md-3">
                                    <button type="submit" name="submit" class="btn btn-danger col-md-12">Chercher</button>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
                <?php
            include"../bd/Connection.php";
            if(isset($_POST['submit']))
            {
            $ville_d = $_POST['ville_d'];
            $ville_a = $_POST['ville_a'];
            $date_d = $_POST['date_d'];
            $sele = "SELECT * FROM voyage WHERE ville_d='$ville_d' AND ville_a='$ville_a' AND date_depart>='$date_d'";
            $result = $bd->query($sele);
                if($result->rowCount() > 0){
                	echo '<div class="container">';
                    while($row = $result->fetch())
                    {
                        echo '<div class="row ">
                                <div class="col-md-12">
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
                                <button class="btn btn-success">Réserver</button>
                                <button class="btn btn-info">Visiter le profil</button>
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

            }
            ?>
            </div>
        </div>
    </div>
    <script src="../js/search.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD3aPM67ddoocyNklBwJaparDZHlitsZ3M&libraries=places&callback=initAutocomplete" async defer></script>
    <script src="../js/sweetalert2.js"></script>
    <script>
        function consulter() {
            swal({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel!',
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                buttonsStyling: false,
                reverseButtons: true
            }).then((result) => {
                if (result.value) {
                    swal(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                    )
                    // result.dismiss can be 'cancel', 'overlay',
                    // 'close', and 'timer'
                } else if (result.dismiss === 'cancel') {
                    swal(
                        'Cancelled',
                        'Your imaginary file is safe :)',
                        'error'
                    )
                }
            })
        }

    </script>
</body>

</html>
