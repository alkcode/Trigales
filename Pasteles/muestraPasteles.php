<?php
    //require_once("../Conexion/autorizacion.php");
    session_start();
     require_once("../Conexion/base_de_datos.php");

        if($_SESSION['user']==null || $_SESSION['user']==''){
          echo '<br>';
          echo '<br>';
          echo '<center> Usted no tiene autorización </center>';
          echo '<br>';
          echo '<br>';
          echo '<center> Inicie sesión de forma correcta </center>';
          echo '<br>';
          echo '<br>';
          echo '<center><a href="./index.php">Iniciar sesión</a></center>';
          die();
          //require_once("../Conexion/autorizacion.php");
        }
 ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Pasteles TRIGALES DE ORO</title>
    <link rel="icon" type="image/png" href="../logo 2016.png">
    <link rel="stylesheet" href="../css/fontawesome-all.min.css">
    <link rel="stylesheet" href="../css/2.css">
    <link rel="stylesheet" href="../css/estilo.css">
  </head>
<style>
body{
 background: #0fc712;
}
h1{
  background: yellow;
  border-radius: 20px;
}
table{
  background: white;
}
thead{
  background: #0097FF;

}

a{
  color: black;
  font-size: 20px;
  text-decoration: none;
}

</style>
<script>
    function deshabilitaRetroceso(){
         window.location.hash="no-back-button";
         window.location.hash="Again-No-back-button" //chrome
         window.onhashchange=function(){window.location.hash="no-back-button";}
    }
</script>

<?php
$sentencia = $base_de_datos->query("SELECT * FROM pasteles");
$pasteles= $sentencia->fetchAll(PDO::FETCH_OBJ);
 ?>
<center><div class="container">
  <h1>Lista de Pasteles Trigales de Oro®</h1>
</div></center>
<br>
  <body onload="deshabilitaRetroceso()">

    <div class="container">
      <a href="../Menu2.php"><input class="btn btn-danger" type="submit" name="" value="Volver al Menú Principal"></a>
    </div>
    <br>
    <div class="container">
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>Id Pastel</th>
          <th>Pastel</th>
          <th>Linea</th>
          <th>Precio Mayoreo</th>
          <th>Precio Medio</th>
          <th>Precio Eventual</th>
          <th>Precio Temporada</th>
          <th>Precio Menudeo</th>

          <th class="warning">Editar</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach($pasteles as $datos){ ?>
        <tr>
          <td><?php echo $datos->id_producto; ?></td>
          <td><?php echo utf8_decode($datos->pastel); ?></td>
          <td><?php echo $datos->linea; ?></td>
          <td><?php echo $datos->p_mayoreo; ?></td>
          <td><?php echo $datos->p_medio; ?></td>
          <td><?php echo $datos->p_eventual; ?></td>
          <td><?php echo $datos->p_temporada; ?></td>
          <td><?php echo $datos->p_menudeo; ?></td>

          <td><a class="btn btn-warning" href="<?php echo "editarPastel.php?id=" . $datos->id_producto?>"><i class="fa fa-trash"></i></a></td>

  <?php } ?>
        </tbody>
	</table>
  </div>
<br><br>
  <form action="../Reportes/ListaDePrecios.php" method="post">
  <center><input class="btn btn-info" type="submit" name="" value="GENERAR REPORTE"></center>
  </form>
  <br><br>
    <div>
      <center><a href="../Menu2.php">VOLVER AL MENÚ PRINCIPAL</a> </center>
    </div>
    <br><br>


  </body>
</html>

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
