<?php

session_start();


define('DB_SERVER', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');

//identifier le nom de base de données
$database = "projet_piscine";

//connecter dans la BDD
$db_handle = mysqli_connect(DB_SERVER, DB_USER, DB_PASS);
$db_found = mysqli_select_db($db_handle, $database);

$code = $_POST['code'];
$mdp = $_POST['mdp'];


    //si la BDD existe, faire le traitement
if ($db_found) {

	$sql1 = "SELECT code FROM administrateurs";
	$sql2 = "SELECT mdp FROM administrateurs";
	$result1 = mysqli_query($db_handle, $sql1);
	$result2 = mysqli_query($db_handle, $sql2);

	while ($data1= mysqli_fetch_assoc($result1) AND $data2 = mysqli_fetch_assoc($result2)) 

	{
		if ($code == $data1['code'] AND $mdp == $data2['mdp'] ) // si les donnes correspondent à celle de la table de donnees alors connection 
		{
			echo "Connection réussie!" ;
        header('Location: administrateur2.html'); // direction vers la page admin en cas de bonne authentification 
        exit();
   		 } else { echo "La connection a échoué veuillez reesayer"; 

 				 header('Location: connection_admin.html'); // redirection vers la page de connection admin en cas de mauvaise authentification 
 				 exit(); }
 	}

 }//fin if
 else {
 	echo "Database not found";
 }//fin else

//fermer la connection
 mysqli_close($db_handle);

 ?>