
	<?php 

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
// recuperation des donnees du formulaire
	$nomamod = $_POST['nomamod'];
	$newname = $_POST['newname'];
	$newstatut = $_POST['newstatut'];

    //si la BDD existe, faire le traitement
	if ($db_found) {


		$sql = "UPDATE publications SET nom_pub = '$newname' , secu = '$newstatut' WHERE nom_pub = '$nomamod'"; // actualisation de la table publications avec les modifications entrées par l'utilisateur 

		$result = mysqli_query($db_handle, $sql);

		while ($data = mysqli_fetch_assoc($result)) {





     }//fin while

         header('Location: chronologie.php'); // redirection vers la page chronologie
    exit(); 

      }//fin if


    else {
    	echo "Database not found";
 }//fin else

//fermer la connection
 mysqli_close($db_handle);
 ?>

