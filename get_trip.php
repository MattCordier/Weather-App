<?php
	include 'ecomm_connect.php';
    $pdo = Database::connect();
    $style = $_GET['style'];
    $dest = $_GET['destination'];

    $sql = "SELECT * FROM trip ";
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
            header('Content-type: image/jpg');
      
      foreach ($pdo->query($sql) as $row) {
       	echo '<div class= col-sm-4>';
        echo '<h2>'. $row['name'] . '</h2>';
        echo '<p>'. $row['description'] . '</p>';
        echo '<p>'. '$'. $row['cost'] . '</p>';
        echo '</div>';
      } 
   
       Database::disconnect();

?>

