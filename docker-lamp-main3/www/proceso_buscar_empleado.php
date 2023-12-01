<?php
require_once("funcionesBD.php");
$conexion = obtenerConexion();

// Recuperar parámetro
$idempleado = $_GET['txtIdEmpleado'];

// No validamos, suponemos que la entrada de datos es correcta

$sql = "SELECT * FROM employees 
WHERE employee_id = $idempleado;";

$resultado = mysqli_query($conexion, $sql);

// Pedir una fila
$fila = mysqli_fetch_assoc($resultado);

if($fila){ // Mostrar tabla de datos ($fila != null)

    $mensaje = "<h2 class='text-center'>Empleado localizado</h2>";
    $mensaje .= "<table class='table'>";
    $mensaje .= "<thead><tr><th>IDEMPLEADO</th><th>NOMBRE</th><th>APELLIDO</th><th>EMAIL</th><th>IDDEPARTMENTO</th><th>ACCION</th></tr></thead>";
    $mensaje .= "<tbody><tr>";
    $mensaje .= "<td>" . $fila['employee_id'] . "</td>";
    $mensaje .= "<td>" . $fila['first_name'] . "</td>";
    $mensaje .= "<td>" . $fila['last_name'] . "</td>";
    $mensaje .= "<td>" . $fila['email'] . "</td>";
    $mensaje .= "<td>" . $fila['department_id'] . "</td>";

    // Formulario en la celda para procesar borrado del registro
    $mensaje .= "<td><form action='proceso_borrar_empleado.php' method='post'>";
    // input hidden para enviar idcomponente a borrar
    $mensaje .= "<input type='hidden' name='idempleado' value='$idempleado'/>";  
    $mensaje .= "<input type='submit' value='Borrar' class='btn btn-primary'/> </form> </td>";

    $mensaje .= "</tr></tbody></table>";
    
} else { // No hay datos
   $mensaje = "<h2 class='text-center mt-5'>El empleado con id $idempleado no está registrado</h2>";
}

// Insertamos cabecera
include_once("cabecera.html");

// Mostrar mensaje calculado antes
echo $mensaje;

?>
