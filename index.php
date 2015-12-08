<!DOCTYPE html>
<html>
	
<body>
<?php require "navigation.php";?>
<!--Flex Slider CSS-->
      
      

      <!--Flex Slider Script-->
      
	<div class="container">
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

	    <h1></h1>
	</div><!--end container-->	    

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

