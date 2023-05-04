
<?php
  include 'includes/header.php'; 
 ?>

<?php

  $pdo = new PDO('mysql:host = localhost; dbname = gestion_budget', 'root', '');
  $request = "SELECT SUM(montant) AS somme FROM `gestion_budget`.revenu";

  $result1 = $pdo->prepare($request);
  
  $result1->execute();

  if($result1){
    $row = $result1->fetch();
    $somme1 = $row['somme'];
  }else{
    echo 'error !';
  }

  
  $request = "SELECT SUM(montant) AS somme FROM `gestion_budget`.depense";
  $result2 = $pdo->prepare($request);
  $result2->execute();

  if($result2){
    $row = $result2->fetch();
    $somme2 = $row['somme'];

  }else{
    echo 'error !';
  }

 ?>

            <!-- <?php if($alert != ''){ ?>
            <div class="alert alert-danger alert-dismissible" role="alert">
                <?php echo $alert ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php }else{ ?>
                <div></div>
            <?php } ?> -->
        
            <div class="row">
                <div class="col-lg-8 mb-4 order-0">
                  <div class="card">
                    <div class="d-flex align-items-end row">

                      <div class="col-sm-7">
                        <div class="card-body">
                          <h5 class="card-title text-primary">BIEN VENU DANS VOTRE SYSTEME DE GESTION DE REVENU ! 🎉</h5>
                          <p class="mb-4">
                            "Le secret pour devenir riche est de <span class="fw-bold">dépenser moins</span> que ce que l'on gagne et <span class="fw-bold">d'économiser</span> la différence." - Warren Buffett
                          </p>

                        </div>
                      </div>

                      <div class="col-sm-5 text-center text-sm-left">
                        <div class="card-body pb-0 px-0 px-md-4">
                          <img
                            src="assets/img/illustrations/man-with-laptop-light.png"
                            height="150"
                            alt="View Badge User"
                            data-app-dark-img="illustrations/man-with-laptop-dark.png"
                            data-app-light-img="illustrations/man-with-laptop-light.png"
                          />
                        </div>
                      </div>

                    </div>
                  </div>
                </div>
                <div class="col-lg-4 col-md-4 order-1">
                  <div class="row">

                    <div class="col-lg-6 col-md-12 col-6 mb-4">
                      <div class="card">
                        <div class="card-body">
                          <div class="card-title d-flex align-items-start justify-content-between">
                            <div class="avatar flex-shrink-0">
                              <img
                                src="assets/img/icons/unicons/chart-success.png"
                                alt="chart success"
                                class="rounded"
                              />
                            </div>
                          </div>
                          <span class="fw-semibold d-block mb-1">REVENUS</span>
                          <h3 class="card-title mb-2"><?php echo $somme1 ?> CFA</h3>
                        </div>
                      </div>
                    </div>

                    <div class="col-lg-6 col-md-12 col-6 mb-4">
                      <div class="card">
                        <div class="card-body">

                          <div class="card-title d-flex align-items-start justify-content-between">
                            <div class="avatar flex-shrink-0">
                              <img
                                src="assets/img/icons/unicons/wallet-info.png"
                                alt="Credit Card"
                                class="rounded"
                              />
                            </div>
                           
                          </div>
                          <span>DEPENSES</span>
                          <h3 class="card-title text-nowrap mb-1"><?php echo $somme2 ?></h3>
                        </div>
                      </div>
                    </div>

                    <div class="col-lg-12 col-md-12 col-12 mb-4">
                      <div class="card">
                        <div class="card-body">

                          <div class="card-title d-flex align-items-start justify-content-between">
                            <div class="avatar flex-shrink-0">
                              <img
                                src="assets/img/icons/unicons/wallet-info.png"
                                alt="Credit Card"
                                class="rounded"
                              />
                            </div>
                           
                          </div>
                          <span>SOLDE TOTAL </span>
                          <h3 class="card-title text-nowrap mb-1"><?php echo $somme1 - $somme2 ?> CFA</h3>
                        </div>
                      </div>
                    </div>

                  </div>
                </div>

            </div> 



<?php include 'includes/footer.php' ?>
