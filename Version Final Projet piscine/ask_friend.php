<?php 

session_start();



// NOUS TRAVAILLONS SOUS MAMP NOTRE ID USER EST DONC 'root' ET NOTRE MDP EST 'root' egalement

 //identifier le fichier dont on a besoin
	define('DB_SERVER', 'localhost');
	define('DB_USER', 'root');
	define('DB_PASS', '');

//identifier le nom de base de données
	$database = "projet_piscine";
//connecter dans la BDD
	$db_handle = mysqli_connect(DB_SERVER, DB_USER, DB_PASS);
	$db_found = mysqli_select_db($db_handle, $database);

	$pseudo=$_SESSION['pseudo'];
	$pseudoAmi = $_GET['pseudoAmi'];
	$accepter = $_GET['accepter'];
	$_SESSION['pseudoami'] = $_GET['pseudoAmi'];

    //si la BDD existe, faire le traitement
	if ($db_found) {

		if($accepter=='O')
		{
			$sql = "UPDATE demandes_amis SET accepter = '$accepter' WHERE demandeur = '$pseudoAmi' AND cible ='$pseudo'"; // actualiser la table de données avec la reponse OUI ou NON données par l'utilisateur ayant recu la demande d'amis 

			$result = mysqli_query($db_handle, $sql);

			while ($data = mysqli_fetch_assoc($result)) {




		 }//fin while

		 $sql2 = "INSERT INTO demandes_amis (demandeur,cible,accepter) VALUES ('$pseudo', '$pseudoAmi','$accepter')"; // creation d'une deuxieme ligne dans la table , une demande d'ami = deux lignes dans la table demande amis une ou demandeur = pseudo et cible = pseudoami et une autre ou cible = pseudoami et demandeur = pseudo
			$result2 = mysqli_query($db_handle, $sql2);

			while ($data = mysqli_fetch_assoc($result2)) {





		 }//fin while

		}
		else{
			$sql = "DELETE FROM demandes_amis WHERE accepter = '$accepter' AND demandeur = '$pseudoAmi' AND cible ='$pseudo'";
			$result = mysqli_query($db_handle, $sql);
			
		}
         header('Location: amis.php'); // redirection vers la page amis
         exit();


      }//fin if


    else {
    	echo "Database not found";
 }//fin else

//fermer la connection
 mysqli_close($db_handle);
 ?>

