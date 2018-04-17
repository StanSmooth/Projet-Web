<?php

session_start();

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

$nom_pub=$_POST['nom_pub'];
$statut=$_POST['statut'];
$secu=$_POST['secu'];
$lieu=$_POST['lieu'];
$sentiment=$_POST['sentiment'];
$acti=$_POST['acti'];
$owner=$_SESSION['pseudo'];

//Adresse image à NULL
$nomPhoto='NULL';

// recuperation des donnees du formulaire dans des variables de session
$_SESSION['nom_pub']=$_POST['nom_pub'];
$_SESSION['statut']=$_POST['statut'];
$_SESSION['secu']=$_POST['secu'];
$_SESSION['lieu']=$_POST['lieu'];
$_SESSION['sentiment']=$_POST['sentiment'];
$_SESSION['acti']=$_POST['acti']; 

//on recupere la date et l'heure courante 
$annee=date('Y');
$jour=date('d');
$mois=date('m');
$heure=date('H')+2; // +2 car php n'est pas sur le bon fuseau horaire et n'a pas fait le changement d'heure (ete/hiver)
$min=date('i');
$secondes=date('s');

$date_pub = "$annee-$mois-$jour $heure:$min:$secondes";



    //si la BDD existe, faire le traitement
if ($db_found) {

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
    $sqlPhoto="INSERT INTO photos (chemin,utilisateur,album) VALUES ('$nomPhoto','$owner','0')"; 
    $resultPhoto = mysqli_query($db_handle, $sqlPhoto);
    
    


    $sql = "INSERT INTO publications (nom_pub,statut,date_pub,secu,lieu,sentiment,acti,owner,photo,jaime,dislike,love, rire) VALUES ('$nom_pub','$statut','$date_pub','$secu','$lieu','$sentiment','$acti','$owner','$nomPhoto','0','0','0','0')"; // insertion dans la table de donnees des donnees renseignees dans le formulaire
    $result = mysqli_query($db_handle, $sql);

    header('Location: chronologie.php'); // redirection vers la page de connection admin en cas de mauvaise authentification 
    exit(); 



     
 }//fin if
 else {
   echo "Database not found";
 }//fin else

//fermer la connection
 mysqli_close($db_handle);
 ?>
