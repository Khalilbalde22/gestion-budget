<?php 
$alertDanger = '' ;
$alertWarnig = '' ;

if(isset($_GET['id'])){

    $id_code = $_GET['id'];
    $id = urlencode($id_code);

    $pdo = new PDO('mysql:host = localhost; dbname = gestion_budget', 'root', '');

    $sql = "DELETE FROM `gestion_budget`.`depense` WHERE  `id`= '$id' ";

    $response = $pdo->prepare($sql);

    $response->execute();

    if($response){
        $alertDanger = 'supprimé avec success !';
        header('location:historiqueDepense.php');
    }else{
        echo 'la suppression n\'a pas été effectuée ! ';
    }


}

