
<?php
include_once("cabecera.html");
?>

<div class="container" id="formularios">
    <div class="row">
        <form class="form-horizontal" action="proceso_buscar_empleado.php" name="frmBuscarempleado" id="frmBuscarempleado" method="get">
            <fieldset>
                <!-- Form Name -->
                <legend>Buscar un empleado</legend>
                <!-- Text input-->
                <div class="form-group">
                    <label class="col-xs-4 control-label" for="txtIdEmpleado">Id Empleado</label>
                    <div class="col-xs-4">
                        <input id="txtIdEmpleado" name="txtIdEmpleado" placeholder="ID del empleado" class="form-control input-md" type="text">
                    </div>
                </div>
                
                <!-- Button -->
                <div class="form-group">
                    <label class="col-xs-4 control-label" for="btnAceptarBuscarComponente"></label>
                    <div class="col-xs-4">
                        <input type="submit" id="btnAceptarBuscarComponente" name="btnAceptarBuscarComponente" class="btn btn-primary" value="Aceptar" />
                    </div>
                </div>
            </fieldset>
        </form>

    </div>
</div>
</body>

</html>