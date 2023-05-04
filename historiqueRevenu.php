
<?php include 'includes/header.php' ?>

<?php 
    
    $pdo = new PDO('mysql:host = localhost; dbname = gestion_budget', 'root', '');

    $sql = "SELECT * FROM gestion_budget.revenu ";
   
    $response = $pdo->prepare($sql);
    $response->execute();

    if($response){
         

?>

              <!-- Bootstrap Table with Header - Light -->
              <div class="card">
                <h5 class="card-header">Historique des revenus</h5>
                <div class="table-responsive text-nowrap">
                  <table class="table">
                    <thead class="table-light">
                      <tr>
                        <th>id</th>
                        <th>Reference</th>
                        <th>Montant</th>
                        <th>Type</th>
                        <th>Date</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
            <?php
            while($row = $response->fetch()){
              $id = $row ['id'];
              $reference = $row['reference'];
              $montant = $row['montant'];
              $type = $row['type'];
              $date = $row['date'];
          
            ?>
                      <tr>
                        <td><?php echo $id ?></td>
                        <td><i class="fab fa-angular fa-lg text-danger me-3"></i><?php echo $reference; ?></td>
                        <td><strong><?php echo $montant ?></strong></td>
                        <td><?php echo $type ?></td>
                        <td><?php echo $date ?></td>
                        <td>
                         <div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                              <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu">
                                <a type = "button"  href="modificationRevenu.php?id=<?php echo $id ?>" class="dropdown-item"><i class="bx bx-edit-alt me-1"></i> Modifier</a>
                                <a type = "button"  href="suppressionRevenu.php?id=<?php echo $id ?>" class="dropdown-item" ><i class="bx bx-trash me-1"></i> Supprimer</a>
                              
                            </div>
                          </div>
                        </td>
                      </tr>
           <?php 
            }
    }
           ?>
                    </tbody>
                  </table>
                </div>
              </div>
              <!-- Bootstrap Table with Header - Light -->

<?php include 'includes/footer.php' ?>