<!DOCTYPE html>
<html>
<?php require "header.php";?>
<body>
<?php session_start()?>	
<?php require "navigation.php";?>
<div class="container">
	<ul class="nav nav-tabs">
   		<li role="presentation"><a href="">Home</a></li>
   		<li role="presentation"><a href="#">Profile</a></li>
   		<li role="presentation"><a href="#">Messages</a></li>
 	</ul>

<?php 
if(isset($_SESSION['userid']) && $_SESSION['permission'] === "Guide"){
	require "trip_index.php";
	require "destination_index.php";
	require "style_index.php";		
} elseif(isset($_SESSION['userid']) && $_SESSION['permission'] === "Manager"){
	require "trip_index.php";
	require "destination_index.php";
	require "style_index.php";	
	require "customer_index.php";
	
} elseif(isset($_SESSION['userid']) && $_SESSION['permission'] === "Customer"){
	require 'ecomm_connect.php';
	echo $_SESSION['userid'];
	echo'<div class="row">';
    echo            '<h3>Update Your Settings</h3>';
     echo       '</div>';
         echo   '<div class="row">';
            
                echo'<table class="table table-striped table-bordered">';
                echo  '<thead>';
                 echo   '<tr>';
                     echo '<th>First Name</th>';
		                 echo '<th>Last Name</th>';
                    echo  '<th>Phone</th>';
                    echo  '<th>Date of Birth</th>';
                    echo  '<th>Action</th>';
                   echo '</tr>';
                 echo '</thead>';
                 echo '<tbody>';
	$pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM customer where id = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($_SESSION['userid']));
        $data = $q->fetch(PDO::FETCH_ASSOC); 

		echo '<tr>';
        echo '<td>'. $data['firstname'] . '</td>';
      	echo '<td>'. $data['lastname'] . '</td>';
		echo '<td>'. $data['phone'] . '</td>';
		echo '<td>'. $data['dob'] . '</td>';
		echo '<td width=250>';
		echo '<a class="btn" href="customer_read.php?id='.$data['id'].'">Read</a>';
		echo ' ';
		echo '<a class="btn btn-success" href="customer_update.php?id='.$data['id'].'">Update</a>';
		echo ' ';
		echo '<a class="btn btn-danger" href="customer_delete.php?id='.$data['id'].'">Delete</a>';
		echo '</td>';
		echo '</tr>';
}


?>
</div><!--end container-->

<?php require "footer.php";?>
</body>

</html>