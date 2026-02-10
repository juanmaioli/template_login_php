<?php
include("config.php");
$ip = $_SERVER['REMOTE_ADDR'];
$dateShow = new DateTime(date("Y-m-d H:i:s"));
$dateShow = $dateShow->format('Y-m-d H:i:s');
session_start();
  
  $usuarioId = 0;
  if( isset( $_COOKIE[$site_cookie])) {
    $datos = $_COOKIE[$site_cookie];
    $datosCuenta = explode(":", $datos);
    $usuarioId = (int)$datosCuenta[1];
  }

  $conn = new mysqli($db_server, $db_user,$db_pass,$db_name,$db_serverport);
  
  // Sentencia preparada para registrar el logout
  $sql = "INSERT INTO " . $table_pre . "session(sess_usr, sess_ip, sess_date, sess_action) VALUES (?, ?, ?, 2)";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("iss", $usuarioId, $ip, $dateShow);
  $stmt->execute();
  $stmt->close();
  $conn->close();

  // Limpiar sesión
  $_SESSION = array();
  session_destroy();

  // Borrar cookie correctamente con parámetros de seguridad
  $cookie_options = [
      'expires' => time() - 3600,
      'path' => '/',
      'domain' => $www_host,
      'secure' => ($www_https == "on"),
      'httponly' => true,
      'samesite' => 'Lax'
  ];
  setcookie($site_cookie, '', $cookie_options);

  header('Location: login.php');
  exit();
?>
