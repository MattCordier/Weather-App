
<?php 

	include 'ecomm_connect.php';
    $pdo = Database::connect();


    if (!empty($_GET['searchField'])){
      $searchField = $_GET['searchField'];

    }
    
     
          
    $sql = "SELECT * FROM trip WHERE name LIKE '%".$searchField."%' OR description LIKE '%".$searchField."%' OR cost LIKE '%".$searchField."%'";
    $q = $pdo->prepare($sql);
    $q->execute(array($searchField));
    $data = $q->fetchAll();
    $test = '';
    
      foreach ($data as $row) {
        if ($test > 1){
          $test .= ($data['name']);
          echo '<div class= col-sm-4>';
          echo '<h2>'. $row['name'] . '</h2>';
          echo '<p>'. $row['description'] . '</p>';
          echo '<p>'. '$'. $row['cost'] . '</p>';
          echo '</div>';
          }elseif ($test == '') {
      echo "no result";
    }
                 
       }
      
    
    	
    	
      
      
       
       Database::disconnect();


?>

