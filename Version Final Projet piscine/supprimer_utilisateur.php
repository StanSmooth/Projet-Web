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
 //recuperation des donnes du formulaire 
$nom=$_POST['nom'];
$pseudo=$_POST['pseudo'];
$email=$_POST['email'];

    //si la BDD existe, faire le traitement
 if ($db_found) {


     $sql = "DELETE FROM utilisateurs WHERE nom = '$nom' AND pseudo = '$pseudo' AND email = '$email'"; // suppression de l'utilisateur choisi de la table de donnée 
     $result = mysqli_query($db_handle, $sql);
    
     while ($data = mysqli_fetch_assoc($result)) {


   

     }//fin while

      header('Location: administrateur2.html'); // redirection vers la page admin 
    exit(); 


     
 }//fin if
else {
     echo "Database not found";
 }//fin else 


 ?>
