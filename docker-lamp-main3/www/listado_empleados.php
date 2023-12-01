<?php
require_once("funcionesBD.php");
$conexion = obtenerConexion();

// Verifico si ha llegado el parametro de tipo 
if (isset($_GET['lstDepartamento'])) {
    // Recuperar parámetro
    $iddepartmento = $_GET['lstDepartamento'];

    $sql = "SELECT c.* FROM employees c, departments p 
    WHERE c.department_id = p.department_id AND p.department_id = $iddepartmento ORDER BY employee_id ASC;";

} else { // No recibo idtipo para filtrar
    $sql = "SELECT c.* FROM employees c, departments p 
    WHERE c.department_id = p.department_id  ORDER BY c.employee_id ASC;";

}

// Ejecutar consulta
$resultado = mysqli_query($conexion, $sql);

// Montar tabla
$mensaje = "<h2 class='text-center'>Listado de empleados</h2>";
$mensaje .= "<table class='table table-striped'>";
$mensaje .= "<thead><tr><th>IDEMPLEADO</th><th>NOMBRE</th><th>APELLIDO</th><th>EMAIL</th><th>IDDEPARTMANETO</th><th>ACCIÓN</th></tr></thead>";
$mensaje .= "<tbody>";

// Recorrer filas
while ($fila = mysqli_fetch_assoc($resultado)) {
    $mensaje .= "<tr><td>" . $fila['employee_id'] . "</td>";
    $mensaje .= "<td>" . $fila['first_name'] . "</td>";
    $mensaje .= "<td>" . $fila['last_name'] . "</td>";
    $mensaje .= "<td>" . $fila['email'] . "</td>";
    $mensaje .= "<td>" . $fila['department_id'] . "</td>";

    $mensaje .= "<td><form class='d-inline me-1' action='editar_empleado.php' method='post'>";
    $mensaje .= "<input type='hidden' name='empleado' value='" . htmlspecialchars(json_encode($fila),ENT_QUOTES) . "' />";
    $mensaje .= "<button name='Editar' class='btn btn-primary'><i class='bi bi-pencil-square'></i></button></form>";

    $mensaje .= "<form class='d-inline' action='proceso_borrar_empleado.php' method='post'>";
    $mensaje .= "<input type='hidden' name='idempleado' value='" . $fila['employee_id']  . "' />";
    $mensaje .= "<button name='Borrar' class='btn btn-danger'><i class='bi bi-trash'></i></button></form>";

    $mensaje .= "</td></tr>";
    
}

// Cerrar tabla
$mensaje .= "</tbody></table>";

// Insertamos cabecera
include_once("cabecera.html");

// Mostrar mensaje calculado antes
echo $mensaje;


