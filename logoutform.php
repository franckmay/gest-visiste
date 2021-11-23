<?php

include('visitor_out.php');
 
$userM = $_SESSION['user'];
if($_SESSION["loggedIn"] == 0)
	 	header("location: index.php");

?>



<html>

<head>
<link rel = "stylesheet" href= "BootStrap/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="navbar3.css">
<script src="BootStrap/js/jQuery.min.js"></script>
<script src="BootStrap/js/bootstrap.min.js"></script>

<style type="text/css">	

		

	


</style>

</head>
<body>

<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#" id = "lii"><?php echo "Logged in as : ".$userM;?></a>
    </div>
    <ul class="nav navbar-nav navbar-right">
      <li><a id = "li" href="front.php">Accueil</a></li>
      <li ><a id = "li" href="myform.php">Ajouter Visiteur</a></li>
      <li class="active"><a href="logoutform.php">Verifier visiteur</a></li>
      <li><a id = "li" href="query_data.php">Afficher les données</a></li> 
      <li ><a id = "li" href="logout.php">Se déconnecter</a></li> 
    </ul>
  </div>
</nav>
<div>
  <p ><h3 style = "padding-left: 25px">Ces visiteurs ont été déconnectés aujourd'hui!</h3></p><br>

</div>
<div class="row" style = "padding-left: 25px">

<?php 
include('db_connect_db_new.php');
$date = date("Y/m/d");
$query = "SELECT * FROM info_visitor WHERE  Status = 'OFFLINE'";
$res = mysqli_query( $link,$query);

    
      while($result = mysqli_fetch_array($res, MYSQLI_ASSOC))
        
            

            echo '<div class="col-sm-2">

             
  
             
       <div class="thumbnail" style = "width:175px;">
          
          <p style = "text-align:center;"><strong>'.$result['Name'].' </strong></p>
          <p>Receipt ID : '.$result['ReceiptID'].'</p>
          <p>Contact : '.$result['Contact'].'</p>
          <p>Time In : '.$result['TimeIN'].'</p>
          <p>Date    : '.$result['Date'].'</p>
          
          <p>Meeting : '.$result['meetingTo'].'</p>
         
         
        </div></div>';

?>
</div>

</body>
</html>