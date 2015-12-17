<?php 
include 'ecomm_connect.php';
    $pdo = Database::connect();
session_start(); ?>


<!DOCTYPE html>
<html>
<?php require "header.php";?>	
<body>
<?php require "navigation.php";
if(isset($_SESSION['id'])){
	echo "Hello". $firstname;
}
?>
<!--Flex Slider CSS-->
      
      

      <!--Flex Slider Script-->
      
	<div id="pallet" class="container main-bg">
	    <div class="flexslider">
	      <ul class="slides">
	        <li>
	          <img src="assets/img/apex_summit.jpg" title="Apex mountain trips." alt="Apex mountain trips."/>
	        </li>
	        <li>
	          <img src="assets/img/apex_stream.jpg" title="Apex woodland trail hikes." alt="Apex woodland trail hikes."/>
	        </li>
	        <li>
	          <img src="assets/img/apex_plank_hiker.jpg" title="Day Hikes." alt="Day Hikes."/>
	        </li>
	      </ul>
	    </div> <!--end flexslider-->

	    <h1 class="main-title">Hiking Tours</h1>

	    <div class="row trip">
	    	<div class="col-xs-4 trip-card">
	    		<img class="trip-img" src="assets/img/apex_northwest_trail.jpg" title="#" alt="#">
	    		<p>suck</p>
	    	</div>
	    	<div class="col-xs-4 trip-card">
	    		<img class="trip-img" src="assets/img/apex_orange_mountain.jpg" title="#" alt="#">
	    		<p>a</p>
	    	</div>
	    	<div class="col-xs-4 trip-card">
	    		<img class="trip-img" src="assets/img/apex_green_forest.jpg" title="#" alt="#">
	    		<p>duck</p>
	    	</div>
	    </div>

	</div> <!-- /container -->
    <div id="tripsearch" class="container main-bg">
        <div class="row">
        	<div  class="col-xs-12">	

        	</div>
        </div><!--end row-->
    </div>	    

<?php require "footer.php";?>
<script src="assets/js/jquery.flexslider-min.js"></script>
<link rel="stylesheet" href="assets/css/flexslider.css" type="text/css">
<script type="text/javascript" charset="utf-8">
          $(window).load(function() {
            $('.flexslider').flexslider();
          });
      </script>

<!--Flex Slider jQuery-->
</body>

</html>

