<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../img/logo.png" />
    <link rel="icon" type="image/png" href="img/logo.png" />
    <title>Créer Compte</title>
    <link href="css/bootstrap.min.css" rel="stylesheet" />
    <link href="css/material-dashboard.css" rel="stylesheet" />
    <link href="monCss.css" rel="stylesheet" />

    <link rel="stylesheet" type="text/css" href="../css/material-design-iconic-font.css" />
</head>

<body>
    <nav class="navbar navbar-primary navbar-transparent navbar-absolute">
        <div class="container">
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a href="login.php">
                        <i class="zmdi zmdi-account"></i> Connecter
                    </a>
                    <li>
                        <a href="Signup.php">
                            <i class="zmdi zmdi-account"></i> Créer un compte
                        </a>
                    </li>
            </ul>
        </div>
    </nav>
    <div class="form-page wrapper wrapper-full-page">
        <div class="container">
            <div class="col-md-10 col-md-offset-1">
                <div class="card">
                   <form id="RegisterValidation" action="search.php" method="post">
                        <h1 class="text-center title"> Rechercher un trajet</h1>
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
                            <button type="submit" name="submit" class="btn btn-fill btn-danger" style="width:200px;">Submit</button>
                        </div>
                    </form> 
                </div>
            </div>
        </div>
            <div class="container">


                <?php
            include"bd/Connection.php";
            if(isset($_POST['submit']))
            {
            $ville_d = $_POST['ville_d'];
            $ville_a = $_POST['ville_a'];
            $date_d = $_POST['date_d'];
            $sele = "SELECT * FROM voyage WHERE ville_d='$ville_d' AND ville_a='$ville_a' AND date_depart>='$date_d' ";
            $result = $bd->query($sele);

                if($result->rowCount() > 0){
                    while($row = $result->fetch())
                    {
                        echo '<div class="row">
                                <div class="col-md-12">
                                    <div class="card">
                                        ';
                         /*echo '<h3>Nom prenom</h3>';*/
                         /*echo '</div>';*/
                        echo '<div class="col-md-8">';
                        echo '<div id="exemple_2"><h4><p> ville d :<strong>'.$row['ville_d'].'</strong><br/>
                        ville a :<strong>'.$row['ville_a'].'</strong></p><h4></div>' ;

                        // echo `distance : `.$row['distance'];
                        // echo `temps_estm : `.$row['temps_estm'];
                        // echo `tarif_unitaire : `.$row['tarif_unitaire'];
                        echo '<div id="exemple_3"><h5><p><strong> Le : </strong>'.$row['date_depart'].
                        // echo `date_depart : `.$row['date_depart'];
                        '<strong> à :</strong>'.$row['heure_depart'].'</p></h5></div>' ;
                        // echo `heure_depart : `.$row['heure_depart'];
                        // echo `nbr_personne : `.$row['nbr_personne'];
                        // echo `description_voyage : `.$row['description_voyage'];
                        // echo `taille_bagage : `.$row['taille_bagage'];
                        echo '<div id="exemple_4"><center><h5><p>'.$row['tarif_voyage'].'<strong> €/par place</strong></p><h5><center></div>' ;
                        // echo `tarif_voyage : `.$row['tarif_voyage'];
                        // echo `etat : `.$row['etat'];
                        // echo `adresse_rdv : `.$row['adresse_rdv'];
                        echo '<div id="exemple_1"><center><h3><p>'.$row['membre_id_a'].'</p></h3></center></div>' ;
                        // echo `membre_id_a : `.$row['membre_id_a'];
                        echo '</div></div></div></div>';
                    }
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
    <script src="js/search.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD3aPM67ddoocyNklBwJaparDZHlitsZ3M&libraries=places&callback=initAutocomplete" async defer></script>
</body>
