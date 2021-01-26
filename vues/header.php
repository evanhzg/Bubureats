<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>BUBUR Eats  - <?php echo $pagetitle ?></title>

  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
  <script src="https://kit.fontawesome.com/886bfe691e.js" crossorigin="anonymous"></script>

  <!-- Custom fonts for this template -->
  <link href="https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i" rel="stylesheet">
  <link href="css/styles.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/one-page-wonder.min.css" rel="stylesheet">

</head>

<body>

  <!-- Navigation -->
  <nav id="header" class="navbar navbar-expand-lg navbar-dark navbar-custom">
    <div class="container">
      <div class="d-flex w-100">
        <a class="navbar-brand" href="index.php">BUBUR Eats</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="input-group d-flex justify-content-end align-items-end mr-4">
          <div class="form-outline">
            <input id="search-input" type="search" id="form1" class="form-control" placeholder="MIAM-MIAM" />
          </div>
          <button id="search-button" type="button" class="btn btn-primary">
            <i class="fas fa-search"></i>
          </button>
        </div>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <?php
            if(isset($_SESSION['id'])){
                $membres = db_get('membres', $_SESSION['id']);
                $role = $membres[0]['role'];
                if($role != 'restaurateur'){
                  echo parse('menu-connected.html', $userinfo);
                }
                else{
                  echo parse('menu-connected-restaurateur.html', $userinfo);
                }
            }
            else{
              echo parse('menu-connexion.html', []);
            }
            ?>
          </ul>
        </div>
      </div>
    </div>
  </nav>

  <div id="main">