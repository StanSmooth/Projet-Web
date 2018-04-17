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

    //si la BDD existe, faire le traitement
if ($db_found) {

	// recuperation des donnees du formulaire

	$_SESSION['pseudo']=$_POST['pseudo'];
	$pseudo=$_POST['pseudo'];
	$_SESSION['mdp']=$_POST['mdp'];
	$_SESSION['email']=$_POST['email'];

	// requetes sql pour recuperer le pseudo, , email et mdp 

	$sql_pseudo = "SELECT pseudo FROM utilisateurs WHERE pseudo = '$pseudo'"; 
	$sql_password = "SELECT mdp FROM utilisateurs WHERE pseudo = '$pseudo'";
	$sql_email = "SELECT email FROM utilisateurs  WHERE pseudo = '$pseudo'";

	$result_pseudo = mysqli_query($db_handle, $sql_pseudo);
	$result_password = mysqli_query($db_handle, $sql_password);
	$result_email = mysqli_query($db_handle, $sql_email);

	// mises des infos utilisateurs dans les variables de session 

	$sql_nom = "SELECT nom FROM utilisateurs WHERE pseudo = '$pseudo'";
	$result_nom = mysqli_query($db_handle, $sql_nom);
	$data_nom= mysqli_fetch_array($result_nom);
	$_SESSION['nom'] = $data_nom['nom'];

	$sql_ville = "SELECT ville FROM utilisateurs WHERE pseudo = '$pseudo'";
	$result_ville = mysqli_query($db_handle, $sql_ville);
	$data_ville= mysqli_fetch_array($result_ville);
	$_SESSION['ville'] = $data_ville['ville'];

	$sql_age = "SELECT age FROM utilisateurs WHERE pseudo = '$pseudo'";
	$result_age = mysqli_query($db_handle, $sql_age);
	$data_age= mysqli_fetch_array($result_age);
	$_SESSION['age'] = $data_age['age'];

	$sql_num = "SELECT num FROM utilisateurs WHERE pseudo = '$pseudo'";
	$result_num = mysqli_query($db_handle, $sql_num);
	$data_num= mysqli_fetch_array($result_num);
	$_SESSION['num'] = $data_num['num'];

	$sql_date_naiss = "SELECT date_naiss FROM utilisateurs WHERE pseudo = '$pseudo'";
	$result_date_naiss = mysqli_query($db_handle, $sql_date_naiss);
	$data_date_naiss= mysqli_fetch_array($result_date_naiss);
	$_SESSION['date_naiss'] = $data_date_naiss['date_naiss'];

	$sql_majeure = "SELECT majeure FROM utilisateurs WHERE pseudo = '$pseudo'";
	$result_majeure = mysqli_query($db_handle, $sql_majeure);
	$data_majeure= mysqli_fetch_array($result_majeure);
	$_SESSION['majeure'] = $data_majeure['majeure'];

	$sql_photoProfil = "SELECT photoProfil FROM utilisateurs WHERE pseudo = '$pseudo'";
	$result_photoProfil = mysqli_query($db_handle, $sql_photoProfil);
	$data_photoProfil= mysqli_fetch_array($result_photoProfil);
	$_SESSION['photoProfil'] = $data_photoProfil['photoProfil'];

	$sql_photoCouverture = "SELECT photoCouverture FROM utilisateurs WHERE pseudo = '$pseudo'";
	$result_photoCouverture = mysqli_query($db_handle, $sql_photoCouverture);
	$data_photoCouverture= mysqli_fetch_array($result_photoCouverture);
	$_SESSION['photoCouverture'] = $data_photoCouverture['photoCouverture'];



	while ($data_pseudo = mysqli_fetch_assoc($result_pseudo) AND $data_password = mysqli_fetch_assoc($result_password) AND $data_email = mysqli_fetch_assoc($result_email)) 

	{
		if ($_SESSION['pseudo'] == $data_pseudo['pseudo'] AND $_SESSION['mdp'] == $data_password['mdp'] AND $_SESSION['email'] == $data_email['email']) // si les donnes correspondent à celle de la table de donnees alors connection 
		{
			echo "Connection réussie!" ;
        header('Location: bienvenue3.php'); // redirection vers la page bienvenue en cas de bonne authentification 
        exit();
    } else { echo "La connection a échoué veuillez reesayer"; 

        header('Location: connection2.html'); // redirection vers la page de connection en cas de mauvaise authentification 
        exit();}
    }




 }//fin if
 else {
 	echo "Database not found";
 }//fin else

//fermer la connection
 mysqli_close($db_handle);

 ?>