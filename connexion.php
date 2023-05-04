
<?php

$alert = '' ;

session_start();

if(isset($_POST['submit'])){

    $email = $_POST['email'];
    $password = $_POST['password'];

    $pdo = new PDO('mysql:host = localhost; dbname = gestion_budget', 'root', '');

    $sql = "SELECT * FROM gestion_budget.utilisateur WHERE email = '$email' and password = '$password'";
   
    $response = $pdo->prepare($sql);
    $response->execute();

    if($response->rowCount() > 0){

        $_SESSION['email'] = $email;
        $_SESSION['password'] = $password;
    
        $donneeRetournee = $response->fetchAll();

        $alert = 'bien venu dans votre environnement de travaille ! noubliez pas de vous deconnecter avant de quiter';
        header('location: index.php'); 

    }else{
    
        $alert = 'echec de la connexion !' ;
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

    <title>Connexion</title>

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

            <!--L'alerte pour lautehntification refusée-->
            <?php if($alert != ''){ ?>
            <div class="alert alert-danger alert-dismissible" role="alert">
                <?php echo $alert ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php }else{ ?>
                <div></div>
            <?php } ?>

          <!-- Register -->
          <div class="card">
            <div class="card-body">
              <!-- Logo -->
              <div class="app-brand justify-content-center">
                <a href="connexion.php" class="app-brand-link gap-2">
                  <span class=" demo text-body fw-bolder" style="font-size:40px;">GBUDGET</span>
                </a>
              </div>
              <!-- /Logo -->
              <h4 class="mb-2">Bine venu dans GBUDGET! 👋</h4>
              <p class="mb-4">Veillez vous connecter pour continuer l'avanture .</p>

              <form class="mb-3" method="POST">
                <div class="mb-3">
                  <label for="email" class="form-label">Email</label>
                  <input
                    type="email"
                    class="form-control"
                    id="email"
                    name="email"
                    required
                    placeholder="entrez votre email"
                  />
                </div>
                <div class="mb-3 form-password-toggle">
                  <div class="d-flex justify-content-between">
                    <label class="form-label" for="password">Password</label>
                    <a href="#">
                      <small>Mots de passe oublié ?</small>
                    </a>
                  </div>
                  <div class="input-group input-group-merge">
                    <input type="text" id="password" class="form-control" name="password" required placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" />
                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                  </div>
                </div>
                
                <div class="mb-3">
                  <button class="btn btn-primary d-grid w-100" name="submit">Connexion</button>
                </div>

              </form>

              <p class="text-center">
                <span>C'est votre premiére fois ?</span>
                <a href="creationCompte.php">
                  <span>Créer un compte</span>
                </a>
              </p>
            </div>
          </div>
          <!-- /Register -->
        </div>
      </div>
    </div>

    <!-- / Content -->

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="assets/vendor/libs/jquery/jquery.js"></script>
    <script src="assets/vendor/libs/popper/popper.js"></script>
    <script src="assets/vendor/js/bootstrap.js"></script>
    <script src="assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <script src="assets/vendor/js/menu.js"></script>

    <script src="assets/js/main.js"></script>

    <!-- Page JS -->

  </body>
</html>
