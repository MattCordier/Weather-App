<?php
	include 'ecomm_connect.php';
                   $pdo = Database::connect();
                   $sql = 'SELECT * FROM trip WHERE style_id = 1 ORDER BY id DESC';
                   foreach ($pdo->query($sql) as $row) {
                            echo 'p>'. $row['name'] . '</p>';
                            echo 'p>'. $row['description'] . '</p>';
                            echo 'p>'. $row['cost'] . '</p>';
                           
                   }
                   Database::disconnect();

?>

