<?php


session_start();


 //identifier le fichier dont on a besoin
define('DB_SERVER', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');

//identifier le nom de base de données
$database = "projet_piscine";

//Adresse image à NULL
$nomProfil='NULL';
$nomCouverture='NULL';

//connecter dans la BDD
$db_handle = mysqli_connect(DB_SERVER, DB_USER, DB_PASS);
$db_found = mysqli_select_db($db_handle, $database);
$nom=$_POST['nom'];
$pseudo=$_POST['pseudo'];
$email=$_POST['email'];
$mdp=$_POST['mdp'];
$age=$_POST['age'];
$ville=$_POST['ville'];
$date=$_POST['date_naiss'];
$num=$_POST['num'];
$majeure=$_POST['majeure'];


$_SESSION['nom']=$_POST['nom'];
$_SESSION['pseudo']=$_POST['pseudo'];
$_SESSION['email']=$_POST['email'];
$_SESSION['mdp']=$_POST['mdp'];
$_SESSION['age']=$_POST['age'];
$_SESSION['ville']=$_POST['ville'];
$_SESSION['date_naiss']=$_POST['date_naiss'];
$_SESSION['num']=$_POST['num'];
$_SESSION['majeure']=$_POST['majeure'];


    //si la BDD existe, faire le traitement
if ($db_found) {

  //obtenir nom fichier photo
 $sqlNum = "SELECT id FROM photos WHERE id = (SELECT MAX(id) FROM photos)"; 
 $resultNum = mysqli_query($db_handle, $sqlNum);

 while ($data = mysqli_fetch_assoc($resultNum)) {

   $numPhoto= $data['id']+1;
     }//fin while
     if (isset($_FILES['profil']) AND $_FILES['profil']['error'] == 0)
     {
      if ($_FILES['profil']['size'] <= 1000000000)
      {
        $infosfichier = pathinfo($_FILES['profil']['name']);
        $extension_upload = $infosfichier['extension'];
        $extensions_autorisees = array('jpg', 'jpeg', 'gif', 'png');
        if (in_array($extension_upload, $extensions_autorisees))
        {
          move_uploaded_file($_FILES['profil']['tmp_name'], 'images/'.$numPhoto .'.' .$extension_upload);
          $nomProfil="images/$numPhoto.$extension_upload";
            //echo $nomProfil;
          $_SESSION['photoProfil']=$nomProfil;
        }
      }
    }
    $sqlPhoto="INSERT INTO photos (chemin,utilisateur,album) VALUES ('$nomProfil','$pseudo','1')"; 
    $resultPhoto = mysqli_query($db_handle, $sqlPhoto);


   //obtenir nom fichier photo couverture
    $sqlNumCouv = "SELECT id FROM photos WHERE id = (SELECT MAX(id) FROM photos)"; 
    $resultNumCouv = mysqli_query($db_handle, $sqlNumCouv);

    while ($data = mysqli_fetch_assoc($resultNumCouv)) {

     $numPhotoCouv= $data['id']+1;
     }//fin while
     if (isset($_FILES['couverture']) AND $_FILES['couverture']['error'] == 0)
     {
      if ($_FILES['couverture']['size'] <= 1000000000)
      {
        $infosfichier = pathinfo($_FILES['couverture']['name']);
        $extension_upload = $infosfichier['extension'];
        $extensions_autorisees = array('jpg', 'jpeg', 'gif', 'png');
        if (in_array($extension_upload, $extensions_autorisees))
        {
          move_uploaded_file($_FILES['couverture']['tmp_name'], 'images/'.$numPhotoCouv .'.' .$extension_upload);
          $nomCouverture="images/$numPhotoCouv.$extension_upload";
            //echo $nomProfil;
          $_SESSION['photoCouverture']=$nomCouverture;
        }
      }
    }
    $sqlPhotoCouv="INSERT INTO photos (chemin,utilisateur,album) VALUES ('$nomCouverture','$pseudo','1')"; 
    $resultPhotoCouv = mysqli_query($db_handle, $sqlPhotoCouv);

    $sql = "INSERT INTO utilisateurs (email,pseudo,nom,mdp,age,ville,date_naiss,num,majeure,photoProfil,photoCouverture) VALUES ('$email','$pseudo','$nom','$mdp','$age','$ville','$date','$num','$majeure','$nomProfil','$nomCouverture')"; 
    $result = mysqli_query($db_handle, $sql);

    while ($data = mysqli_fetch_assoc($result)) {

     echo "ID: " . $data['id'] . '<br>';
     echo "Nom:" . $data['nom'] . '<br>';
     echo "Pseudo: " . $data['pseudo'] . '<br>';
     echo "email: " . $data['email'] . '<br>';



     }//fin while


    header('Location: validation_inscription.html'); // redirection vers la page de connection admin en cas de mauvaise authentification 
    exit(); 




 }//fin if
 else {
   echo "Database not found";
 }//fin else

//fermer la connection
 mysqli_close($db_handle);
 ?>
