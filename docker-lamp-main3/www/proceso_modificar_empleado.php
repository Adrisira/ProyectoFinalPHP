<?php
require_once("funcionesBD.php");
$conexion = obtenerConexion();

// Recuperar parámetros
$idempleado = $_POST['idempleado'];
$nombre = $_POST['txtNombre'];
$apellido = $_POST['txtApellido'];
$email = $_POST['txtEmail'];
$iddepartamento = $_POST['lstDepartamento'];

// No validamos, suponemos que la entrada de datos es correcta

// Definir update
$sql = "UPDATE employees SET first_name = '" . $nombre . "' , last_name = '" . $apellido . "' , email = '" . $email . "' , department_id = $iddepartamento
 WHERE employee_id = $idempleado ;";

// Ejecutar consulta
$resultado = mysqli_query($conexion, $sql);

// Verificar si hay error y almacenar mensaje
if (mysqli_errno($conexion) != 0) {
    $numerror = mysqli_errno($conexion);
    $descrerror = mysqli_error($conexion);
    $mensaje =  "<h2 class='text-center mt-5'>Se ha producido un error numero $numerror que corresponde a: $descrerror </h2>";
} else {
    $mensaje =  "<h2 class='text-center mt-5'>Empleado actualizado</h2>"; 
}

// Aquí empieza la página
include_once("cabecera.html");

// Mostrar mensaje calculado antes
echo $mensaje;

?>