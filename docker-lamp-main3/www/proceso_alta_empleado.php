<?php
require_once("funcionesBD.php");
$conexion = obtenerConexion();

// Recuperar parámetros
$nombre = $_POST['txtNombre'];
$apellido = $_POST['txtApellido'];
$email = $_POST['txtEmail'];
$iddepartamento = $_POST['lstDepartamento'];

// No validamos, suponemos que la entrada de datos es correcta

// Definir insert
$sql = "INSERT INTO employees(`employee_id`, `first_name`, `last_name`, `email`, `department_id`) 
                VALUES (null,'" . $nombre . "', '" . $apellido . "', '" . $email . "', $iddepartamento );";

// Ejecutar consulta
$resultado = mysqli_query($conexion, $sql);

// Verificar si hay error y almacenar mensaje
if (mysqli_errno($conexion) != 0) {
    $numerror = mysqli_errno($conexion);
    $descrerror = mysqli_error($conexion);
    $mensaje =  "<h2 class='text-center mt-5'>Se ha producido un error numero $numerror que corresponde a: $descrerror </h2>";
} else {
    $mensaje =  "<h2 class='text-center mt-5'>Componente insertado</h2>"; 
}
// Redireccionar tras 5 segundos al index.
// Siempre debe ir antes de DOCTYPE
header( "refresh:5;url=index.php" );

// Aquí empieza la página
include_once("cabecera.html");

// Mostrar mensaje calculado antes
echo $mensaje;

?>