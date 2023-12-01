<?php

// Recupero datos de parametro en forma de array asociativo
$empleado = json_decode($_POST['empleado'],true);

require_once("funcionesBD.php");
$conexion = obtenerConexion();

$sql = "SELECT department_id,department_name FROM departments;";

$resultado = mysqli_query($conexion, $sql);

$options = "";
while ($fila = mysqli_fetch_assoc($resultado)) {
    // Si coincide el tipo con el del componente es el que debe aparecer seleccionado (selected)
    if ($fila['department_id'] == $empleado['department_id']){
        $options .= " <option selected value='" . $fila["department_id"] . "'>" . $fila["department_name"] . "</option>";
    } else{
        $options .= " <option value='" . $fila["department_id"] . "'>" . $fila["department_name"] . "</option>";
    }
}

// Cabecera HTML que incluye navbar
include_once("cabecera.html");
?>

<div class="container" id="formularios">
    <div class="row">
        <form class="form-horizontal" action="proceso_modificar_empleado.php" name="frmAltaempleado" id="frmAltaempleado" method="post">
            <fieldset>
                <!-- Form Name -->
                <legend>Modificación de empleado</legend>
                <!-- Text input-->
                <div class="form-group">
                    <label class="col-xs-4 control-label" for="txtNombre">Nombre</label>
                    <div class="col-xs-4">
                        <input value="<?php echo $empleado['first_name']?>" id="txtNombre" name="txtNombre" placeholder="Nombre del empleado" class="form-control input-md" type="text">
                    </div>
                </div>
                <!-- Text input-->
                <div class="form-group">
                    <label class="col-xs-4 control-label" for="txtApellido">Apellido</label>
                    <div class="col-xs-4">
                        <input value="<?php echo $empleado['last_name']?>" id="txtApellido" name="txtApellido" placeholder="Apellido" class="form-control input-md" type="text">
                    </div>
                </div>
                <!-- Text input-->
                <div class="form-group">
                    <label class="col-xs-4 control-label" for="txtEmail">Email</label>
                    <div class="col-xs-4">
                        <input value="<?php echo $empleado['email']?>" id="txtEmail" name="txtEmail" placeholder="Email" class="form-control input-md" type="text" step="0.01">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-4 control-label" for="lstDepartamento">Departamento</label>
                    <div class="col-xs-4">
                        <select name="lstDepartamento" id="lstDepartamento" class="form-select" aria-label="Default select example">
                            <?php echo $options; ?>
                        </select>
                    </div>
                </div>
                <input value="<?php echo $empleado['department_id']?>" type='hidden' name='idempleado' id='idempleado' />
                <!-- Button -->
                <div class="form-group">
                    <label class="col-xs-4 control-label" for="btnAceptarAltaComponente"></label>
                    <div class="col-xs-4">
                        <input type="submit" id="btnAceptarAltaComponente" name="btnAceptarAltaComponente" class="btn btn-primary" value="Aceptar" />
                    </div>
                </div>
            </fieldset>
        </form>

    </div>
</div>
</body>

</html>