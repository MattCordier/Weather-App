
<?php 

	include 'ecomm_connect.php';
    $pdo = Database::connect();
    $searchField = $_GET['searchField'];
     
                

    $sql = "SELECT * FROM trip name =".$searchField;
     	

    		echo "<script>console.log('" . $sql . "');</script>";
            header('Content-type: image/jpg');

      // foreach ($pdo->query($sql) as $row) {
      //  	echo '<div class= col-sm-4>';
      //   echo '<h2>'. $row['name'] . '</h2>';
      //   echo '<p>'. $row['description'] . '</p>';
      //   echo '<p>'. '$'. $row['cost'] . '</p>';
      //   echo '</div>';
               
      //  }
       Database::disconnect();


?>

