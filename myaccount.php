<?php 
require 'ecomm_connect.php';
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
?>        