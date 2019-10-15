<html lang="en">
    <?php
if (isset($_POST['valid'])) 
{
	include "bd/Connection.php";
	$nom=$_POST['nom'];
	$prenom=$_POST['prenom'];
	$date_n=$_POST['date_n'];
	$num_tel=$_POST['num_tel'];
	$sexe=$_POST['sexe'];
	$ville=$_POST['ville'];
	$code_p=$_POST['code_p'];
	$pays=$_POST['pays'];
	$email=$_POST['email'];
	$mdp=$_POST['mdp'];
    $animal=$_POST['animal']; 
    $ciguarette=$_POST['ciguarette']; 
    $discussion=$_POST['discussion']; 
    $musique=$_POST['musique'];
	$v=$bd->prepare('select email from personne where email=? ');
	$v->execute(array($email));
	if ($v->rowCount()>0) 
	{
        header("loaction: Signup.php");
	}
	else
	{
		$m=$bd->prepare('INSERT INTO personne( nom, prenom, date_n, num_tel, sexe, ville, code_p, pays ,email) VALUES (?,?,?,?,?,?,?,?,?)');
		$m->execute(array($nom,$prenom,$date_n,$num_tel,$sexe,$ville,$code_p,$pays,$email));
		$v=$bd->prepare('select id_p from personne where email=? ');
		$v->execute(array($email));
		$fet=$v->fetch();
		$m3=$bd->prepare('INSERT INTO membre(id_m,mdp, discussion, ciguarette, animal, musique) VALUES (?,?,?,?,?,?)');
		$m3->execute(array($fet['id_p'],$mdp,$discussion,$ciguarette,$animal,$musique));
        $_POST = array();
        session_start();
        session_unset();
        session_destroy();
        session_start();
        $_SESSION['id_m']=$fet['id_p'];
        $_SESSION['email']=$_POST['email'];
        $_SESSION['mdp']=$_POST['mdp'];
        header ('location: Member/ChercherTrajet.php');
	}
}
?>
<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="img/logo.png" />
    <link rel="icon" type="image/png" href="img/logo.png" />
    <title>Créer Compte</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    <link href="css/bootstrap.min.css" rel="stylesheet" />
    <link href="css/material-dashboard.css" rel="stylesheet" />
    <link href="css/demo.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="css/material-design-iconic-font.css" />
</head>

<body>
    <nav class="navbar navbar-primary navbar-transparent navbar-absolute">
        <div class="container">
            <ul class="nav navbar-nav navbar-right">
                <li class="">
                    <a href="login.php">
                            Se Connecter
                        </a>
                </li>
                <li>
                    <a href="search.php">
                            Connecter comme invité
                        </a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="wrapper wrapper-full-page">
        <div class="form-page">
            <div class="container">
                <div class="col-md-10 col-md-offset-1">
                    <div class="card">
                        <form id="RegisterValidation" action="Signup.php" method="post">
                            <h1 class="title">
                                <center>Création d'un compte</center>
                            </h1>
                            <div class="form-group col-md-12">
                                <label class="control-label">
                                                Nom
                                                <small>*</small>
                                            </label>
                                <input class="form-control" name="nom" type="text" required="true" value="<?php if(!empty($_POST))echo $_POST['nom']; ?>"/>
                            </div>
                            <div class="form-group col-md-12">
                                <label class="control-label">
                                                Prénom
                                                <small>*</small>
                                            </label>
                                <input class="form-control" name="prenom" type="text" required="true" value="<?php if(!empty($_POST))echo $_POST['prenom']; ?>"/>
                            </div>
                            <div class="form-group col-md-12">
                                <label class="control-label">
                                                Adresse électronique
                                                <small>*</small>
                                            </label>
                                <input class="form-control" name="email" type="email" required="true" />
                            </div>
                            <?php if(!empty($_POST))echo '<div class="col-md-12 btn-danger"> Email existe déja</div>'; ?>
                            <div class="form-group col-md-12">
                                <label class="control-label">
                                                Mot de passe
                                                <small>*</small>
                                            </label>
                                <input class="form-control" name="mdp" type="password" required="true" value="<?php if(!empty($_POST))echo $_POST['mdp']; ?>"/>
                            </div>
                            <div class="form-group col-md-12">
                                <label class="control-label">
                                                Date de naissance
                                                <small>*</small>
                                            </label>
                                <input class="form-control" name="date_n" type="date" required="true" value="<?php if(!empty($_POST))echo $_POST['date_n']; ?>"/>
                            </div>
                            <div class="form-group col-md-12">
                                <label class="control-label">
                                                Sexe
                                                <small>*</small>
                                            </label>
                                <select class="form-control" name="sexe">
                                                        <option value="h">Homme </option>
                                                        <option value="m">Femme</option>
                                                    </select>
                            </div>
                            <div class="form-group col-md-12">
                                <label class="control-label">
                                                téléphone
                                                <small>*</small>
                                            </label>
                                <input class="form-control" name="num_tel" type="number" required="true" value="<?php if(!empty($_POST))echo $_POST['num_tel']; ?>"/>
                            </div>
                            <div class="form-group col-md-12">
                                <label class="control-label">
                                                Ville
                                                <small>*</small>
                                            </label>
                                <input class="form-control" name="ville" type="text" required="true" value="<?php if(!empty($_POST))echo $_POST['ville']; ?>"/>
                            </div>
                            <div class="form-group col-md-12">
                                <label class="control-label">
                                                Pays
                                                <small>*</small>
                                            </label>
                                <input class="form-control" name="pays" type="text" required="true" value="<?php if(!empty($_POST))echo $_POST['pays']; ?>"/>
                            </div>
                            <div class="form-group col-md-12">
                                <label class="control-label">
                                                Code Postal
                                                <small>*</small>
                                            </label>
                                <input class="form-control" name="code_p" type="number" required="true" value="<?php if(!empty($_POST))echo $_POST['code_p']; ?>"/>
                            </div>
                            <div class="form-group col-md-12">
                                <label class="control-label">
                                                Vous aimez les discussions ?
                                                <small>*</small>
                                            </label>
                                <select class="form-control" name="discussion">
                                                        <option value="0">Non </option>
                                                        <option value="1">Oui</option>
                                                    </select>
                            </div>
                            <div class="form-group col-md-12">
                                <label class="control-label">
                                                Vous aimez éctouter de la musique quand ti voyage ?
                                                <small>*</small>
                                            </label>
                                <select class="form-control" name="musique">
                                                        <option value="0">Non </option>
                                                        <option value="1">Oui</option>
                                                    </select>
                            </div>
                            <div class="form-group col-md-12">
                                <label class="control-label">
                                                Vous acceptez voyager avec des gens qui fument ?
                                                <small>*</small>
                                            </label>
                                <select class="form-control" name="ciguarette">
                                                        <option value="0">Non </option>
                                                        <option value="1">Oui</option>
                                                    </select>
                            </div>
                            <div class="form-group col-md-12">
                                <label class="control-label">
                                                Vous acceptez voyager avec des gens qui ont des animeaux ?
                                                <small>*</small>
                                            </label>
                                <select class="form-control" name="animal">
                                                        <option value="0">Non </option>
                                                        <option value="1">Oui</option>
                                                    </select>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-success btn-fill" name="valid">Valider</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>


