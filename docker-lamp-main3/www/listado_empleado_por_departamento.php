<?php
require_once("funcionesBD.php");

$conexion = obtenerConexion();

$sql = "SELECT department_id, department_name FROM departments ORDER BY department_id ASC;";

$resultado = mysqli_query($conexion, $sql);

$options = "";
while ($fila = mysqli_fetch_assoc($resultado)) {
    // $tipos[] = $fila; // Insertar una fila al final
    $options .= " <option value='" . $fila["department_id"] . "'>" . $fila["department_name"] . "</option>";
}

include_once("cabecera.html");
?>

<div class="container" id="formularios">
    <div class="row">
        <form class="form-horizontal" action="listado_empleados.php" method="get">
            <fieldset>
                <!-- Form Name -->
                <legend>Buscar empleados de un departamento</legend>
                <div class="form-group">
                    <label class="col-xs-4 control-label" for="lstDepartamento">Departamento</label>
                    <div class="col-xs-4">
                        <select name="lstDepartamento" id="lstDepartamento" class="form-select" aria-label="Default select example">
                            <?php echo $options; ?>
                        </select>
                    </div>
                </div>
                <!-- Button -->
                <div class="form-group">
                    <label class="col-xs-4 control-label" for="btnAceptarBuscarEmpleadoDepartamento"></label>
                    <div class="col-xs-4">
                        <input type="submit" id="btnAceptarBuscarEmpleadoDepartamento" name="btnAceptarBuscarEmpleadoDepartamento" class="btn btn-primary" value="Aceptar" />
                    </div>
                </div>
            </fieldset>
        </form>

    </div>
</div>
</body>

</html>