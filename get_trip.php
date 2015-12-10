<?php
	include 'ecomm_connect.php';
                   $pdo = Database::connect();

                   $style = $_GET['style'];
                   $dest = $_GET['destination'];
                   $sql = "SELECT * FROM trip WHERE style_id = '$style' AND destination_id ='$dest' ORDER BY id DESC";
                   if 
                   foreach ($pdo->query($sql) as $row) {
                            echo '<p>'. $row['name'] . '</p>';
                            echo '<p>'. $row['description'] . '</p>';
                            echo '<p>'. $row['cost'] . '</p>';
                           
                   }
                   Database::disconnect();

?>

