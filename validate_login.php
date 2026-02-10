<?php
include("config.php");

$usr_email	= $_POST['usr_email'];
$usr_passwd = $_POST['usr_passwd'];

if(empty($_POST['usr_remember']))
{
  $usr_remember = 1;
}else{
  $usr_remember = 1000;
}

$ip = $_SERVER['REMOTE_ADDR'];
$dateShow = new DateTime(date("Y-m-d H:i:s"));
$dateShow = $dateShow->format('Y-m-d H:i:s');

if(empty($usr_email) || empty($usr_passwd)){
header("Location: index.php");
exit();
}
$usrExiste = "";

$conn = new mysqli($db_server, $db_user,$db_pass,$db_name,$db_serverport);

$sql = "SELECT usr_id, usr_email, usr_pass, usr_right, usr_image FROM " . $table_pre . "usr WHERE usr_email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $usr_email);
$stmt->execute();
$result = $stmt->get_result();

if($row = $result->fetch_assoc())
{
    // Verificar la contraseña usando password_verify
    if (password_verify($usr_passwd, $row["usr_pass"])) {
        $usr_email = $row["usr_email"];
        $usr_id = $row["usr_id"];
        $usr_image = $row["usr_image"];
        $usr_right = $row["usr_right"];
        
        // Obtener nombre y apellido para guardar en sesión
        $sql_data = "SELECT usr_name, usr_lastname FROM " . $table_pre . "usr WHERE usr_id = ?";
        $stmt_data = $conn->prepare($sql_data);
        $stmt_data->bind_param("i", $usr_id);
        $stmt_data->execute();
        $res_data = $stmt_data->get_result();
        if($row_data = $res_data->fetch_assoc()){
            $usr_name = $row_data["usr_name"];
            $usr_lastname = $row_data["usr_lastname"];
        }
        $stmt_data->close();

                session_start();

                session_regenerate_id(true); // Previene fijación de sesión

                $_SESSION["usuario_id"] = $usr_id;

                $_SESSION["usuario"] = $usr_email;

                $_SESSION["nombre"] = $usr_name;

                $_SESSION["apellido"] = $usr_lastname;

                $_SESSION["avatar"] = $usr_image;

                $_SESSION["right"] = $usr_right;

                $_SESSION["loggedin"] = true;

        

                // Configuración de cookies más segura

                $cookie_options = [

                    'expires' => time() + 60 * 60 * 24 * $usr_remember,

                    'path' => '/',

                    'domain' => $www_host,

                    'secure' => ($www_https == "on"),

                    'httponly' => true, // Previene acceso vía JS

                    'samesite' => 'Lax'

                ];

                

                setcookie($site_cookie, hash('sha256', $usr_email) . ":" . $usr_id, $cookie_options);
        
        $stmt->close();
        $sql_sess = "INSERT INTO " . $table_pre . "session(sess_usr, sess_ip, sess_date, sess_action) VALUES (?, ?, ?, 1)";
        $stmt_sess = $conn->prepare($sql_sess);
        $stmt_sess->bind_param("iss", $usr_id, $ip, $dateShow);
        $stmt_sess->execute();
        $stmt_sess->close();

        header('Location: index.php');
        exit();
    }
}

$stmt->close();
header('Location: login.php?id=1');
$conn->close();

?>