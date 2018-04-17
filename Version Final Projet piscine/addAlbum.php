<?php 

session_start();
 //identifier le fichier dont on a besoin
	define('DB_SERVER', 'localhost');
	define('DB_USER', 'root');
	define('DB_PASS', '');

//identifier le nom de base de données
	$database = "projet_piscine";
//connecter dans la BDD
	$db_handle = mysqli_connect(DB_SERVER, DB_USER, DB_PASS);
	$db_found = mysqli_select_db($db_handle, $database);
	
	if ($db_found) {
		$numAlbum=$_GET['numAlbum']+1;
		$numPhoto=$_GET['numPhoto'];
		$sql = "UPDATE photos SET album=$numAlbum WHERE id='$numPhoto'"; 
		$result = mysqli_query($db_handle, $sql);
	
		header('Location: photos.php'); 
		exit(); 
	}
	else {
	echo "Database not found";
	}//fin else
	//fermer la connection
	 mysqli_close($db_handle);
?>