<?php
error_reporting(0);
include_once "encabezado2.php";
session_start();

//if(!isset($_SESSION["cliente"])) $_SESSION["cliente"] = [];

$array=$_SESSION["cliente"];
//print_r($_SESSION["cliente"]);

//echo "<br>";
$clasif=array_column($array,'clasif');
//print_r($id);
//	echo $clasif[0];
//	echo "<br>";

if ($clasif[0]=="1") {
		$ruta="venderMa/vender.php";
}elseif ($clasif[0]=="2") {
		$ruta="venderMe/vender.php";
}elseif ($clasif[0]=="3") {
		$ruta="venderEv/vender.php";
}elseif ($clasif[0]=="4") {
		$ruta="venderTemp/vender.php";
}elseif ($clasif[0]=="5") {
			$ruta="venderMen/vender.php";
}elseif ($clasif[0]==NULL) {
		$ruta="./elegir.php";

?>
<!--<script type="text/javascript">
		alert("Seleccione a un Cliente Registrado");
</script>-->

<?php
}else if($clasif[0]=="") {

}
if(!isset($_SESSION["cliente"])) $_SESSION["cliente"] = [];


?>
<style>
		.sku{
			background:  #F45671;
		}
</style>

<script type="text/javascript">

		window.onload = function Salida(){
			setTimeout('ejecutar()',hora());

		}

		function hora(){
				horaActual=new Date();
				horaProgramada=new Date();
				horaProgramada.setHours(23);
				horaProgramada.setMinutes(55);
				horaProgramada.setSeconds(0);
				return horaProgramada.getTime() - horaActual.getTime();

		}

		function ejecutar(){
			hora();
			if (hora()==0) {
				window.location=("../Salida/salidaReporte.php");
				//alert('que pedo prro');
			}else {

			}
		}
</script>

	<div class="col-xs-12">
		<h1>Elegir Cliente "Trigales de Oro"</h1>
		<?php
			if(isset($_GET["status"])){
				if($_GET["status"] === "1"){
					?>
						<div class="alert alert-danger">
							<strong>Cliente No Encontrado</strong>
						</div>
					<?php
				}else{
					?>
					<div class="alert alert-success">
							<strong>Cliente Encontrado</strong>
						</div>
					<?php
				}
			}
		?>

    <br>
    <form method="post" action="buscarCliente.php">
      <label for="codigo">Ingrese el Nombre del Cliente:</label>
      <br>
    <input autocomplete="on" autofocus class="form-control" name="nombre" required type="text" id="codigo" placeholder="Escribe el Nombre" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" required>
    <br>
      <input class="btn btn-dark" type="submit" name="aceptar" value="Buscar Cliente">
    </form>
    <br><br>
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>ID</th>
          <th>NOMBRE</th>
          <th>RFC</th>
          <th>DIRECCIÓN</th>
          <th>OBSERVACIONES</th>
          <th>CLASIFICACION</th>
					<th>RUTA</th>
          <th>TIPO DE PAGO</th>
        </tr>

      </thead>
      <tbody>
        <?php foreach($_SESSION["cliente"] as $cliente){
            //$granTotal += $producto->total;
          ?>
        <tr>
          <td><?php echo $cliente->id_nombre; ?></td>
          <td><?php echo $cliente->nombre;?></td>
          <td><?php echo $cliente->rfc;?></td>
          <td><?php echo $cliente->dir; ?></td>
          <td><?php echo $cliente->obs; ?></td>
          <td><?php echo $cliente->clasif; ?></td>
					<td><?php echo $cliente->ruta; ?></td>
          <td><?php echo $cliente->tipo_pago; ?></td>
          <!--<td><a class="btn btn-danger" href="<?php echo "quitarDelCarrito.php?indice=" . $indice?>"><i class="fa fa-trash"></i></a></td>-->
        </tr>
        <?php }

				?>

      </tbody>
    </table>
<br>

    <form action=<?php echo $ruta; ?> method="POST">
        <center><input class="btn btn-success" type="submit" name="" value="Aceptar"></center>
        <br>
        <br>
        <br>
    </form>
  </div>
  <br><br><br><br><br><br><br>
  <center><a onclick="myFunctionClientes()"><input class="btn btn-info" type="submit" name="" value="Volver al Menú Principal"></a></center>

  <br><br>
<?php  include_once "pie.php";  ?>
