<!DOCTYPE html>

<html>

<head>

  <meta charset="utf-8"/>
  <title> Bienvenue </title>
          <!-- Latest compiled and minified CSS -->
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
 <h1>Social Media ECE</h1>
 
        <div class="container">
            <div class="row">
                <div class="col-xs-10 col-xs-offset-1 col-sm-6 col-sm-offset-3 col-md-5 col-md-offset-4 col-lg-4 col-lg-offset-4">

                    <div class="panel panel-default box-shadow">
                        <div class="panel-heading">
                            <span class="text-primary"><?php

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


     $sql = "SELECT pseudo FROM utilisateurs WHERE id = (SELECT MAX(id) FROM utilisateurs)"; 
     $result = mysqli_query($db_handle, $sql);

     while ($data = mysqli_fetch_assoc($result)) {

       echo " Bienvenue " . $data['pseudo'] . " !";

     }//fin while

 }//fin if
 else {
   echo "Database not found";
 }//fin else

//fermer la connection
 mysqli_close($db_handle);
 ?></span>
                            <span class="text-muted pull-right today" title="Today"></span>              
                        </div><!--.panel-heading-->

                        <div class="panel-body">
                            <form method="POST">

                                <a href="menu4.html" class="btn btn-block btn-primary" tabindex="5">Continuer</a>
                              
                                
                            </form>
                        </div>
                    </div><!--.panel-->
                </div><!--.cols-->
            </div><!--.row-->
        </div><!--.container-->

  <footer>
        <p>© 2017, All rights reserved 2017. Site crée par Hugo, Lena et Adrien</p>
</footer>

</body>




</html>



