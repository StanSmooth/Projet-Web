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
	$pseudo = $_SESSION['pseudo'];
    //obtenir nom fichier photo
	 $sqlNum = "SELECT id FROM photos WHERE id = (SELECT MAX(id) FROM photos)"; 
	 $resultNum = mysqli_query($db_handle, $sqlNum);

	 while ($data = mysqli_fetch_assoc($resultNum)) {

	   $numPhoto= $data['id']+1;
	 }//fin while
	 if (isset($_FILES['photo']) AND $_FILES['photo']['error'] == 0)
	 {
	  if ($_FILES['photo']['size'] <= 100000000)
	  {
		$infosfichier = pathinfo($_FILES['photo']['name']);
		$extension_upload = $infosfichier['extension'];
		$extensions_autorisees = array('jpg', 'jpeg', 'gif', 'png');
		if (in_array($extension_upload, $extensions_autorisees))
		{
		  move_uploaded_file($_FILES['photo']['tmp_name'], 'images/'.$numPhoto .'.' .$extension_upload);
		  $nomPhoto="images/$numPhoto.$extension_upload";

		}
	  }
	}
	$album=$_POST['album']+1;
	$sqlPhoto="INSERT INTO photos (chemin,utilisateur,album) VALUES ('$nomPhoto','$pseudo','$album')"; 
	$resultPhoto = mysqli_query($db_handle, $sqlPhoto);
	
	header('Location: photos.php'); 
    exit(); 
	
	}
	else {
	echo "Database not found";
	}//fin else
	//fermer la connection
	 mysqli_close($db_handle);
?>