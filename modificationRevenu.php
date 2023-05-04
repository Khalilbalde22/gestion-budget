<?php 

include 'includes/header.php';

$alertDanger = '' ;
$alertWarnig = '' ;
$id = '' ;

//recuperation et affichage de données a modifier dans un formulaire
if(isset($_GET['id'])){

        $id = $_GET['id'];
        $pdo = new PDO('mysql:host = localhost; dbname = gestion_budget', 'root', '');

        $sql = "SELECT * FROM `gestion_budget`.`revenu` WHERE `id` = '$id' ";

        $response = $pdo->prepare($sql);

        $response->execute();

        if($response->rowCount() > 0){
        
        $row = $response->fetch(); 

        }else{
         echo 'aucune valeur trouvée ';
        }


}



//traitement du formulaire de modification

 if (isset($_POST['submit'])){
         if(isset($_POST['reference'], $_POST['montant'], $_POST['type'], $_POST['date'])
         && !empty($_POST['reference'])
         && !empty($_POST['montant'])
         && !empty($_POST['type'])
         && !empty($_POST['date'])){

      
            $reference = $_POST['reference'];
            $montant = $_POST['montant'];
            $type = $_POST['type'];
            $date = $_POST['date'];

            $pdo = new PDO('mysql:host = localhost; dbname = gestion_budget', 'root', '');

            // $sql = ("INSERT INTO 'revenu'('reference','montant') VALUES (:reference, :montant)");
            $sql = ("UPDATE `gestion_budget`.`revenu` SET `reference`='$reference', `montant`='$montant', `type`='$type', `date`='$date' WHERE  `id`=$id");
            
            $response = $pdo->prepare($sql);

            // $response->bindParam(":reference", $reference);
            // $response->bindParam(":montant", $montant);
            // $response->bindParam(":type", $type);

            $ok = $response->execute();

            if($ok){
            
               $alertWarnig = 'Données modifiées avec success !';
            }
            else{
               $alertDanger = 'une erreur est survenu ! ';
            }


         }

      }

?>


            <!--les message d'alert avec success-->

            <?php if($alertWarnig != ''){ ?>
            <div class="alert alert-success alert-dismissible" role="alert">
                <?php echo $alertWarnig ?>
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

            <!--formulaire de modification-->
<div class="col-md-12">
   <div style="margin-left: 50px; " >
         <h2 style="margin-left :100px; ">Effectuer la modification </h2>

         <form method="post">
            <div class="row">
               <div class="col-md-6">
                     <div class="mb-3">
                     <label for="exampleFormControlInput1" class="form-label"></label>
                     <input type="text" name="reference" value="<?php echo $row['reference'] ?? ''; ?>" class="form-control" id="exampleFormControlInput1" required="required" placeholder="reference">
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


<?php include 'includes/footer.php'; ?>