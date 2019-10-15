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

<body>
    <div class="content">
        <div class="container-fluid">
            <div class="card">
                <form method="post" action="noter.php">
                    <div class="form-group col-md-12">
                        <label class="control-label">
                        Note
                        <small>*</small>
                    </label>
                        <select class="form-control" name="note">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="2">3</option>
                        <option value="2">4</option>
                        <option value="2">5</option>
                    </select>
                    </div>
                    <div class="form-group col-md-12">
                        <label class="control-label">
                        Decription
                        <small>*</small>
                    </label>
                        <textarea class="form-control" name="description" required="true"></textarea>
                    </div>
                    <div class="text-right">
                        <button class="btn btn-success" type="submit" name="val">Valider</button>
                        <button class="btn btn-danger" type="submit" name="anu">Annuler</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>
<?php
    include '../bd/Connection.php';
    if(isset($_POST['val']))
       
    {
        $m=$bd->query("INSERT INTO avis(membre_donnat, membre_donné, note, description) VALUES (".$id_v.",".$id_c.",".$_POST['note'].",".$_POST['description'].")");
        header ("location: ConsulterTrajet.php");
    }
    if(isset($_POST['anu']))
    {
        header ("location: ConsulterTrajet.php");
    }
?>

</html>
