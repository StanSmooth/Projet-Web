<?php


session_start();


?>


<!DOCTYPE html>

<html>

<head>
	
	<meta charset="utf-8"/>
	<link href="menu.css" rel="stylesheet" type="text/css" />
	<title> Menu principal </title>
	   <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>

        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link rel="stylesheet" type="text/css" href="footer.css">
        <link rel="stylesheet" type="text/css" href="style.css">
        <link rel="stylesheet" type="text/css" href="navbar.css">
        <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

</head>


<body>
    <h1>Social Media ECE</h1>
    <nav class="navbar navbar-default navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span> 
      </button>
      
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
       <li><a href="menu4.html">Accueil</a> </li>
			<li><a href="chronologie.php">Chronologie</a></li>
			<li><a href="a_propos.php">A propos</a></li>
			<li><a href="amis.php">Amis</a></li>
			<li><a href="photos.php">Photos</a></li>
      </ul>
    </div>
  </div>
</nav>
    <div class="container-fluid text-center bg-grey">
  <h2>A Propos</h2>
  
        <div class="col-sm-2"></div>
  <div class="row text-center">
    <div class="col-sm-4">
      <div class="thumbnail">
        <img src="<?php echo $_SESSION['photoProfil']; ?>" alt="photo de profil"width="300" class="img-rounded"/>
        <p><strong><?php echo $_SESSION['pseudo']; ?></strong></p>
        
      </div>
    </div>
  
    <div class="col-sm-4">
      <div class="thumbnail">
        <p><br><br><br><strong>A PROPOS</strong></p>
        <p>		<p>

            <br><br>
			Nom : 	<?php echo $_SESSION['nom']; ?> <br />
			Pseudo : 	<?php echo $_SESSION['pseudo']; ?> <br />
			Age : <?php echo $_SESSION['age']; ?> <br />
			Ville : <?php echo $_SESSION['ville']; ?> <br />
			Date de naissance: <?php echo $_SESSION['date_naiss']; ?> <br />
			N° de tel : <?php echo $_SESSION['num']; ?> <br />
			Majeure : <?php echo $_SESSION['majeure']; ?> <br />
			E-mail ECE : <?php echo $_SESSION['email']; ?> <br />
			<br><br><br><br><br><br>

		</p></p>
      </div>
    </div>
    <div class="col-sm-2"></div>
</div>



<footer>Site créé par OGBI Lena, Massis Hugo et KOURGANOFF Adrien Copyright &copy; 2017 ECE Paris <br />
</footer>

</body>



</html>