<div class="row">
                <h3>Category</h3>
            </div>
            <div class="row">
                <p>
                    <a href="category_create.php" class="btn btn-success">Create</a>
                </p>
                <table class="table table-striped table-bordered">
                  <thead>
                    <tr>
                      <th>Category Name</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                   include '../ecomm_connect.php';
                   $pdo = Database::connect();
                   $sql = 'SELECT * FROM category ORDER BY id DESC';
                   foreach ($pdo->query($sql) as $row) {
                            echo '<td>'. $row['name'] . '</td>';
                            
                            echo '<td width=250>';
                                echo '<a class="btn" href="category_read.php?id='.$row['id'].'">Read</a>';
                                echo ' ';
                                echo '<a class="btn btn-success" href="category_update.php?id='.$row['id'].'">Update</a>';
                                echo ' ';
                                echo '<a class="btn btn-danger" href="category_delete.php?id='.$row['id'].'">Delete</a>';
                                echo '</td>';
                            echo '</tr>';
                   }
                   Database::disconnect();
                  ?>
                  </tbody>
            </table>
        </div>