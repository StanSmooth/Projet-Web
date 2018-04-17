<?php

session_start();

?>

<!DOCTYPE html>

<html>

    <head>

        <meta charset="utf-8"/>
        <title> Réagir Publication</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>

        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link rel="stylesheet" type="text/css" href="footer.css">
        <link rel="stylesheet" type="text/css" href="style.css">
        <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">


    </head>


    <body>




        <?php


        $pseudo = $_SESSION['pseudo'];
        $auteur = $_POST['auteur'];
        $nom_pub = $_POST['nom_pub'];
        $reaction = $_POST['reaction'];
        $commentaire=$_POST['commentaire'];

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

            $sql = "UPDATE publications SET commentaire = '$commentaire' WHERE nom_pub = '$nom_pub' AND owner ='$auteur'";
            $result = mysqli_query($db_handle, $sql);



            if ($reaction == 'like')

            {


                $sql ="UPDATE publications SET jaime = jaime+1 WHERE owner = '$auteur' AND nom_pub = '$nom_pub' ";

                $result = mysqli_query($db_handle, $sql);

                while ($data = mysqli_fetch_assoc($result)) 

                {


                    echo "ID: " . $data['id'] . '<br>';
                    echo "Nom:" . $data['nom'] . '<br>';
                    echo "Pseudo: " . $data['pseudo'] . '<br>';
                    echo "email: " . $data['email'] . '<br>';

                }

            }

            if ($reaction == 'love')

            {


                $sql ="UPDATE publications SET love = love+1 WHERE owner = '$auteur' AND nom_pub = '$nom_pub' ";

                $result = mysqli_query($db_handle, $sql);

                while ($data = mysqli_fetch_assoc($result)) 

                {


                    echo "ID: " . $data['id'] . '<br>';
                    echo "Nom:" . $data['nom'] . '<br>';
                    echo "Pseudo: " . $data['pseudo'] . '<br>';
                    echo "email: " . $data['email'] . '<br>';

                }

            }


            if ($reaction == 'rire')

            {


                $sql ="UPDATE publications SET rire = rire+1 WHERE owner = '$auteur' AND nom_pub = '$nom_pub' ";

                $result = mysqli_query($db_handle, $sql);

                while ($data = mysqli_fetch_assoc($result)) 

                {


                    echo "ID: " . $data['id'] . '<br>';
                    echo "Nom:" . $data['nom'] . '<br>';
                    echo "Pseudo: " . $data['pseudo'] . '<br>';
                    echo "email: " . $data['email'] . '<br>';

                }

            }

            if ($reaction == 'dislike')

            {


                $sql ="UPDATE publications SET dislike = dislike+1 WHERE owner = '$auteur' AND nom_pub = '$nom_pub' ";

                $result = mysqli_query($db_handle, $sql);

                while ($data = mysqli_fetch_assoc($result)) 

                {


                    echo "ID: " . $data['id'] . '<br>';
                    echo "Nom:" . $data['nom'] . '<br>';
                    echo "Pseudo: " . $data['pseudo'] . '<br>';
                    echo "email: " . $data['email'] . '<br>';

                }

            }





        }

        //finwhile 1

        else {
            echo "Database not found";
        }//fin else


        //fermer la connection
        mysqli_close($db_handle);
        ?>
        <h1>Social Media ECE</h1>

        <div class="container">
            <div class="row">
                <div class="col-xs-10 col-xs-offset-1 col-sm-6 col-sm-offset-3 col-md-5 col-md-offset-4 col-lg-4 col-lg-offset-4">

                    <div class="panel panel-default box-shadow">
                        <div class="panel-heading block-center ">
                            <span class="text-primary center-block ">Visite du mur d'un ami</span>
                            <span class="text-muted pull-right today" title="Today"></span>              
                        </div><!--.panel-heading-->

                        <div class="panel-body text-center">

                            <form method="post" action="mur_friend.php">

                                <p> Retour sur le mur de : </p>

                                <input type="text" name="pseudoami"/>
                                <p></p>
                                <input type="submit" value="Retour sur le mur de l'ami en question" class="btn btn-block btn-primary" /><br>

                            </form>
                        </div>
                    </div><!--.panel-->
                </div><!--.cols-->
            </div><!--.row-->
        </div><!--.container-->



    </body>

    <footer>Site créé par OGBI Lena, Massis Hugo et KOURGANOFF Adrien Copyright &copy; 2017 ECE Paris <br />
    </footer>

</html>


