<?php
require_once("funcionesBD.php");

$conexion = obtenerConexion();

$sql = "SELECT department_id,department_name FROM departments;";

$resultado = mysqli_query($conexion, $sql);

$options = "";
while ($fila = mysqli_fetch_assoc($resultado)) {
    // $tipos[] = $fila; // Insertar una fila al final
    $options .= " <option value='" . $fila["department_id"] . "'>" . $fila["department_name"] . "</option>";
}

// Cabecera HTML que incluye navbar
include_once("cabecera.html");
?>

<div class="container" id="formularios">
    <div class="row">
        <form class="form-horizontal" action="proceso_alta_empleado.php" name="frmAltaEmpleado" id="frmAltaEmpleado" method="post">
            <fieldset>
                <!-- Form Name -->
                <legend>Alta de Empleado</legend>
                <!-- Text input-->
                <div class="form-group">
                    <label class="col-xs-4 control-label" for="txtNombre">Nombre</label>
                    <div class="col-xs-4">
                        <input id="txtNombre" name="txtNombre" placeholder="Nombre del Empleado" class="form-control input-md" maxlength="25" type="text">
                    </div>
                </div>
                <!-- Text input-->
                <div class="form-group">
                    <label class="col-xs-4 control-label" for="txtApellido">Apellido</label>
                    <div class="col-xs-4">
                        <input id="txtApellido" name="txtApellido" placeholder="Apellido" class="form-control input-md" type="text">
                    </div>
                </div>
                <!-- Text input-->
                <div class="form-group">
                    <label class="col-xs-4 control-label" for="txtEmail">Email</label>
                    <div class="col-xs-4">
                        <input id="txtEmail" name="txtEmail" placeholder="Email" class="form-control input-md" type="text">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-4 control-label" for="lstDepartamento">Departmaneto</label>
                    <div class="col-xs-4">
                        <select name="lstDepartamento" id="lstDepartamento" class="form-select" aria-label="Default select example">
                            <?php echo $options; ?>
                        </select>
                    </div>
                </div>
                <!-- Button -->
                <div class="form-group">
                    <label class="col-xs-4 control-label" for="btnAceptarAltaEmpleado"></label>
                    <div class="col-xs-4">
                        <input type="submit" id="btnAceptarAltaEmpleado" name="btnAceptarAltaEmpleado" class="btn btn-primary" value="Aceptar" />
                    </div>
                </div>
            </fieldset>
        </form>

    </div>
</div>
</body>

</html>