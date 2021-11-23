<?php  include('db_connect_db_new.php');

        include('visitor_out.php');
    
		$user1 = $_SESSION["user"];
		
	if($_SESSION["loggedIn"] == 0)
	 	header("location: index.php");

   $tody = date("Y:m:d");
	 $sql = "SELECT Name FROM info_visitor WHERE Date = '$tody'";
  
   $sqlOnline = "SELECT * FROM info_visitor WHERE Status = 'ONLINE' LIMIT 10";

    $sqlRecent = "SELECT * FROM (SELECT * FROM info_visitor ORDER BY Serial DESC LIMIT 10) a ORDER BY Serial DESC";

   $resultToday = mysqli_num_rows(mysqli_query($link,$sql));   //recent Visitors
   $resultS = mysqli_query($link,$sqlOnline);       //Online Visitors




  
   $onlineVsitor = mysqli_num_rows($resultS);
  

	 
    $sqlResRecent = mysqli_query($link,$sqlRecent);


?>
<!DOCTYPE HTML5>
<html>
<head>

<link rel = "stylesheet" href= "BootStrap/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="navbar3.css">
<script src="BootStrap/js/jQuery.min.js"></script>
<script src="BootStrap/js/bootstrap.min.js"></script>




<style>

 body {
    max-width: 100%;
    max-height: 100%;
    overflow-y: hidden;
    overflow-x: hidden;
    
   }

	
img {width:100%;}
.affix {
      top:0;
      width: 100%;
      z-index: 9999 !important;
  }
  .navbar {
      margin-bottom: 0px;
  }

  .affix ~ .container-fluid {
     position: relative;
     top: 50px;
  }

  #coverPic{

    width: 100%;
    height:35%;
}
  .popover-title{
    background: #3EFE00 !important;
    color: #000000;
}
input[type='number'] {
    -moz-appearance:textfield;
}
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
    -webkit-appearance: none;
}
	
</style>
</head>
<body>
  <!-- Left and right controls -->



	<nav class="navbar navbar-default"  data-offset-top="228">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#" id = "lii"><span >GESTION DES VISITEURS</span></a>
    </div>
    <ul class="nav navbar-nav navbar-right">
      <li class="active"><a  href="front.php">Accueil</a></li>
      <li><a id = "li" href="myform.php" >Ajouter Visiteur</a></li>
      <li><a id = "li" href="logoutform.php" >Verifier visiteur</a></li>
      <li><a id = "li" href="query_data.php" >Afficher les données</a></li> 
      <li><a id = "li" href="logout.php" >Se déconnecter</a></li> 
    </ul>
  </div>
</nav>

<!--<?php echo "<h3 style = 'padding-left:15px;''> Welcome ' $user1 ' :</h3>";?> -->

	
  <div class="row">
    
<div class="col-sm-3" style="padding-left:50px;height:100%;"> 

 <div><h3>Fin de visite</h3></div>
 <div style="padding-top:20px;display:block;">
    <form method= "POST" action = "">
   

   
  


    <div class="form-group">
<label class="control-label" id ="t" for="recept_id">Identifiant du badge :</label>
 
<input class = "form-control" name= "rid" type = "number"  placeholder="Entrer l indentifiant du badge." required/>
 
    </div>


<?php {?>

<input id="x" name ="logout" value = "Valider" type ="submit" onclick='return confirm("Êtes-vous sûr de vouloir terminer visite?")'>

<?php }?>

<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
if($success == 1)
  echo "<span style = 'color:green;'>Effectue !</span>";

else 
echo "<span style = 'color:red;''>Desole ! Aucun visiteur avec cet id.</span>";

}
?>
    </form><br>

</div>



</div>
<div class="col-sm-5" style="padding-left: 50px;"> 
<h3 style="padding-left:10px;text-align:center;">Details</h3>

<?php 

  $showResultFor = 0;

  if(isset($_GET['rid'])){
    $showResultFor = $_GET['rid'];
  }
  $query = "SELECT * FROM info_visitor WHERE ReceiptID = '$showResultFor' AND Status = 'ONLINE' ";

            $getresult = mysqli_query($link,$query);
            $resultDetails = mysqli_fetch_array($getresult, MYSQLI_ASSOC);

           

   if($resultDetails) {?>
      
        <div  class="row" >

      

      
      <div class="col-sm-8" style = "padding-left:25px;padding-top:15px; font-size:16px;">

    
        <p style="width: 678px;" id="col-1">Date :<?php echo $resultDetails['Date'];?>&nbsp;&nbsp;
           Heure d arrivee :&nbsp;<?php echo $resultDetails['TimeIN'];?></p>
        
        <span id="col-1" name="main">Nom :&nbsp;
          <?php echo $resultDetails['Name'];?></span><br>
        <span id="col-1">Telephone :&nbsp;
          <?php echo $resultDetails['Contact']?><br>
          <span id="col-1">Motif :&nbsp;
            <?php echo $resultDetails['Purpose'];?></span><br>
          <span id="col-1">type de visite :&nbsp;
            <?php echo $resultDetails['meetingTo'];?></span><br>
          <span id="col-1">Badge ID :&nbsp;
            <?php echo $resultDetails['ReceiptID'];?></span><br>
          <span id="col-1">Details :&nbsp;
            <?php echo $resultDetails['Comment'];?></span><br>
        </span>
        
        </div>
    </div>

<?php }?>

</div>
<div class="col-sm-4" style="height:100%;"> 
<h3 style="margin-right:auto;padding-left:40px;">visiteurs récents :&nbsp;<?php echo $onlineVsitor;?></h3>
<ul class="list-group" style="width:80%;padding-top:20px;">
<script>
$(document).ready(function(){
    $('[data-toggle="popover"]').popover({
    container: 'body'
});
});
</script>
<?php 

  while($result2 = mysqli_fetch_array($resultS, MYSQLI_ASSOC))
     
     echo '<div  style = "padding-right:45px;padding-left:20px;">
            
            <li class = "list-group-item" style="height :30px;padding-top:3px;"> 
            
            <a style = "font-size:15px;"  href="front.php?rid='.$result2['ReceiptID'].'" data-html="true"  

            title="<b>'.$result2['Name'].'<b>" data-toggle="popover" data-trigger="hover"

            data-content="Contact : '.$result2['Contact'].' <br>Arrivee : '.$result2['TimeIN'].' 

            <br>Motif : '.$result2['Purpose'].'
            
            <br> B ID : '.$result2['ReceiptID'].'">'.$result2['Name'].'</a>
          
          
          
          </li>
          </div>'
?>
</ul>
</div>

<body/>
<html/>
