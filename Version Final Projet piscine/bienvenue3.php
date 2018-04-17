<?php


session_start();


?>


<!DOCTYPE html>

<html>

<head>

  <meta charset="utf-8"/>
  <title> Bienvenue </title>
  
          <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>

        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link rel="stylesheet" type="text/css" href="footer.css">
        <link rel="stylesheet" type="text/css" href="style.css">
        <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

</head>


<body>
<h1>Social Media ECE</h1>
<p>

        

    </p>
 <br>
           <div class="container">
            <div class="row">
                <div class="col-xs-10 col-xs-offset-1 col-sm-6 col-sm-offset-3 col-md-5 col-md-offset-4 col-lg-4 col-lg-offset-4">

                    <div class="panel panel-default box-shadow">
                        <div class="panel-heading">
                            <span class="text-primary">Bienvenue <?php echo $_SESSION['pseudo']; ?> !<br /></span>
                            <span class="text-muted pull-right today" title="Today"></span>              
                        </div><!--.panel-heading-->

                        <div class="panel-body">
                            <form method="POST">

                                <a href="menu4.html" class="btn btn-block btn-primary" tabindex="5">C'est parti !</a>
                                
                        </div>
                    </div><!--.panel-->
                </div><!--.cols-->
            </div><!--.row-->
        </div><!--.container-->

   <footer>
        © 2017, All rights reserved 2017. Site crée par Hugo, Lena et Adrien
    </footer>
</body>

</html>



