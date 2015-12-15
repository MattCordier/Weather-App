
<?php 

	include 'ecomm_connect.php';
    $pdo = Database::connect();
    $searchField = $_GET['searchField'];
    $search = "%".$searchField."%";
                

    $sql = "SELECT * FROM trip WHERE name= ?";
    	$q = $pdo->prepare($sql);
        $q->execute(array($search));
        $data = $q->fetchAll();
    	// echo "<script>console.log('" . $sql . "');</script>";
    	
        $test = '';
      // foreach ($data as $row) {

      	$test .= ($data['name']);
      //  	echo '<div class= col-sm-4>';
      //   echo '<h2>'. $row['name'] . '</h2>';
      //   echo '<p>'. $row['description'] . '</p>';
      //   echo '<p>'. '$'. $row['cost'] . '</p>';
      //   echo '</div>';
               
       // }
       Database::disconnect();


?>

