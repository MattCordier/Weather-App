<?php
	include 'ecomm_connect.php';
                   $pdo = Database::connect();

                   $style = $_GET['style'];
                   $dest = $_GET['destination'];

                   $sql = "SELECT * FROM trip";


                   	if($style!=="all"){
                   		$sql .= "WHERE style_id = " . $style;
                   	    if($dest!=="all"){
							$sql .= " AND destination_id = " . $dest;
						}
                   	} elseif ($dest!=="all") {
						$sql .= " WHERE destination_id = " . $dest;
                   	}

                   $sql .= " ORDER BY id DESC";

                   echo "<p>" . $sql . "</p>";

                   foreach ($pdo->query($sql) as $row) {
                            echo '<p>'. $row['name'] . '</p>';
                            echo '<p>'. $row['description'] . '</p>';
                            echo '<p>'. $row['cost'] . '</p>';
                           
                   }
                   Database::disconnect();

?>

