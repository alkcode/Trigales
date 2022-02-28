<?php
session_start();
error_reporting(0);
   require_once("Conexion/conexion.php");
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
 <style>
 marquee{
   font-size: 50px;
 }
 body{
   background:  #0fc712;
 }
 ul {
   list-style-type: none;
   margin: 0;
   padding: 0;
   overflow: hidden;
   background-color: #333;
   font-size: 20px;
   font-family: sans-serif;
 }

 li {
   float: left;
 }

 h1{
     font-size: 40px;
     border-bottom: 6px solid #fffb00;
     font-family: sans-serif;
 }

 marquee{
    font-family: sans-serif;
 }


 li a, .dropbtn {
   display: inline-block;
   color: white;
   text-align: center;
   padding: 14px 16px;
   text-decoration: none;
 }

 li a:hover, .dropdown:hover .dropbtn {
   background-color: red;
 }

 li.dropdown {
   display: inline-block;
 }

 .dropdown-content {
   display: none;
   position: absolute;
   background-color: #f9f9f9;
   min-width: 160px;
   box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
   z-index: 1;
 }

 .dropdown-content a {
   color: black;
   padding: 12px 16px;
   text-decoration: none;
   display: block;
   text-align: left;
 }

 .dropdown-content a:hover {background-color: #f1f1f1;}

 .dropdown:hover .dropdown-content {
   display: block;
 }
 </style>

<?php include("funciones/funciones.php"); ?>

 <title>Menú TRIGALES DE ORO</title>
 <link rel="icon" type="image/png" href="logo 2016.png">
 </head>
 <!--<script type="text/javascript">
   	alert("Menú Principal");
 </script>-->
 <body onload="deshabilitaRetroceso()">

 <ul>
   <li><a href="#EL SABOR DE LA CALIDAD">Inicio</a></li>
   <li class="dropdown">
     <a href="javascript:void(0)" class="dropbtn">Clientes</a>
     <div class="dropdown-content">
       <a href="Clientes/Registro.php">Registrar Clientes</a>
       <a href="Clientes/muestraClientes.php">Mostrar todos los Clientes</a>
       <a href="Clientes/Actualizar_clientes.php">Modificar Clientes</a>
     </div>
   </li>
   <li class="dropdown">
     <a href="javascript:void(0)" class="dropbtn">Pasteles</a>
     <div class="dropdown-content">
       <a href="Pasteles/Pasteles.php">Registrar Pastel</a>
       <a href="Pasteles/muestraPasteles.php">Mostrar todos los Pasteles</a>
       <a href="Pasteles/ActualizarPrecios.php">Modificar Pasteles</a>
       <!-- <a href="Pasteles/detalleRegistro.php">Ver detalles del Articulo</a> -->
              <!-- Agregamos la linea de rellenos -->
       <a href="Rellenos/registroRellenos.php">Registrar Relleno</a>
       <a href="Rellenos/muestraRellenos.php">Mostrar Rellenos</a>
     </div>
   </li>


   <li class="dropdown">
     <a href="javascript:void(0)" class="dropbtn">Ventas</a>
     <div class="dropdown-content">
       <a href="VentaAClientes/elegir.php">Hacer Venta a Clientes</a>
       <a href="./redireccionar.php">Venta de Mostrador</a>
      <a href="Pasteles/ventas.php">Mostrar Ventas</a>
     </div>
   </li>

   <li class="dropdown">
     <a href="javascript:void(0)" class="dropbtn">Salida</a>
     <div class="dropdown-content">
       <a href="Salida/salida.php">Mostrar Salida</a>
       <a href="Salida/salidaReporte.php">Descargar PDF</a>
     </div>
   </li>
   <li class="dropdown">
     <a href="javascript:void(0)" class="dropbtn">Detalle</a>
     <div class="dropdown-content">
       <a href="Reportes/totalVentas.php">Ventas del día</a>
     </div>
   </li>

   <li style="float:right"><a onclick="myFunction2()">Salir</a></li>
 </ul>
 <br><br>
 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
 Bienvenido Usuario "<?php echo $_SESSION['user']; ?>"
 <center><h1>TRIGALES DE ORO ®</h1></center>
 <br>
 <br>
 <center><a href="ds/ea.php"><img src="logo 2016.png" width="200"></a></center>
 <br>
 <br>
 <marquee>¡EL SABOR DE LA CALIDAD!</marquee>

 </body>
 </html>

 <script type="text/javascript">

 window.onload = function Salida(){
   setTimeout('ejecutar()',hora());

 }

 function hora(){
     horaActual=new Date();
     horaProgramada=new Date();
     horaProgramada.setHours(17);
     horaProgramada.setMinutes(16);
     horaProgramada.setSeconds(30);
     return horaProgramada.getTime() - horaActual.getTime();

 }

 function ejecutar(){
   hora();
   if (hora()==0) {
     window.location=("Salida/salidaReporte.php");
     //alert('que pedo prro');
   }else {

   }
 }
//actualizar precios


 </script>
