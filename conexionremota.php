<?php
// Datos para realizar la conexión

$servername = "localhost";
$username = "criss";
$password = "salva04";
$dbname = "phpstatt_agenda.sql";
// Crear la conexión con nuestra BD
$conn = new mysqli($servername, $username, $password, $dbname);
// Chequea la conexión
if ($conn->connect_error) {
die("Conexión fallida" . $conn->connect_error);
}
else
{
echo ("Conexión exitosa");
}
?>
