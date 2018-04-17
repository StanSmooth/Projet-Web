
<?php

session_start();

?>


<!DOCTYPE html>

<html>

    <head>

        <meta charset="utf-8"/>
        <title> Mur d'un ami </title>
        <link rel="icon" type="image/ico" href="asset/favicon.ico" />

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

        <h1> Social Media ECE </h1>
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
                        <div class="panel-heading block-center ">
                            <span class="text-primary center-block ">Mur de <?php echo " " . $pseudoami; ?> </span>
                            <span class="text-muted pull-right today" title="Today"></span>              
                        </div><!--.panel-heading-->

                        <div class="panel-body">
                           

                            <a href="amis.php"><button type="button" name="publier" class="btn btn-block btn-primary">Retour à l'onglet Amis</button></a>
                            <a href="reaction.html"><button type="button" name="reaction" class="btn btn-block btn-primary">Réagir à une publication</button></a>

                        </div>
                    </div><!--.panel-->
                </div><!--.cols-->
            </div><!--.row-->
        </div><!--.container-->

        <div class="container">
            <div class="row">
                <div class="col-sm-2"></div>
                <div class="col-sm-8">

                    <div class="panel panel-default box-shadow">
                        <div class="panel-heading">
                            <span class="text-primary">Publications</span>
                            <span class="text-muted pull-right today" title="Today"></span>              
                        </div><!--.panel-heading-->

                        <div class="panel-body text-center">
                            <?php 

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
                                        $sql2 = "SELECT * FROM publications WHERE owner = '$pseudoami' ORDER BY date_pub DESC";
                                        $result2 = mysqli_query($db_handle, $sql2);

                                        while ($data2 = mysqli_fetch_assoc($result2)) 
                                        {
                                            if (($data2['secu'] == 'public') || ($data2['secu'] == 'amis')) // n'afficher les publications visibles par tout le monde (public) ou par les amis de l'utilisateur
                                            {

                                                echo "• Le : " . $data2['date_pub'] . '<br>';
                                                echo "Nom de la publication :" . $data2['nom_pub'] . '<br>';
                                                echo "Statut : " . $data2['statut'] . '<br>';
                                                echo "Statut securitaire : " . $data2['secu'] . '<br>';
                                                $photo=$data2['photo'];
                                                echo '<img src="'.$photo.'" class="img-responsive "alt="photo de profil" /><br>';
                                                echo "Lieu : " . $data2['lieu'] . '<br>';
                                                echo "Sentiment : " . $data2['sentiment'] . '<br>';
                                                echo "Activité : " . $data2['acti'] . '<br>'; 
                                                echo "<img src='asset/smiley/png/004-happy.png'>"." ". $data2['jaime'] ;
                                                echo "<img src='asset/smiley/png/003-in-love.png'>"." " . $data2['love'] ;
                                                echo "<img src='asset/smiley/png/002-mad.png'>"." ". $data2['dislike'] ;
                                                echo "<img src='asset/smiley/png/001-happy-1.png'>"." "  . $data2['rire'] . '<br>';	
                                                echo "Commentaires : " .$data2['commentaire'] . '<br><hr>';
                                            } 
                                        }// fin while 2
                                    }
                                }//finwhile 1
                                if($ami==0) { echo " Vous n'etes pas ami avec " . $pseudoami . " vous n'avez donc pas acces a son mur ! <br>"; }

                            } // fin if 1
                            else {
                                echo "Database not found";
                            }//fin else

                            //fermer la connection
                            mysqli_close($db_handle);
                            ?>


                        </div>
                    </div><!--.panel-->
                </div>

                <!--.cols-->
                <div class="col-sm-2"></div>
            </div><!--.row-->
        </div><!--.container-->

    </body>

    <footer>Site créé par OGBI Lena, Massis Hugo et KOURGANOFF Adrien Copyright &copy; 2017 ECE Paris <br />
    </footer>

</html>