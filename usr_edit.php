<?php 
include("head.php");
$id = $_POST["id"];
$conn = new mysqli($db_server, $db_user,$db_pass,$db_name,$db_serverport);

mb_internal_encoding('UTF-8');
mb_http_output('UTF-8');

$sql = "SELECT usr_id, usr_name, usr_lastname, usr_email, usr_image, usr_pass, usr_token, usr_timezone, usr_right FROM " . $table_pre . "usr where usr_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

if ($row = $result->fetch_assoc()) {
    $usr_id = $row["usr_id"];
    $usr_name = $row["usr_name"];
    $usr_lastname = $row["usr_lastname"];
    $usr_email = $row["usr_email"];
    $usr_image = $row["usr_image"];
    $usr_pass = $row["usr_pass"];
    $usr_token = $row["usr_token"];
    $usr_timezone = $row["usr_timezone"];
    $usr_right = $row["usr_right"];
}
$stmt->close();

$conn->close();
?>
<!-- Container -->
<div class="container-fluid">
    <div class="row mt-3">
        <div class="col-md-1"></div>
        <div class="col-md-3">
        <div class="card">
                <div class="card-header"><h3>🖼️ Imagen</h3></div>
                <div class="card-body text-center">
                <img src="<?=htmlspecialchars($usr_image, ENT_QUOTES, 'UTF-8')?>" class="img-fluid">
                <form action="usr_img.php" method="post" enctype="multipart/form-data">
                    <input id="image_usr_id" name="image_usr_id" type="hidden" value="<?=htmlspecialchars($usr_id, ENT_QUOTES, 'UTF-8')?>">
                    <label for="file-upload" class="custom-file-upload btn btn-outline-primary m-2">
                    ☁️ Elegir Imagen</label>
                    <input id="file-upload" name="file-upload" type="file" accept=".jpeg, .jpg" onChange="this.form.submit()">
                </form>
                </div>
            </div>
        </div> 
        <div class="col-md-7">
            <div class="card">
                <div class="card-header"><h3>✏️ Editar Usuario</h3><h5> <span class="text-secondary">(Todos los campos son obligatorios)</span></h5></div>
                <div class="card-body">
                    <form id='form_data' action='usr_save.php' method='post' >
                        <div class="row p-2">			
                            <div class="col-md">
                            <label>Nombre</label>
                            <input type="text" class="form-control" name="usr_name" id="usr_name"  placeholder="Nombre" value="<?=htmlspecialchars($usr_name, ENT_QUOTES, 'UTF-8')?>" required>
                            </div>
                            <div class="col-md">
                            <label>Apellido</label>
                            <input type="text" class="form-control" name="usr_lastname" id="usr_lastname"  placeholder="Apellido" value="<?=htmlspecialchars($usr_lastname, ENT_QUOTES, 'UTF-8')?>" required>
                            </div>
                            <div class="col-md">
                            <div id="email" name="email"><label >Email</label></div>
                            <input type="text" class="form-control" name="usr_email" id="usr_email"  placeholder="Email" value="<?=htmlspecialchars($usr_email, ENT_QUOTES, 'UTF-8')?>" onblur="validateEmail(this);" required>
                            </div>
                        </div>
                        <div class="row p-2">			
                            <div class="col-md p-1 text-center">
                            <span class="float-left"></span>
                                <span class="float-right">
                                <button type="submit" id="btnGuardar" class='btn btn-outline-primary'>💾&nbsp;Guardar</button>
                                </span>
                                <input name="usr_id" type="hidden" id="usr_id" value="<?=htmlspecialchars($usr_id, ENT_QUOTES, 'UTF-8')?>">
                            </div>
                        </div>
                    </form>
                </div> 
            </div>
            <div class="card mt-3">
                <div class="card-header"><h3>🔑 Cambiar Clave</h3></div>
                <div class="card-body">
                    <form id='form_pass' name='form_pass' action='usr_pass.php' method='post' >
                    
                        <div class="row p-2">			
                            <div class="col-md">
                            <label>Nueva Clave</label>
                            <input type="text" class="form-control" name="usr_pass" id="usr_pass"  placeholder="Nueva Clave" value="" autocomplete="off" required onkeyup="verifica()">
                            </div>
                            <div class="col-md">
                            <label>Confirme Nueva Clave</label>
                            <input type="text" class="form-control" name="usr_pass_confirm" id="usr_pass_confirm"  placeholder="Confirme Nueva Clave" value="" autocomplete="off" required onkeyup="verifica()">
                            </div>
                        </div>                       							
                        <div class="row p-2">			
                            <div class="col-md p-1 text-center">
                            <span id="verificador" class="float-left"></span>
                            <span class="float-right">
                            <button type="submit" id="btnGuardarPass" class='btn btn-outline-primary'>💾&nbsp;Cambiar</button>
                            </span>
                            <input name="usr_id_pass" type="hidden" id="usr_id_pass" value="<?=htmlspecialchars($usr_id, ENT_QUOTES, 'UTF-8')?>">
                            </div>
                        </div>
                    </form>
                </div> 
            </div>    
        </div>
        <div class="col-md-1"></div>        
        </div>

</div>
<!-- /Container -->
<script>
    function verifica(){
        var usr_pass_confirm_value = document.getElementById("usr_pass_confirm").value;
        var usr_pass_value = document.getElementById("usr_pass").value;
        var verificador = document.getElementById("verificador");
        var btnGuardar = document.getElementById('btnGuardarPass');
        var pass_error  = "<h6 class='text-center border border-danger m-1 p-2 rounded'>❌ Las Claves No Coinciden</h6>";
        var pass_ok     = "<h6 class='text-center border border-success m-1 p-2 rounded'>✅ Las Claves Coinciden</h6>";
        var pass_long   = "<h6 class='text-center border border-primary m-1 p-2 rounded'>ℹ️ Minimo 10 Caracteres</h6>";
        
        if(usr_pass_value.length >= 10){
            if(usr_pass_value == usr_pass_confirm_value){
                verificador.innerHTML = pass_ok;
                btnGuardar.disabled = false;
            }else{
                verificador.innerHTML = pass_error;
                btnGuardar.disabled = true;
            }
        }else{
            verificador.innerHTML = pass_long;
            btnGuardar.disabled = true;
        }
    }

// Solo permite ingresar numeros.
function onlyNumber(e){
	var key = window.Event ? e.which : e.keyCode
	return (key >= 48 && key <= 57)
}
//Validar Email
function validateEmail(mail) 
{
    var emailAlert = document.getElementById("email");
    var email_error  = "<label class='text-danger'>❌ Email no valido</label>";
    var email_ok     = "<label class='text-success'>✅ Email valido</label>";
 if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(form_data.usr_email.value))
  {
    emailAlert.innerHTML = email_ok;
    return (true)
  }
    //alert("You have entered an invalid email address!")
    emailAlert.innerHTML = email_error;
    return (false)
}
</script>
<!-- /Container -->

<?php include("footer.php"); ?>