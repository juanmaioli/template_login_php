<?php
unset($_COOKIE['reloginID']);
?>

<html>
<head>
  <meta http-equiv="content-type" content="text/html;charset=UTF-8">
  <title>Template Login</title>
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0">

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

    <!-- Bootstrap core CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
    <!-- fontawesome.com -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css">
  <style>
  body {background-image: url("https://source.unsplash.com/1920x1080/?nature");background-position: center center;background-repeat: no-repeat;background-attachment: fixed;background-size: cover;background-color:#a31b0f;}
  fieldset {background-color:#fff;border: 3px solid #eee; !important;padding: 1.4em 1.4em 1.4em 1.4em !important;margin: 0 0 1.5em 0 !important;-webkit-border-radius: 15px;-moz-border-radius: 15px;border-radius: 15px;}
  </style>
</head>
<body>
<div class="container">
    <div class="row h-100">
        <div class="col-md-4 mx-auto my-auto">
          <fieldset>
                <div class="text-center"><img class="img-fluid" src="images/logo.png" width="" alt=""></div>
                <form  ACTION="proc.php" name="form1" method="POST">
	              <input name="usr_email" type="text" id="usr_email" class="form-control mt-3" placeholder="Email" required autofocus>
	              <div class="input-group mt-3">
                <input name="usr_passwd" type="password" id="usr_passwd" class="form-control" placeholder="Contrase&ntilde;a" required>
                  <div class="input-group-append"><span class="input-group-text"><a href='javascript:void(0);' onclick='passClear()'><i class="far fa-eye-slash" id="eye"></i></a></span></div>
                </div>
                  <input name="formSubmit" type="hidden" id="formSubmit" value="yes">
	                <button class="btn btn-primary btn-block mt-3" type="submit">Ingresar</button>
                </form>
            </fieldset>
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
</body>
</html>
