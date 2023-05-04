
<?php

$alertsuccess = '' ;
$alertdanger = '' ;

if (isset($_POST['submit'])){

    if(isset($_POST['nom'], $_POST['email'], $_POST['password']) 
        && !empty($_POST['nom']) 
        && !empty($_POST['email']) 
        && !empty($_POST['password'])){

        $nom = $_POST['nom'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        $pdo = new PDO('mysql:host = localhost; dbname = gestion_budget', 'root', '');

        $sql = ("INSERT INTO `gestion_budget`.`utilisateur` (`nom`, `email`,`password`) VALUES ('$nom', '$email','$password')");
    
        $response = $pdo->prepare($sql);

        $response->execute();

        $alertsuccess = 'vous etes enregistré avec succée';

        

    
    }else{
    
     $alertdanger = 'veillez renseigner tous les champs';
    
    }


}


?>


<!DOCTYPE html>

<html
  lang="en"
  class="light-style customizer-hide"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="assets/"
  data-template="vertical-menu-template-free"
>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title>Enregistrement</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="assets/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="assets/vendor/fonts/boxicons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

    <!-- Page CSS -->
    <!-- Page -->
    <link rel="stylesheet" href="assets/vendor/css/pages/page-auth.css" />
    <!-- Helpers -->
    <script src="assets/vendor/js/helpers.js"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="assets/js/config.js"></script>
  </head>

  <body>
    <!-- Content -->

    <div class="container-xxl">
      <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner">
        <!--alert success-->
        <?php if($alertsuccess != ''){ ?>
            <div class="alert alert-success alert-dismissible" role="alert">
            <?php echo $alertsuccess ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php }else{ ?>
            <div></div>
        <?php } ?>
        <!-- alert danger -->
        <?php if($alertdanger != ''){ ?>
            <div class="alert alert-danger alert-dismissible" role="alert">
            <?php echo $alertdanger ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php }else{ ?>
            <div></div>
        <?php } ?>


          <!-- Register Card -->
          <div class="card">
            <div class="card-body">
              <!-- Logo -->
              <div class="app-brand justify-content-center">
                <a href="index.html" class="app-brand-link gap-2">
                  <span class=" demo text-body fw-bolder" style="font-size:40px;">GBUDGET</span>
                </a>
              </div>
              <!-- /Logo -->
              <h4 class="mb-2">L'aventure commence ici 🚀</h4>
              <p class="mb-4">Enregistrer vous sa vous prend just quelques minutes</p>

              <form class="mb-3" method="POST">
                <div class="mb-3">
                  <label for="nom" class="form-label">Nom</label>
                  <input
                    type="text"
                    class="form-control"
                    name="nom"
                    placeholder="Entrer votre pseudo"
                  />
                </div>
                <div class="mb-3">
                  <label for="email" class="form-label">Email</label>
                  <input type="email" class="form-control" name="email" placeholder="votre email" />
                </div>
                <div class="mb-3 form-password-toggle">
                  <label class="form-label" for="password">Password</label>
                  <div class="input-group input-group-merge">
                    <input
                      type="password"
                      class="form-control"
                      name="password"
                      placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                      aria-describedby="password"
                    />
                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                  </div>
                </div>
                
                <button name="submit" class="btn btn-primary d-grid w-100">Enregistrer</button>
              </form>

              <p class="text-center">
                <span>Vous avez deja un compte ?</span>
                <a href="connexion.php">
                  <span>Connexion</span>
                </a>
              </p>
            </div>
          </div>
          <!-- Register Card -->
        </div>
      </div>
    </div>

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="assets/vendor/libs/jquery/jquery.js"></script>
    <script src="assets/vendor/libs/popper/popper.js"></script>
    <script src="assets/vendor/js/bootstrap.js"></script>
    <script src="assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <script src="assets/vendor/js/menu.js"></script>
   
    <script src="assets/js/main.js"></script>

    <!-- Page JS -->

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
  </body>
</html>
