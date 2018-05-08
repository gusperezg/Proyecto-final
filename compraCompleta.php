<!DOCTYPE html>
<html lang="es">
  <?php
  // Crear una conexión
  $con = mysqli_connect("localhost","root","","rythm");

  // Check connection
  if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

  session_start();

?>
   
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" href="music.png" />

    <title>Rythm</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    

    <!-- Custom styles for this template -->
    <link href="css/shop-homepage.css" rel="stylesheet">

  </head>

  <body>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="#">Rythm</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="index.php">Inicio
                <span class="sr-only">(current)</span>
              </a>
            </li><?php
                if(isset($_SESSION['nombre'])){
            echo "<li class='nav-item'>";
            echo "<a class='nav-link' >";
            echo "Bienvenido " . $_SESSION['nombre'];
            echo "</a>";
            echo "</li>";
                }
            ?>
            <li class="nav-item">
                <?php
                if(!isset($_SESSION['nombre'])){
              echo "<a class='nav-link' href='sesion.php'>" . "Iniciar Sesión" . "</a>";
                }
                else{
                    echo "<a class='nav-link' href='cerrar.php'>" . "Cerrar Sesión" . "</a>";
                }?>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="carrito.php">Carrito 
              </a>
             
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Contacto</a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="#">Administrador</a>
            </li>
          </ul>
        </div>
      </div>
    </nav><br><br>

<style>
h3{
    color:#2874A6;
}


</style>


<div class="container">

<div class="row">
<div class="col-lg-2">

</div>
<div class="jumbotron">
<center>
  <div class="col-lg-9">
    <h1>Se realizó la compra Correctamente</h1>
    <img src="palomita.png" width=130px>
    <br><br>
    <h3>Articulos Comprados</h3>
    <br>
    <?php
    error_reporting(0);
    $id=$_SESSION['id_usuario'];
    $idAlbum="";
    $total="";
    $cantidad="";
     $result = mysqli_query($con,"SELECT imagen, a.nombre album, ar.nombre artista, precio, ca.cantidad, a.idAlbum id from album a, artista ar, carrito ca where a.idAlbum=ca.idAlbum and a.idArtista=ar.idArtista and idUsuario=$id;");
     $contador=1;
     echo "<div class='contenedor'>";
   echo "<table class='table table-striped table-hover'>";
   echo "<tr><th>Imagen</th><th>Articulo</th><th>Artista</th><th>Album</th><th>Cantidad</th><th>Precio</th></tr>";
 
   

 while($row = mysqli_fetch_array($result)) {
     echo "<tr>";
     echo "<td><img src='" . $row['imagen'] . "' width='100px'></td>";
     echo "<td>" . $contador++ . "</td>";
     echo "<td>" . $row['artista'] . "</td>";
     echo "<td>" . $row['album'] . "</td>";
     echo "<td>" . $row['cantidad'] . "</td>";
     echo "<td width='150px'> $" . $row['precio'] . " MX </td>";
     echo "<tr>";
     $total+=($row['cantidad'] * $row['precio']);
     $idAlbum=$row['id'];
     $cantidad=$row['cantidad'];

    $sql="INSERT into historial (idAlbum, idUsuario, cantidad) values ('$idAlbum', '$id', '$cantidad')";
    if (!mysqli_query($con,$sql)) {
        die('Error: ' . mysqli_error($con));
       }

       $resultado = mysqli_query($con,"SELECT cantidad from album where idAlbum='$idAlbum';");
       while($row1 = mysqli_fetch_array($resultado)) {
           $cant=$row1['cantidad']-$cantidad;
        $sql="UPDATE album set cantidad='$cant' where idAlbum='$idAlbum'";
        if (!mysqli_query($con,$sql)) {
            die('Error: ' . mysqli_error($con));
           }
       }

    $sql="DELETE from carrito where idUsuario='$id'";
    if (!mysqli_query($con,$sql)) {
        die('Error: ' . mysqli_error($con));
       }
       
 }

 echo "<tr><td></td><td></td><td></td><td></td><td>TOTAL</td><td> $" . $total . " MX</td></tr>";
 echo "</table>";


    ?>

   <center> <a href="index.php"><button  class="btn btn-success">Regresar</button></a> </center>
    </div>
</center>
</div>



</div>

</div>




  <!-- Footer -->
  <footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Rythm 2018</p>
      </div>
      <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>





   
</body>
<?php
mysqli_close($con);
?>
</html>