<?php

session_start();

?>


<!DOCTYPE html>

<html>

    <head>

        <meta charset="utf-8"/>
        <title> Chronologie </title>
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

        <?php 

        $pseudo = $_SESSION['pseudo'];

        ?>
        <div class="container col-centered">
            <div class="col-sm-2"></div>
            <div class="col-sm-8"><img  class="img-responsive" src="<?php echo $_SESSION['photoCouverture']; ?>" alt="photo de profil" width="1000">
            </div>
            <div class="col-sm-2"></div>
        </div>
        <br>

        <h1> <br/> </h1>


       <br>



        <div class="container">
            <div class="row">
                <div class="col-sm-2"></div>
                <div class="col-sm-8">

                    <div class="panel panel-default box-shadow">
                        <div class="panel-heading">
                            <span class="text-primary center-block">Mur de <?php echo $_SESSION['pseudo']; ?> </span>
                            <span class="text-muted pull-right today" title="Today"></span>              
                        </div><!--.panel-heading-->

                        <div class="panel-body">
                            <img class="img-responsive center-block" src="<?php echo $_SESSION['photoProfil']; ?>" alt="photo de profil" width="300" />

                        </div>
                    </div><!--.panel-->
                </div>
                <!--.cols-->
                <div class="col-sm-2"></div>
            </div><!--.row-->
        </div><!--.container-->

        <div class="container">
            <div class="row">
                <div class="col-sm-2"></div>
                <div class="col-sm-8">

                    <div class="panel panel-default box-shadow">
                        <div class="panel-heading">

                            <span class="text-primary center-block " > Publications</span>              
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

                                $sql = "SELECT * FROM publications WHERE owner = '$pseudo' ORDER BY date_pub DESC";

                                $result = mysqli_query($db_handle, $sql);

                                while ($data = mysqli_fetch_assoc($result)) {

                                    echo "• Le : " . $data['date_pub'] . '<br>';
                                    echo "Nom de la publication :" . $data['nom_pub'] . '<br>';
                                    echo "Statut : " . $data['statut'] . '<br>';
                                    echo "Statut securitaire : " . $data['secu'] . '<br>';
                                    $photo=$data['photo'];
                                    echo '<img class="img-responsive block-center"src="'.$photo.'" alt="photo" /><br>';
                                    echo "Lieu : " . $data['lieu'] . '<br>';
                                    echo "Sentiment : " . $data['sentiment'] . '<br>';
                                    echo "Activité : " . $data['acti'] . '<br>'; 
                                    echo  "<img src='asset/smiley/png/004-happy.png'>"." ". $data['jaime']."     " ;
                                    echo "<img src='asset/smiley/png/003-in-love.png'>"." ". $data['love']."     " ;
                                    echo "<img src='asset/smiley/png/002-mad.png'>"." ". $data['dislike']."     " ;
                                    echo "<img src='asset/smiley/png/001-happy-1.png'>"." " . $data['rire']."<br>" ;
                                    echo "Commentaires : " .$data['commentaire'] . '<br><hr>';




                                }//fin while

                            }//fin if
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
        


        <div class="container">
            <div class="row">
                <div class="col-sm-2"></div>
                <div class="col-sm-8">

                    <div class="panel panel-default box-shadow">
                        <div class="panel-heading">
                            <span class="text-primary center-block " >Actions</span>              
                        </div><!--.panel-heading-->

                        <div class="panel-body">
                            <div class="row">
                                <div class="col-sm-4"><a href="suppr_publication2.html"><button type="button" class="btn btn-block btn-primary" name="publier">Supprimer une publication</button></a></div>
                                <div class="col-sm-4 text-center"><a href="rediger_publication.html"><button class="btn btn-block btn-primary"type="button" name="publier">Publier</button></a></div>

                                <div class="col-sm-4"> <a href="modif_publication2.html"><button type="button" name="publier" class="btn btn-block btn-primary">Modifier une publication</button></a></div>
                            </div>







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