<?php
	include 'ecomm_connect.php';
    $pdo = Database::connect();
    $pdo->setAttribute(PDO::ATTR_FETCH_TABLE_NAMES, true);
    $style = $_GET['style'];
    $dest = $_GET['destination'];

    $sql = "SELECT * FROM trip";

     	if($style!=="all"){
     		$sql .= " WHERE style_id = " . $style;
     	    if($dest!=="all"){
        $sql .= " AND destination_id = " . $dest;
      }
     	  } elseif ($dest!=="all") {
            $sql .= " WHERE destination_id = " . $dest;
     	    }

        $sql .= " ORDER BY id DESC";

    				echo "<script>console.log('" . $sql . "');</script>";

      foreach ($pdo->query($sql) as $row) {
       	echo '<div class= col-sm-4>';
        echo '<h2>'. $row['trip.name'] . '</h2>';
        echo '<p>'. $row['trip.description'] . '</p>';
        echo '<p>'. '$'. $row['trip.cost'] . '</p>';
        // echo '<img src=" '.$row['image']. '"/>';
        echo '</div>';
               
       }
       Database::disconnect();

?>

