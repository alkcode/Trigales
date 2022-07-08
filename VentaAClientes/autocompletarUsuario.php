<?php
include '../Conexion/conexion.php';
$term = mysqli_real_escape_string($conexion,$_POST['nombre']);
$sql = "SELECT * FROM clientes WHERE nombre LIKE '$term%'";
$query = mysqli_query($conexion, $sql);
$result = [];
while($data = mysqli_fetch_array($query))
{
    $result[] = $data['fname'];
}
echo json_encode($result);
?>