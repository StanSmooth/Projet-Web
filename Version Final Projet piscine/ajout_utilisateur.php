<?php

 //identifier le fichier dont on a besoin


// NOUS TRAVAILLONS SOUS MAMP NOTRE ID USER EST DONC 'root' ET NOTRE MDP EST 'root' egalement

define('DB_SERVER', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');

//identifier le nom de base de données
$database = "projet_piscine";
//connecter dans la BDD
$db_handle = mysqli_connect(DB_SERVER, DB_USER, DB_PASS);
$db_found = mysqli_select_db($db_handle, $database);
//recuperation des donnees du formulaire
$nom=$_POST['nom'];
$pseudo=$_POST['pseudo'];
$email=$_POST['email'];
$mdp=$_POST['mdp'];
$age=$_POST['age'];
$ville=$_POST['ville'];
$date=$_POST['date_naiss'];
$num=$_POST['num'];
$majeure=$_POST['majeure'];
//Adresse image à NULL
$nomProfil='NULL';
$nomCouverture='NULL';
    //si la BDD existe, faire le traitement
if ($db_found) {


     $sql = "INSERT INTO utilisateurs (email,pseudo,nom,mdp,age,ville,date_naiss,num,majeure,photoProfil,photoCouverture) VALUES ('$email','$pseudo','$nom','$mdp','$age','$ville','$date','$num','$majeure','$nomProfil','$nomCouverture')"; // insertion dans la base de donnees d'un nouveau tuple comprenant les infos entrees dans le formulaire
     $result = mysqli_query($db_handle, $sql);
     
     while ($data = mysqli_fetch_assoc($result)) { 

      // on fait tourner la requete avec du code
       echo "ID: " . $data['id'] . '<br>';
       echo "Nom:" . $data['nom'] . '<br>';
       echo "Pseudo: " . $data['pseudo'] . '<br>';
       echo "email: " . $data['email'] . '<br>';

     }//fin while




	header('Location: accueil4.html'); // redirection vers la page d'accueil 
    exit();

     
 }//fin if
 else {
   echo "Database not found";
 }//fin else

//fermer la connection
 mysqli_close($db_handle);
 ?>
