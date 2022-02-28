<?php
//require_once("../Conexion/autorizacion.php");
session_start();
error_reporting(0);
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
      echo '<center><a href="../index.php">Iniciar sesión</a></center>';
      die();
      //require_once("../Conexion/autorizacion.php");
    }
 ?>


 <!DOCTYPE html>
 <html>
   <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0" />
     <title>Salida TRIGALES DE ORO</title>
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
   border-radius: 25px;
 }
 table{
   background: white;
 }
 thead{
   background: #0097FF;

 }

 .ruta1{
   background: #FFD500;
 }

 .ruta2{
   background: #D55DFC;
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

 $sentencia = $base_de_datos->query("SELECT * FROM pastelesstock");
 $salida= $sentencia->fetchAll(PDO::FETCH_OBJ);

 $sentencia2 = $base_de_datos->query("SELECT SUM(stockRuta1) as total FROM pastelesstock");
 $salida2= $sentencia2->fetchAll(PDO::FETCH_OBJ);

 $sentencia3 = $base_de_datos->query("SELECT SUM(stockRuta2) as total2 FROM pastelesstock");
 $salida3= $sentencia3->fetchAll(PDO::FETCH_OBJ);

  ?>
 <center><div class="container">
   <h1>Salida de Pasteles Trigales de Oro®</h1>
 </div></center>

 <br>
<div class="container">

   <body onload="deshabilitaRetroceso()">
     <div class="container">
       <a href="../Menu2.php"><input class="btn btn-info" type="submit" name="" value="Volver al Menú Principal"></a>
       &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
       &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
       &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
       &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
       <a href="./salidaReporte.php"><input class="btn btn-warning" type="submit" name="" value="GENERAR REPORTE"></a>
       <br><br>
     </div>
     <table class="table table-hover">
       <thead>
         <tr>
           <th class="danger">Id Pastel</th>
           <th class="danger">Pastel</th>
           <th class="warning">Ruta 1</th>
           <th class="">Ruta 2</th>
           <th class="">Total de Pastel</th>


           <!--<th>Eliminar</th>-->
         </tr>
       </thead>
       <tbody>
         <?php foreach($salida as $datos){ ?>
         <tr>
           <td><?php echo $datos->id_producto ?></td>
           <td><?php echo $datos->pastel ?></td>
           <?php
           if ($datos->stockRuta1==0) {
               $datos->stockRuta1="-";
           }
           if ( $datos->stockRuta2==0) {
              $datos->stockRuta2="-";
           }

            ?>

           <td class="ruta1"><center><?php echo $datos->stockRuta1 ?></center></td>
           <td class="ruta2"><center><?php echo $datos->stockRuta2 ?></center></td>
           <td ><center><?php echo $datos->stockRuta1 + $datos->stockRuta2 ?></center></td>
   <?php } ?>

         </tbody>
         <td><center></center></td>
         <td><center>Total de pasteles por ruta</center></td>
         <!--Aqui imprimimos la cantidad de pasteles de la ruta 1-->
         <?php foreach($salida2 as $datos2){ ?>
         <td><center><?php echo $datos2->total ?></center></td>
          <?php } ?>
         <!--Aqui imprimimos la cantidad de pasteles de la ruta 2-->
         <?php foreach($salida3 as $datos3){ ?>
         <td><center><?php echo $datos3->total2 ?></center></td>
         <td><center><?php echo $datos2->total+$datos3->total2 ?></center></td>
    <?php } ?>
 	</table>

 <br><br>
   <form action="reset.php" method="post">
   <center><label>Asegurese de ya no hacer mas ventas -></label><input class="btn btn-danger" type="submit" name="" value="Terminar dia"></center>
   </form>
   <br><br>

     <div class="">
         <form action="salidaReporte.php" method="post">
         <center><input class="btn btn-warning" type="submit" name="" value="GENERAR REPORTE"></center>
         </form>
     </div>
</div>
<br><br>
     <div>
       <center><a href="../Menu2.php">VOLVER AL MENÚ PRINCIPAL</a> </center>
     </div>
     <br><br>


   </body>
 </html>
