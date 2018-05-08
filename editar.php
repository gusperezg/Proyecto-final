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

    <title>Administrador</title>

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
    </nav>
<style>
.parallax { 
    /* The image used */
    background-image: url("lo.jpg");

    /* Set a specific height */
    height: 400px; 

    /* Create the parallax scrolling effect */
    background-attachment: fixed;
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
}
.text-center{
    color:white;
      padding-top:100px;

  }
  h1{
    font-size:200px;
  }
  label{
    font-weight: bold;
  }
</style>



<div class="parallax">
<div class="text-center">
    <h1>
    Administrador
    </h1>
</div>

    </div>
    <br>

 <div class="container">
<div class="row">

  <div class="col-lg-3">

    <div class="list-group">
      <a href="administrador.php" class="list-group-item">Agregar Album</a>
      <a href="agregaCanciones.php" class="list-group-item">Agregar Canciones</a>
      <a href="eliminar.php" class="list-group-item">Eliminar</a>
      <a href="historial.php" class="list-group-item">Historial</a>
      <a href="editar.php" class="list-group-item active">Editar</a>
    </div>
    </div>
     <div class="col-lg-9">
         <div class="jumbotron">
             <h2> E D I T A R </h2>
             <br>
             <form action="editar.php" method="post">
             <div class="form-group">
                <label for="Album">Selecciona Album:</label><br>
                <SELECT name="album" class="form-control" height=100% width=50%>
                <option>ALBUM</option>
                <?php
                 $result=mysqli_query($con,"SELECT nombre album, idAlbum id from album;");

                 while($row = mysqli_fetch_array($result)) {
                echo "<option value=" . $row['id'] . ">" . $row['album'] . "</option>";
                 }
                ?>
                </select>
                </div>

              
                
                


                <br>
             <div class="boton">
                 <button type="submit" class="btn btn-success">Enviar</button>
              <br><br>
            </div>
</form>


<?php
error_reporting(0);
$album=$_POST['album'];
$id=$_GET['a'];
$precio=$_POST['precio'];
$cantidad=$_POST['cantidad'];

                 
                 



                 $res=mysqli_query($con,"SELECT al.nombre nombre, imagen, a.nombre artista, precio, cantidad from album al, artista a where al.idArtista=a.idArtista and al.idAlbum='$album';");

                 while($row = mysqli_fetch_array($res)) {
                     
                     echo "<h2>" . 'Album Seleccionado: ' . "</h2>";
                     echo "<br>";
                   echo "<table class='table table-striped'>";
                    echo "<tr>";
                    echo "<th>" . 'Nombre' . "</th><th>" . 'imagen' ."</th><th>" . 'Artista' ."</th><th>" . 'Precio' ."</th><th>" . 'Cantidad' . "</th>";
                    echo "</tr>";
                echo "<tr><td>" . $row['nombre'] . "</td>";
                echo "<td><img src='" . $row['imagen'] . "' width='100px'></td>";
                echo "<td>" . $row['artista'] ."</td>";
                echo "<td>" . $row['precio'] ."</td>";
                echo "<td>" . $row['cantidad'] ."</td></tr>";
                echo "</table>";

                echo '<form action="editar.php?a=' . $album . '" method="post">
             <div class="form-group">
                <label for="cancion">Nuevo Precio:</label><br>
                <input type="number" class="form-control" placeholder="Precio en Pesos" name="precio">
                </div>
                <div class="form-group">
                <label for="cancion">Nueva Cantidad:</label><br>
                <input type="number" class="form-control" placeholder="Cantidad" name="cantidad">
                </div>

                <br>
             <div class="boton">
                 <button type="submit" class="btn btn-primary">Enviar</button>
              <br><br>
            </div>
            </form>';
                
                 }

                 if($precio!=null){
                 $sql="UPDATE album SET precio='$precio', cantidad='$cantidad' where idAlbum=$id;";
                  if (!mysqli_query($con,$sql)) {
                     die('Error: ' . mysqli_error($con));
                   }

                   echo  "<div class='alert alert-success'>";
                    echo "<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>";
                    echo "<strong>";
                    echo "Success!  ";
                    echo "</strong>";
                    echo "Se Realizaron los cambios.";
                echo "</div>";
                }


                  
?>



        </div>
    </div>

  </div>

  <br><br>





      <!-- Footer -->
      <div class="container">
      <footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Rythm 2018</p>
</div>
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