<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Se connecter</title>
    <link href="css/demo.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet" />
    <link href="css/material-dashboard.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="css/material-design-iconic-font.css" />
</head>

<body>
    <nav class="navbar navbar-primary navbar-transparent navbar-absolute">
        <div class="container">
            <ul class="nav navbar-nav navbar-right">
                <li class="">
                    <a href="Signup.php">
                            Créer un compte
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
    <div>
        <div class="form-page">
            <div class="wrapper wrapper-full-page">
                <div class="container">
                    <div class="col-md-4  col-md-offset-4">
                        <form method="post" action="login.php">
                            <div class="card">
                                <center>
                                    <img id="login-image" src="img/logo.png">
                                </center>
                                    <div class="input-group col-md-11">
                                    <span class="input-group-addon">
                                                <i class="zmdi zmdi-email"></i>
                                            </span>
                                    <div class="form-group label-floating">
                                        <label class="control-label">Email</label>
                                        <input type="email" name="email" class="form-control" required="true">
                                    </div>
                                </div>
                                <div class="input-group col-md-11">
                                    <span class="input-group-addon">
                                                <i class="zmdi zmdi-lock-outline"></i>
                                            </span>
                                    <div class="form-group label-floating">
                                        <label class="control-label">Mot de passe</label>
                                        <input type="password" name="mdp" class="form-control" required="true">
                                    </div>
                                </div>
                                <div class="footer text-center">
                                    <button type="submit" class="btn btn-danger btn-simple" name="valid">Connexion</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
<?php
	if (isset($_POST['valid'])) 
	{
		include "bd/Connection.php";
		$email=$_POST['email'];
		$mdp=$_POST['mdp'];
		$v=$bd->prepare('select id_p,email from personne where email=? ');
		$v->execute(array($email));
		if($v->rowCount()>0)
        {
            $fet1=$v->fetch();
            $w=$bd->prepare('select mdp from membre where id_m=? && mdp=?');
            $w->execute(array($fet1['id_p'],$mdp));
            if($w->rowCount()>0)
			{
                $fet2=$w->fetch();
                session_start();
				session_unset();
                session_destroy();
                session_start();
                $_SESSION['id_m']=$fet1['id_p'];
                $_SESSION['email']=$fet1['email'];
                $_SESSION['mdp']=$fet2['mdp'];
                header ('location: Member/ChercherTrajet.php');
			}
			else
			{
		       echo '<body onLoad="alert(\'Mot de passe erroné...\')">';
	   		}     
        }
        else
        {
            echo '<body onLoad="alert(\'Membre non reconnu...\')">';
	    }  
	}
?>
