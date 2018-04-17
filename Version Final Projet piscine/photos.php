<?php

session_start();

?>


<!DOCTYPE html>

<html>

    <head>

        <meta charset="utf-8"/>
        <title> Photos </title>
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <script  type="text/javascript">
            function ajoutAlbum(photo){
                var url="addAlbum.php";
                var numAlbum=prompt("Ajouter à l'album numéro :", "Numéro album");
                if(numAlbum>0){
                    url+='?numAlbum='+numAlbum+'&numPhoto='+photo;
                    window.location.href=url;
                }
            }
        </script>
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
        <style>
            .carousel-inner > .item > img,
            .carousel-inner > .item > a > img {
                width: 70%;
                margin: auto;
            }
        </style>
    </head>


    <body>

        <h1> Social Media ECE </h1>


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

       
		<div class="col-xs-12 text-center">
        <?php 

        //identifier le fichier dont on a besoin
        define('DB_SERVER', 'localhost');
        define('DB_USER', 'root');
        define('DB_PASS', '');

        //identifier le nom de base de données
        $database = "projet_piscine";
        //connecter dans la BDD
        $db_handle = mysqli_connect(DB_SERVER, DB_USER,DB_PASS);
        $db_found = mysqli_select_db($db_handle, $database);
		$pseudo=$_SESSION['pseudo'];
        //si la BDD existe, faire le traitement
        if ($db_found) {

            $sql = "SELECT album FROM photos WHERE utilisateur='$pseudo' and (SELECT MAX(album) FROM photos)ORDER BY album";
            $result = mysqli_query($db_handle, $sql);
            while ($data = mysqli_fetch_assoc($result)) {
                $maxAlbum=$data['album'];		
            }
            if($maxAlbum>=2){echo '<h1> Tous les albums <br> </h1>';}
            $tourBoucle=0;
            for($i=2;$i<=$maxAlbum;$i++){
                $numAlbum=$i;
                $num=$numAlbum-1;
                echo "<h1>Album $num</h1>";

                $sql = "SELECT * FROM photos WHERE album = '$numAlbum' AND utilisateur='$pseudo' ORDER BY id DESC";
                $result = mysqli_query($db_handle, $sql);

                while ($data = mysqli_fetch_assoc($result)) {

                    $photo=$data['chemin'];
                    echo '<img src="'.$photo.'" alt="photo de profil" style=" max-height: 200px;" />'.	" "		;

                }//fin while
                $tourBoucle=$tourBoucle+1;
            }//fin for
        }//fin if
        else {
            echo "Database not found";
        }//fin else
        ?>
	</div>
        <h1> Toutes les photos <br> </h1>
    <div class="container">
            <br>
            <div id="myCarousel" class="carousel slide" data-ride="carousel">
                

                <!-- Wrapper for slides -->
                <div class="carousel-inner" style="min-height:500px;" role="listbox">

		 <?php 
        //si la BDD existe, faire le traitement
        if ($db_found) {
            $sqlCarou = "SELECT * FROM photos WHERE utilisateur = '$pseudo' ORDER BY id DESC";
            $resultCarou = mysqli_query($db_handle, $sqlCarou);
			$passage=mysqli_fetch_assoc($resultCarou);
			$photo=$passage['chemin'];
			$id=$passage['id'];
			echo'<div class="item active">';
            echo'<img  style="" src="'.$photo.'" alt="photo"  style="max-height:500px;"  onClick="ajoutAlbum('.$id.')"/>>';
			echo'</div>';
            while ($dataCarou = mysqli_fetch_assoc($resultCarou)) {
				$photo=$dataCarou['chemin'];
				$id=$dataCarou['id'];
				echo'<div class="item">';
                echo'<img  src="'.$photo.'" alt="photo" style="max-height:500px;" onClick="ajoutAlbum('.$id.')"/>';
                echo'</div>';

            }//fin while

        }//fin if
        else {
            echo "Database not found";
        }//fin else

        ?>
		                </div>

                <!-- Left and right controls -->
                <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
		<div class="col-xs-12 text-center">
        <?php 
        //si la BDD existe, faire le traitement
        if ($db_found) {
            $sql = "SELECT * FROM photos WHERE utilisateur = '$pseudo' ORDER BY id DESC";

            $result = mysqli_query($db_handle, $sql);

            while ($data = mysqli_fetch_assoc($result)) {

                $photo=$data['chemin'];
                $id=$data['id'];
                echo '<img src="'.$photo.'" alt="photo" style=" max-height: 200px;" onClick="ajoutAlbum('.$id.')"/>'.	" "		;

            }//fin while

        }//fin if
        else {
            echo "Database not found";
        }//fin else

        //fermer la connection
        mysqli_close($db_handle);
        ?>
		</div>
		<div style="height:30px;"></div>
        <div class="container">
            <div class="row">
                <div class="col-sm-2"></div>
                <div class="col-sm-8">

                    <div class="panel panel-default box-shadow">
                        <div class="panel-heading block-center">
                            <span class="text-primary center-block">Ajouter une photo </span>
                            <span class="text-muted pull-right today" title="Today"></span>              
                        </div><!--.panel-heading-->

                        <div class="panel-body text-center ">
                            <form method="post" action="addPhoto.php" enctype="multipart/form-data">
                                <p> Choisir photo à ajouter : </p> 
                                <input type="file" name="photo"  />
                                <p> Choisir album de la photo (0 si pas d'album) : <input type="text" name="album" /></p> 
                                <input type="submit" value="Ajouter la photo" class="btn btn-block btn-primary" /><br>
                                <!-- File Button --> 

                            </form>

                        </div>
                    </div><!--.panel-->
                </div>
                <!--.cols-->
                <div class="col-sm-2"></div>
            </div><!--.row-->
        </div><!--.container-->





        <br><br>






                    

                  

                    


    </body>

    <footer>Site créé par OGBI Lena, Massis Hugo et KOURGANOFF Adrien Copyright &copy; 2017 ECE Paris <br />
    </footer>

</html>


















