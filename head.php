<?php
include("config.php");
// Configuración de sesión segura antes de iniciarla
session_set_cookie_params([
    'lifetime' => 0,
    'path' => '/',
    'domain' => $www_host,
    'secure' => ($www_https == "on"),
    'httponly' => true,
    'samesite' => 'Lax'
]);
session_start();
if ( $_SESSION["loggedin"] == false) {
   header('Location: login.php');
exit();
}

if( isset( $_COOKIE[$site_cookie])) {
  $datos = $_COOKIE[$site_cookie];
  $datosCuenta = explode(":", $datos);
  $usuarioId = $datosCuenta[1];
}
else
{
  header( "Location: login.php" );
  exit();
}

//User Data
  $usr_id = $_SESSION["usuario_id"];
  $usuarioMail = $_SESSION["usuario"];
  $usr_name = $_SESSION["nombre"];
  $usr_lastname = $_SESSION["apellido"];
  $usr_image = $_SESSION["avatar"];
  $usr_right = $_SESSION["right"];

  if ($usr_right==1){
    //Admin Menu
    $menu_admin ="<a href='admin.php' class='dropdown-item text-white'><i class='fas fa-user-shield text-warning fa-lg'></i>&nbsp;Admin</a>";
  }else{ 
    $menu_admin ="<a href='#' class='dropdown-item text-white'><i class='fas fa-user-shield text-warning fa-lg'></i>&nbsp;No Admin</a>";
  }


  $conn = new mysqli($db_server, $db_user,$db_pass,$db_name,$db_serverport);
  $acentos = $conn->query("SET NAMES 'utf8'");
  mysqli_set_charset($conn,'utf8');
  mb_internal_encoding('UTF-8');
  mb_http_output('UTF-8');
//Date to work
  $dateShow = new DateTime(date("Y-m-d H:i:s"));
  $dateForm = $dateShow->format('Y-m-d');
  $dateShow = $dateShow->format('Y-m-d H:i:s');

$conn->close();
?>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="Juan Maioli">
  <meta name="author" content="https://github.com/juanmaioli">
  <title>Template Login</title>
  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="css/bootstrap.min.css?version=5.1.0">
  <!-- fontawesome.com -->
  <link rel="stylesheet" href="css/all.min.css?version=6.0.0">
  <!-- Custom styles for this template -->
  <link rel="stylesheet" href="css/style.css?version=1.1" >
  <!-- Bootstrap core JS -->
  <script src="js/bootstrap.bundle.min.js?version=5.1.0"></script> -->
  <!-- Favicon for this template -->
  <link rel="apple-touch-icon" sizes="57x57" href="images/apple-icon-57x57.png">
  <link rel="apple-touch-icon" sizes="60x60" href="images/apple-icon-60x60.png">
  <link rel="apple-touch-icon" sizes="72x72" href="images/apple-icon-72x72.png">
  <link rel="apple-touch-icon" sizes="76x76" href="images/apple-icon-76x76.png">
  <link rel="apple-touch-icon" sizes="114x114" href="images/apple-icon-114x114.png">
  <link rel="apple-touch-icon" sizes="120x120" href="images/apple-icon-120x120.png">
  <link rel="apple-touch-icon" sizes="144x144" href="images/apple-icon-144x144.png">
  <link rel="apple-touch-icon" sizes="152x152" href="images/apple-icon-152x152.png">
  <link rel="apple-touch-icon" sizes="180x180" href="images/apple-icon-180x180.png">
  <link rel="icon" type="image/png" sizes="192x192"  href="images/android-icon-192x192.png">
  <link rel="icon" type="image/png" sizes="32x32" href="images/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="96x96" href="images/favicon-96x96.png">
  <link rel="icon" type="image/png" sizes="16x16" href="images/favicon-16x16.png">
  <link rel="manifest" href="images/manifest.json">
  <meta name="msapplication-TileColor" content="#ffffff">
  <meta name="msapplication-TileImage" content="images/ms-icon-144x144.png">
  <meta name="theme-color" content="#ffffff">
</head>

<body class="fixed-nav" id="page-top">
  <!-- Logo -->
  <div  class="d-none d-lg-block" style="width:58px;height:100px;position:fixed;left:20px;bottom:5px;z-index:10000">
    <a class="navbar-brand" href="index.php">
      <img class="profile-img2" src="images/logo.png" alt="Logo" >
    </a>
  </div>
  <!-- /Logo -->
  <!-- Navigation -->


  <nav class="navbar navbar-expand-md navbar-dark  fixed-top"">
    <div class="container-fluid">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
      </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto">
            <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class='fas fa-ellipsis-v text-secondary fa-lg'></i>&nbsp;Menú</a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item text-white" href="#">Action</a></li>
                <li><a class="dropdown-item text-white" href="#">Another action</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><?=$menu_admin?></li>
              </ul>
            </li>
          </ul>
          <a class="navbar-brand me-auto" href="index.php"><i class="fas fa-cat fa-2x"></i>&nbsp; Template Login</a>
          <ul class="navbar-nav ml-auto">
            <li class="nav-item d-none d-lg-block">
                <a class="nav-link" href='#'><img class="profile-img1 border border-primary" src="<?=htmlspecialchars($usr_image, ENT_QUOTES, 'UTF-8')?>"></a>
            </li>
            <li class="nav-item">
              <form action='usr_edit.php' method='post'>
                  <input type='hidden' name='id' id='id' value="<?=htmlspecialchars($usr_id, ENT_QUOTES, 'UTF-8')?>">
                  <a class="nav-link text-white" href='#' onclick='this.parentNode.submit();'><?=htmlspecialchars($usr_name . " " . $usr_lastname, ENT_QUOTES, 'UTF-8')?></a>
              </form>
            </li>
            <li class="nav-item" title="Cerrar Sesion">
              <a class="nav-link text-white" href="logout.php"><i class="fas fa-sign-out-alt text-danger fa-lg"></i>Salir</a>
            </li>
          </ul>
        </div>
    </div>
  </nav>
  <!-- /Navigation -->
  <div class="separador"></div>