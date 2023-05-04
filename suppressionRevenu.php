<?php 
$alertDanger = '' ;
$alertWarnig = '' ;

if(isset($_GET['id'])){

    $id_code = $_GET['id'];
    $id = urlencode($id_code);

    $pdo = new PDO('mysql:host = localhost; dbname = gestion_budget', 'root', '');

    $sql = "DELETE FROM `gestion_budget`.`revenu` WHERE  `id`= '$id' ";

    $response = $pdo->prepare($sql);

    $response->execute();

    if($response){
        echo 'supprimé avec success !';
    }else{
        echo 'la suppression n\'a pas été effectuée ! ';
    }

    header('location:historiqueRevenu.php');

}