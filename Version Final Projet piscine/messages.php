
<?php

session_start();


$pseudo = $_SESSION['pseudo'];
$pseudoami = $_POST['pseudoami'];
$message = $_POST['message'];

//identifier le fichier dont on a besoin
define('DB_SERVER', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');

//identifier le nom de base de données
$database = "projet_piscine";
//connecter dans la BDD
$db_handle = mysqli_connect(DB_SERVER, DB_USER, DB_PASS);
$db_found = mysqli_select_db($db_handle, $database);

//si la BDD existe, faire le traitement
if ($db_found) {

    $sql = "SELECT demandeur, accepter, cible FROM demandes_amis" ; 

    $result = mysqli_query($db_handle, $sql);
    $ami = 0;
    while ($data = mysqli_fetch_assoc($result)) 

    {

        if (($data['demandeur'] == $pseudoami) && ($data['cible'] == $pseudo) && ($data['accepter'] == 'O')) // permet de coder le fait que la visite d'un mur est possible que si les deux utilisateurs sont amis 

        {
            $ami = 1;


            $sql2 ="INSERT INTO messenger (editeur,receveur,message) VALUES ('$pseudo', '$pseudoami', '$message')";

            $result2 = mysqli_query($db_handle, $sql2);
        } 

    } 

} else { echo "Database not found"; }//fin else

?>




<!DOCTYPE html>

<html>

    <head>

        <meta charset="utf-8"/>
        <title>Message Privé </title>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>

        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link rel="stylesheet" type="text/css" href="footer.css">
        <link rel="stylesheet" type="text/css" href="style.css">
        <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="navbar.css">

    </head>


    <body>
        <h1>Social Media ECE</h1>
        <?php 

        $pseudo = $_SESSION['pseudo'];
        $pseudoami = $_POST['pseudoami'];

        ?>



        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span> 
                    </button>

                </div>
                <div class="collapse navbar-collapse" id="myNavbar">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="menu4.html">Accueil</a> </li>
                        <li><a href="chronologie.php">Chronologie</a></li>
                        <li><a href="a_propos.php">A propos</a></li>
                        <li><a href="amis.php">Amis</a></li>
                        <li><a href="photos.php">Photos</a></li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container">
            <div class="row">
                <div class="col-xs-10 col-xs-offset-1 col-sm-6 col-sm-offset-3 col-md-5 col-md-offset-4 col-lg-4 col-lg-offset-4">

                    <div class="panel panel-default box-shadow">
                        <div class="panel-heading ">
                            <span class="text-primary"> <?php echo " " . $pseudoami; ?></span>
                            <span class="text-muted pull-right today" title="Today"></span>              
                        </div><!--.panel-heading-->

                        <div class="panel-body text-center">
                            <?php if ($ami == 0) { echo "Vous n'etes pas ami avec " .$pseudoami. " vous ne pouvez donc pas chatter avec cet utilisateur <br> ";} ?>


                            <?php 
                            //si la BDD existe, faire le traitement
                            if ($db_found) {


                                $sql ="SELECT message, editeur, receveur FROM messenger ORDER BY id";

                                $result = mysqli_query($db_handle, $sql);

                                while ($data = mysqli_fetch_assoc($result)) 

                                {

                                    if ((($data['editeur'] == $pseudo) && ($data['receveur'] == $pseudoami)) || (($data['editeur'] == $pseudoami) && ($data['receveur'] == $pseudo)))


                                        echo " Message de " . $data['editeur'] . " : " . $data['message'] . '<br>';
                                }


                                // fin while 2




                            }

                            //finwhile 1

                            else {
                                echo "Database not found";
                            }//fin else

                            //fermer la connection
                            mysqli_close($db_handle);
                            ?>
                            <a href="amis.php"><button type="button" class="btn btn-block btn-primary" name="publier">Retour à l'onglet Amis</button></a>

                        </div>
                    </div><!--.panel-->
                </div><!--.cols-->
            </div><!--.row-->
        </div><!--.container-->

    </body>

    <footer>Site créé par OGBI Lena, Massis Hugo et KOURGANOFF Adrien Copyright &copy; 2017 ECE Paris <br />
    </footer>

</html>