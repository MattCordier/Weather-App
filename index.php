<!DOCTYPE html>
<html>
	
<body>
<?php require "navigation.php";?>
<!--Flex Slider CSS-->
      <link rel="stylesheet" href="assets/css/flexslider.css" type="text/css">
<!--Flex Slider jQuery-->
      <script src="assets/js/jquery.flexslider-min.js"></script>

      <!--Flex Slider Script-->
      <script type="text/javascript" charset="utf-8">
          $(window).load(function() {
            $('.flexslider').flexslider();
          });
      </script>
	<div class="container-fluid">
    <div class="flexslider">
      <ul class="slides">
        <li>
          <img src="assets/img/apex_summit.jpg" title="winter sale event." alt="GoPup Winter Event."/>
        </li>
        <li>
          <img src="assets/img/apex_stream.jpg" title="leash and collars." alt="GoPup Leashes and Collars."/>
        </li>
        <li>
          <img src="assets/img/apex_plank_hiker.jpg" title="GoPup guarantee." alt="GoPup guarantee."/>
        </li>
      </ul>
    </div> <!--end flexslider-->

<?php require "footer.php";?>
</body>

</html>

