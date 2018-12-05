<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
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
            
            <?php if(!isset($_SESSION["usuario"])): ?>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="<?=APP_URL?>login">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link link-important" href="<?=APP_URL?>register">Registro</a>
                </li>
            <?php else: ?>
                <?php if($_SESSION["usuario"]["count"] == "C"):?>
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="<?=APP_URL?>my_jobs"><i class="far fa-clipboard"></i> Mis Ofertas</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?=APP_URL?>create_job"><i class="fas fa-plus"></i>Crear Trabajo</a>
                        </li>
                    </ul>

                    
                <?php else: ?>
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="<?=APP_URL?>my_jobs"><i class="far fa-clipboard"></i> Mis Trabajos</a>
                        </li>
                    </ul>
                <?php endif; ?>
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown">
                                <?=$_SESSION["usuario"]["username"]?>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="<?=APP_URL?>profile"><i class="fas fa-user"></i>Perfil</a>
                                <div class=" dropdown-divider"></div>
                                <a class="dropdown-item" href="<?=APP_URL?>logout"><i class="fas fa-sign-out-alt"></i>Log Out</a>
                            </div>
                        </li>
                    </ul>
            <?php endif; ?>
                
            </ul>
        </div>  
    </div>
</nav>
   <!-- End Header -->