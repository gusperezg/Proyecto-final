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
  error_reporting(0);
  $id=$_SESSION["id_usuario"];
        $result = mysqli_query($con,"SELECT COUNT(*) hola FROM carrito where idUsuario=$id;");
    while($row = mysqli_fetch_array($result)) {
     $art=$row['hola'];
    } 
    $_SESSION["articulos"] = $art;
    

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
            echo "Bienvenid@ " . $_SESSION['nombre'];
            echo "</a>";
            echo "</li>";
            echo "<li class='nav-item '>";
            echo "<a class='nav-link'  href='usuario.php' >";
            echo "Perfil";
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
            <?php
           if(isset($_SESSION['nombre'])){
            echo '<li class="nav-item">
              <a class="nav-link" href="carrito.php">Carrito  <span class="badge badge-primary">'  . $_SESSION["articulos"] .    '</span>
            
              </a>
             
            </li>';
            }
            else{
              echo '<li class="nav-item">
              <a class="nav-link" href="carrito.php">Carrito  <span class="badge badge-primary">  0     </span>
            
              </a>
             
            </li>';
            }
            ?>
            <li class="nav-item">
            <a class="nav-link" href="contacto.php">Contacto</a>
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
    background-image: url("imagenes/lo.jpg");

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
      <a href="administrador.php" class="list-group-item active">Agregar Album</a>
      <a href="agregaCanciones.php" class="list-group-item">Agregar Canciones</a>
      <a href="eliminar.php" class="list-group-item">Eliminar</a>
      <a href="historial.php" class="list-group-item">Historial</a>
      <a href="editar.php" class="list-group-item">Editar</a>
    </div>
    </div>
     <div class="col-lg-9">
         <div class="jumbotron">
             <h2> Agregar un Nuevo Album </h2>
             <br>
             <form action="administrador.php" method="post">
             <div class="form-group">
                <label for="Email">Album:</label>
                 <input type="text" class="form-control" id="album" placeholder="Ingrese Nombre del Album" name="album">
                </div>
                <div class="form-group">
                <label for="Email">Artista:</label>
                 <input type="text" class="form-control" id="artista" placeholder="Ingrese Nombre del Artista" name="artista">
                </div>
                <div class="form-group">
                <label for="Email">Descripción: </label>
                 <input type="text" class="form-control" id="nombre" placeholder="Descripcion" name="descripcion">
                </div>
                <div class="form-group">
                <label for="Email">Imagen: </label>
                 <input type="file" class="form-control" id="archivo" name="archivo">
                </div>
                <div class="form-group">
                <label for="Email">Precio: </label>
                 <input type="number" class="form-control" id="precio" placeholder="Precio en Pesos" name="precio">
                </div>
                <div class="form-group">
                <label for="Email">Cantidad: </label>
                 <input type="number" class="form-control" id="cantidad" placeholder="Cantidad de Productos" name="cantidad">
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
$artista=$_POST['artista'];
$descripcion=$_POST['descripcion'];
$imagen=$_POST['archivo'];
$precio=$_POST['precio'];
$cantidad=$_POST['cantidad'];
$id="";

$sql = "SELECT nombre FROM album WHERE nombre = '$album'";
	$resultado=mysqli_query($con,$sql); 
    $numregistros=mysqli_num_rows($resultado); 
    $row = mysqli_fetch_array($resultado);
    if($numregistros>0){
      echo  "<div class='alert alert-danger'>";
      echo "<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>";
      echo "<strong>";
      echo "Error:  ";
      echo "</strong>";
      echo "Ya se ingresó ese Album";
      echo "</div>";

    }
else{


if($album!=null && $artista!=null && $descripcion!=null && $imagen!=null && $precio!=null && $cantidad!=null){

    $sql="INSERT INTO artista (nombre) values ('$artista')";

    if (!mysqli_query($con,$sql)) {
      die('Error: ' . mysqli_error($con));
    }

   $result=mysqli_query($con,"SELECT idArtista id from artista where nombre='$artista'");

   while($row = mysqli_fetch_array($result)) {
    
    $id=$row['id'];
    
   }

    $sql="INSERT INTO album (nombre, descripcion, imagen, precio, cantidad, idArtista) values ('$album', '$descripcion', '$imagen' ,'$precio', '$cantidad', '$id')";

    if (!mysqli_query($con,$sql)) {
      die('Error: ' . mysqli_error($con));
    }
    echo  "<div class='alert alert-success'>";
   echo "<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>";
    echo "<strong>";
    echo "Success!  ";
    echo "</strong>";
    echo "Se ingresaron los Datos.";
  echo "</div>";


}
else{
  if($album!=null){
  echo  "<div class='alert alert-danger'>";
   echo "<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>";
    echo "<strong>";
    echo "Error:  ";
    echo "</strong>";
    echo "Debes de llenar todos los campos.";
  echo "</div>";
  }
}
}
?>




        </div>
    </div>

  </div>

  <br><br>



</div></div>

      <!-- Footer -->

      <footer class="py-5 bg-dark">

        <p class="m-0 text-center text-white">Copyright &copy; Rythm 2018</p>

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