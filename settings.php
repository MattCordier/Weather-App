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
	var $id = $_SESSION['userid'];
	echo '<div class="data">
                <h3>Manage Customer</h3>
            </div>
            <div class="data">
            	<p>
                    <a href="create_customer.php" class="btn btn-success">Create</a>
                </p>
                <table class="table table-striped table-bordered">
                  <thead>
                    <tr>
                      <th>First Name</th>
		                  <th>Last Name</th>
                      <th>Phone</th>
                      <th>Date of Birth</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>';
                 
                 	include 'ecomm_connect.php';
                   $pdo = Database::connect();
                   $sql = 'SELECT * FROM customer WHERE id = ?';
                   $q = $pdo->prepare($sql);
        $q->execute(array($id));
        $data = $q->fetch(PDO::FETCH_ASSOC);
        Database::disconnect();
                 			echo 'poop';
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
                   
             		
                 
                echo  '</tbody>
            </table>
        </div>';
}


?>
</div><!--end container-->

<?php require "footer.php";?>
</body>

</html>