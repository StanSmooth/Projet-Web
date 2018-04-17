<?php

session_start();

?>


<!DOCTYPE html>

<html>

    <head>

        <meta charset="utf-8"/>
        <title> Amis </title>
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
		<script  type="text/javascript">
			function ajoutAmi(){
			var url="ajout_ami.php";
			var numAlbum=prompt(" :", "Numéro album");
			if(numAlbum>0){
				url+='?numAlbum='+numAlbum+'&numPhoto='+photo;
				window.location.href=url;
			}
			}
			</script>


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

        <div class="container">
            <div class="row">
                <div class="col-sm-2"></div>
                <div class="col-sm-8">

                    <div class="panel panel-default box-shadow">
                        <div class="panel-heading">
                            <span class="text-primary center-block">Liste des Utilisateurs</span>
                            <span class="text-muted pull-right today" title="Today"></span>              
                        </div><!--.panel-heading-->

                        <div class="panel-body">
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

                            $pseudo = $_SESSION['pseudo'];

                            //si la BDD existe, faire le traitement
                            if ($db_found) {


                                $sql = "SELECT pseudo, photoProfil FROM utilisateurs WHERE pseudo NOT LIKE '$pseudo'";
                                $result = mysqli_query($db_handle, $sql);

                                while ($data = mysqli_fetch_assoc($result)) {

                                    $photo=$data['photoProfil'];
									$utilisateurAffiche=$data['pseudo'];
									
									$sql2 = "SELECT * FROM demandes_amis AS a, utilisateurs AS b WHERE a.demandeur = b.pseudo AND a.accepter = 'O'AND a.demandeur NOT LIKE '$pseudo' AND a.cible='$pseudo'";
									$result2 = mysqli_query($db_handle, $sql2);
									$passe='0';
									while ($data2 = mysqli_fetch_assoc($result2)) {
										if($data2['pseudo']==$utilisateurAffiche){$passe='1';}
									}
									$existant=0;
									$pseudoUt=$data['pseudo'];
									if($passe=='0'){		
										$sql3="SELECT * FROM demandes_amis AS a WHERE (a.demandeur='$pseudo' AND a.cible='$pseudoUt')OR(a.cible='$pseudo' AND a.demandeur='$pseudoUt')";
										$result3 = mysqli_query($db_handle, $sql3);
										while ($data2 = mysqli_fetch_assoc($result3)) {
										$existant=1;
										}
									}
									if($existant=='0'&&$passe=='0'){	
										$url="ajout_ami.php?nomAmi=$pseudoUt";
										echo  '<div class="row"><div class="col-sm-2">'.$utilisateurAffiche.'</div> <div class="col-sm-2"><img src="'.$photo.'" alt="photo de profil" height="60px" /></div><div class="col-sm-2"><a href="'.$url.'"><button type="button" name="ami" class="btn btn-primary">Ajouter</button></a></div><div class="col-sm-6"></div></div>';
									}
									else{echo '<div class="row"><div class="col-sm-2">'.$utilisateurAffiche.'</div> <div class="col-sm-2"><img src="'.$photo.'" alt="photo de profil" height="60px" /></div><div class="col-sm-8"></div></div>';}
									echo '<br>';
                                }//fin while
                            }//fin if
                            else {
                                echo "Database not found";
                            }//fin else

                            ?>
                        </div>
                    </div><!--.panel-->
                </div><!--.cols-->
                <div class="col-sm-2"></div>
            </div><!--.row-->
        </div><!--.container-->

        <div class="container">
            <div class="row">
                <div class="col-sm-2"></div>
                <div class="col-sm-8">

                    <div class="panel panel-default box-shadow">
                        <div class="panel-heading">
                            <span class="text-primary">Liste des amis : </span>
                            <span class="text-muted pull-right today" title="Today"></span>              
                        </div><!--.panel-heading-->

                        <div class="panel-body">
                            <?php 



                            $pseudo = $_SESSION['pseudo'];

                            //si la BDD existe, faire le traitement
                            if ($db_found) {


                                $sql = "SELECT * FROM demandes_amis AS a, utilisateurs AS b WHERE a.demandeur = b.pseudo AND a.accepter = 'O'AND a.demandeur NOT LIKE '$pseudo' AND a.cible='$pseudo'";

                                $result = mysqli_query($db_handle, $sql);

                                while ($data = mysqli_fetch_assoc($result)) {


                                    $photo=$data['photoProfil'];
                                    echo '<div class="row"><div class="col-sm-2">' .$data['demandeur'] . '</div><div class="col-sm-2"><img src="'.$photo.'" alt="photo de profil" height="60px" /></div><div class="col-sm-8"></div></div>';
                                }//fin while

                            }//fin if
                            else {
                                echo "Database not found";
                            }//fin else

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
                            <span class="text-primary">Mes Demandes en cours : </span>
                            <span class="text-muted pull-right today" title="Today"></span>              
                        </div><!--.panel-heading-->

                        <div class="panel-body">
                            <?php 

                            $pseudo = $_SESSION['pseudo'];

                            //si la BDD existe, faire le traitement
                            if ($db_found) {

                                $sql = "SELECT * FROM demandes_amis AS a, utilisateurs AS b WHERE a.cible = b.pseudo AND a.accepter = 'N'AND a.demandeur='$pseudo'";

                                $result = mysqli_query($db_handle, $sql);

                                while ($data = mysqli_fetch_assoc($result)) {

                                    $photo=$data['photoProfil'];
                                    echo '<div class="row"><div class="col-sm-2">' .$data['cible'] . '</div><div class="col-sm-2"><img src="'.$photo.'" alt="photo de profil" height="60px" /></div><div class="col-sm-8"></div></div>';



                                }//fin while

                            }//fin if
                            else {
                                echo "Database not found";
                            }//fin else

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
                            <span class="text-primary">Mes Invitations</span>
                            <span class="text-muted pull-right today" title="Today"></span>              
                        </div><!--.panel-heading-->

                        <div class="panel-body">
                            <?php 


                            $pseudo = $_SESSION['pseudo'];

                            //si la BDD existe, faire le traitement
                            if ($db_found) {

                                $sql = "SELECT * FROM demandes_amis AS a, utilisateurs AS b WHERE a.demandeur = b.pseudo AND a.accepter = 'N'AND a.cible='$pseudo'";

                                $result = mysqli_query($db_handle, $sql);

                                while ($data = mysqli_fetch_assoc($result)) {

                                    $photo=$data['photoProfil'];
									$pseudoUt=$data['pseudo'];
									$url="ask_friend.php?pseudoAmi=".$pseudoUt."&pseudo=".$pseudo."&accepter=";
									$pos='O';
									$neg='N';
                                    echo '<div class="row"><div class="col-sm-2">' .$data['demandeur'] . '</div><div class="col-sm-2"><img src="'.$photo.'" alt="photo de profil" height="60px" /></div><div class="col-sm-2"><a href="'.$url.''.$pos.'"><button type="button" name="ami" class="btn btn-primary">Ajouter</button></a></div><div class="col-sm-2"><a href="'.$url.''.$neg.'"><button type="button" name="ami" class="btn btn-danger">Refuser</button></a></div><div class="col-sm-4"></div></div>';




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
                            <span class="text-primary">Interraction</span>
                            <span class="text-muted pull-right today" title="Today"></span>              
                        </div><!--.panel-heading-->

                        <div class="panel-body">
                           <div class="row">
                               <div class="col-sm-6"><a href="mur_amis.html"><button type="button" name="retour"class="btn btn-block btn-primary">Mur d'un ami</button></a></div>
                               <div class="col-sm-6"><a href="messenger.html"><button type="button" name="retour"class="btn btn-block btn-primary">Messages privés</button></a></div>
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

