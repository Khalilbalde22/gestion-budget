<?php

if (isset($_POST['submit'])){

   $reference = $_POST['reference'];
    $montant = $_POST['montant'];
    $type = $_POST['type'];

    $pdo = new PDO('mysql:host = localhost; dbname = gestion_budget', 'root', '');

   // $sql = ("INSERT INTO 'revenu'('reference','montant') VALUES (:reference, :montant)");
    $sql = ("INSERT INTO `gestion_budget`.`revenu` (`reference`, `montant`,`type`) VALUES ('$reference', '$montant','$type')");
   
    $response = $pdo->prepare($sql);

    // $response->bindParam(":reference", $reference);
    // $response->bindParam(":montant", $montant);
    // $response->bindParam(":type", $type);

    $ok = $response->execute();
    
    if($ok){
        echo $_POST['montant'];
    }else{
        echo 'recommence';
    }


}

?>
