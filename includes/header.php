<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="<?=APP_URL?>css/styles.css">
    <title>Copia Wordpress</title>
  </head>
  <body>
  <!-- Header -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">  
        <a class="navbar-brand" href="<?=APP_URL?>">
            <?=APP_NAME?>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
            <?php if(!isset($_SESSION["userdata"])): ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?=APP_URL?>login">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link link-important" href="<?=APP_URL?>register">Registro</a>
                </li>
            <?php elseif($_SESSION["userdata"]["count"] == "C"):?>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown">
                        Trabajos
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Mis Ofertas</a>
                        <a class="dropdown-item" href="<?=APP_URL?>create_job">Crear Trabajo</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?=APP_URL?>perfil"><?=$_SESSION["userdata"]["username"]?></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link link-important" href="<?=APP_URL?>logout">Log Out</a>
                </li>
            <?php else: ?>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown">
                        Trabajos
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Mis Trabajos</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?=APP_URL?>profile"><?=$_SESSION["userdata"]["username"]?></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link link-important" href="<?=APP_URL?>logout">Log Out</a>
                </li>
             <?php endif; ?>
            </ul>
        </div>  
    </div>
</nav>
   <!-- End Header -->