<?php 
include("head.php");
?>

<br><br>
<!-- Container -->
<div class="container-fluid">
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <span class="float-left m-2">
                <h1>Administracion de Usuarios</h1>
            </span>
            <span class="float-right m-2"><a href="usr_add.php" class='btn btn-outline-primary btn-lg'>➕&nbsp;Agregar Usuario</a></span>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Apellido</th>
                        <th scope="col">Email</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $conn = new mysqli($db_server, $db_user,$db_pass,$db_name,$db_serverport);
                    mysqli_set_charset($conn,'utf8');
                    $sql = "SELECT * FROM " . $table_pre . "usr";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            echo "<tr>
                                    <th scope='row'>" . $row["usr_id"]. "</th>
                                    <td>" . $row["usr_name"]. "</td>
                                    <td>" . $row["usr_lastname"]. "</td>
                                    <td>" . $row["usr_email"]. "</td>
                                    <td>
                                        <div class='btn-group' role='group' aria-label='Acciones de usuario'>
                                            <form action='usr_edit.php' method='post'>
                                                <input type='hidden' name='id' id='id' value='" . $row["usr_id"] . "'>
                                                <button type='submit' class='btn btn-outline-primary btn-sm'>✏️</button>
                                            </form>
                                            <form action='usr_del.php' method='post' onsubmit='return confirm(\"¿Estás seguro de que quieres eliminar este usuario?\");'>
                                                <input type='hidden' name='id' id='id' value='" . $row["usr_id"] . "'>
                                                <button type='submit' class='btn btn-outline-danger btn-sm'>🗑️</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>";
                        }
                    } else {
                        echo "<tr><td colspan='5'>No hay usuarios registrados.</td></tr>";
                    }
                    $conn->close();
                    ?>
                </tbody>
            </table>
        </div>
        <div class="col-md-1"></div>
    </div>
</div>
<!-- /Container -->

<?php include("footer.php"); ?>