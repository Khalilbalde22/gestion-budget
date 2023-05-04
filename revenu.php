   <?php

    $alertSuccess = '' ;
    $alertDanger = '' ;

     function security($data) {
        //securiser les données entrées
        $data = trim($data);
        $data = stripslashes($data);
        $data = strip_tags($data);
        $data = htmlspecialchars($data);

        //specifier les type de données

        return $data;
   }

    if (isset($_POST['submit'])){

    if(isset($_POST['reference'] , $_POST['montant'] , $_POST['type'], $_POST['date']) 
    && !empty($_POST['reference'])
    && !empty($_POST['montant'])
    && !empty($_POST['type'])
    && !empty($_POST['date']) ){

   $reference = security($_POST['reference']);
    $montant = security($_POST['montant']);
    $type = security($_POST['type']);
    $date = security($_POST['date']);

    $pdo = new PDO('mysql:host = localhost; dbname = gestion_budget', 'root', '');

   // $sql = ("INSERT INTO 'revenu'('reference','montant') VALUES (:reference, :montant)");
    $sql = ("INSERT INTO `gestion_budget`.`revenu` (`reference`, `montant`,`type`, `date`) VALUES ('$reference', '$montant','$type', '$date') ");
   
    $response = $pdo->prepare($sql);

    // $response->bindParam(":reference", $reference);
    // $response->bindParam(":montant", $montant);
    // $response->bindParam(":type", $type);

    $ok = $response->execute();
    
    if($ok){
        $montant = security($_POST['montant']);
        $alertSuccess = 'Enregistrées avec success !';

    }else{
        $alertDanger = 'Error Enregistrement refusé !';
    }

    }else{
    
        echo 'veillez renseigner tous les champs';
    
    }
    
}

    
    $pdo = new PDO('mysql:host = localhost; dbname = gestion_budget', 'root', '');
    //calcul de la somme total des revenus
    $request = "SELECT SUM(montant) AS somme FROM `gestion_budget`.revenu";

    $result1 = $pdo->prepare($request);
    
    $result1->execute();

    if($result1){
        $row = $result1->fetch();
        $somme1 = $row['somme'];
    }else{
        echo 'error !';
    }

    //calcul de la somme total des depenses
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

   <?php include 'includes/header.php' ?>

            <!--les message d'alert avec success-->

            <?php if($alertSuccess != ''){ ?>
            <div class="alert alert-success alert-dismissible" role="alert">
                <?php echo $alertSuccess ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php }else{ ?>
                <div></div>
            <?php } ?>

            <!--message d'alerte avec danger-->
            <?php if($alertDanger != ''){ ?>
            <div class="alert alert-danger alert-dismissible" role="alert">
                <?php echo $alertDanger ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php }else{ ?>
                <div></div>
            <?php } ?>



    <h1 style="margin-left : 200px; margin-bottom: 50px; margin-top:20px;">Gestion des revenus</h1>

    <div class="row">
    
        <div class="col-md-6">
            <div style="margin-left: 20px" >
                <h2 style="margin-left :50px">Enregistrer un revenu</h2>

                <form method="post">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label"></label>
                            <input type="text" name="reference" class="form-control" id="exampleFormControlInput1" required="required" placeholder="reference">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label"></label>
                            <input type="number" name="montant" class="form-control" id="exampleFormControlInput1" required placeholder="montant">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mt-4">
                            <select class="form-select" name="type" required aria-label="Default select example">
                                <option>selectionner un type de revenu</option>
                                <option value="Salaire">Salaire</option>
                                <option value="Business">business</option>
                                <option value="Freelancing">freelance</option>
                                <option value="Autre">Autre</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label"></label>
                            <input type="date" name="date" class="form-control" id="exampleFormControlInput1" required placeholder="date">
                            </div>
                        </div>
                    </div>

                    <button name = "submit" class = "btn btn-primary" style = "margin-top : 15px;">Enregistrer</button>

                </form>
            </div>

        </div>
        <div class="col-md-6" style="text-align:center;">
            <h2>Récapitulatif</h2>
            <ol class="list-group">
                <li class="list-group-item">Montant du revenu Enregistré : <h3><?php if (isset($_POST['montant']))
                                                                            { 
                                                                            echo $montant ;
                                                                            }
                                                                            else{
                                                                            echo '0 ';
                                                                            } ?> cfa</h3></li>

                <li class="list-group-item">Votre revenu TOTAL : <h3><?php echo $somme1 - $somme2 ;?> CFA</h3></li>

                <li class="list-group-item"><?php if ( isset($_POST['montant'])){ 
                                                        if($_POST['montant']>0 && $_POST['montant']<5000){ ?>
                                                        <h3>c'est bien vous etes sur la bonne voie ! </h3>

                                            <?php }elseif($_POST['montant']>5000){ ?>
                                                        <h3>waww supper vous avez augementer votre productivitée !</h3>
                                            <?php } } ?>
                                            </li>
            </ol>
        </div>

    </div>

   <?php include 'includes/footer.php' ?>


