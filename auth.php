<?php

function est_connecter():bool{
    if(session_start() === PHP_SESSION_NONE ){
        session_start();
    }
   return !empty($_SESSION['email']);
};

function forcer_connexion():void {
    if(!est_connecter()){
      header('location:connexion.php');
      exit();
  };
}