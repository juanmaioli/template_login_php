<?php
//unset($_COOKIE['reloginID']);
if(empty($_GET['id']))
{
    $id=0;
    $msg="";
}else{
    $id=$_GET["id"];
    $msg="<h6 class='text-center border border-danger text-danger m-1 p-2 rounded'>Usuario o Clave Incorrecto</h6>";
}
?>
<!DOCTYPE html>
<html lang="es" data-bs-theme="auto">
<head>
  <meta http-equiv="content-type" content="text/html;charset=UTF-8">
  <title>Template Login</title>
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0">

  <script>
    /**
     * Script para detección automática de tema (UpdateUI)
     */
    const getPreferredTheme = () => {
      return window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light'
    }

    const setTheme = theme => {
      document.documentElement.setAttribute('data-bs-theme', theme)
    }

    setTheme(getPreferredTheme())

    window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', () => {
      setTheme(getPreferredTheme())
    })
  </script>

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

  <!-- Bootstrap core CSS 5.3.3 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css/all.min.css?version=5.13.1">
  <style>
  body {
    background-image: url("../rnd_img/index.php?id=anime");
    background-position: center center;
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-size: cover;
    background-color:#a31b0f;
    padding: 0;
    margin: 0;
    height: 100vh;
  }
  .login-container {
    height: 100%;
  }
  .login-form {
    height: 100%;
    display: flex;
    flex-direction: column;
    justify-content: center;
    background-color: rgba(255, 255, 255, 0.9); /* Blanco con 90% de opacidad */
  }
  fieldset {
    width: 100%;
    max-width: 450px; /* Opcional: para que no se estire demasiado en pantallas grandes */
    margin: 0 auto;
    border: none;
    padding: 2em;
    border-radius: 0; 
  }
  [data-bs-theme="dark"] .login-form {
    background-color: rgba(33, 37, 41, 0.9); /* Color oscuro de BS con 90% de opacidad */
  }
  </style>
</head>
<body>
<div class="container-fluid login-container">
    <div class="row h-100">
        <div class="col-lg-3 col-md-4 col-sm-12 p-0 login-form">
          <fieldset>
                <div class="text-center mb-4"><img class="img-fluid" src="images/logo.png" width="200" alt=""></div>
                <form  ACTION="validate_login.php" name="form1" method="POST">
                <input name="usr_email" type="text" id="usr_email" class="form-control mt-3" placeholder="Email" required autofocus>
                <div class="input-group my-3">
                  <input type="password" class="form-control" id="usr_passwd" name="usr_passwd" placeholder="Contraseña" required>
                  <span class="input-group-text" id="basic-addon2"><a href='javascript:void(0);' onclick='passClear()'><i class="far fa-eye-slash" id="eye"></i></a></span>
                </div>

                <div class="form-group form-check m-2">
                    <label class="form-check-label text-primary small">
                    <input class="form-check-input" type="checkbox" id="usr_remember" name="usr_remember" value="sip"> Recordarme en este equipo
                  </label>
                </div>
                  <input name="formSubmit" type="hidden" id="formSubmit" value="yes">
                  <button class="btn btn-primary w-100 mt-3" type="submit">Ingresar</button>
                </form>
                <?=$msg?>
            </fieldset>
        </div>
        <div class="col-lg-9 col-md-8 d-none d-md-block p-0">
            <!-- El fondo dinámico ocupará este espacio -->
        </div>
    </div>
</div>
    <script>
    function passClear(){
      var password = document.getElementById('usr_passwd');
      var eye = document.getElementById('eye');
        if(password.getAttribute('type') === 'password'){
            password.setAttribute('type', 'text');
            eye.classList.remove( "fa-eye-slash");
            eye.classList.add( "fa-eye");
        } else {
            password.setAttribute('type', 'password');
            eye.classList.remove( "fa-eye");
            eye.classList.add( "fa-eye-slash");
        }
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>