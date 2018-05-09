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
            echo "Bienvenid@ " . $_SESSION['nombre'];
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
            <a class="nav-link" href="contacto.php">Contacto</a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="#">Administrador</a>
            </li>
          </ul>
        </div>
      </div>
    </nav><br><br>

<div class="container">

            <div class="jumbotron">
            <h2>Iniciar Sesión</h2><br>
  <form action="redirecciona.php" method="post">

    <div class="form-group">
      <label for="Email">Usuario</label>
      <input type="text" class="form-control" id="text" placeholder="Ingrese Usuario" name="usuario">
    </div>
    <div class="form-group">
      <label for="pwd">Contraseña:</label>
      <input type="password" class="form-control" id="pwd" placeholder="Ingrese Contraseña" name="contrasena">
    </div>
    <br>
    <div class="boton">
    <button type="submit" class="btn btn-primary">Enviar</button>
    <br><br>
    </div>
</div>

<?php
error_reporting(0);
$usuario=$_POST['usuario'];
$contrasena=$_POST['contrasena'];

if($usuario!=null){
if($usuario=='admin' && $contrasena=='soyeladmin'){
    echo  "<div class='alert alert-success'>";
   echo "<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>";
    echo "<strong>";
    echo "Bienvenido  ";
    echo "</strong>";
    echo "En un momento será redireccionado";
  echo "</div>";
    header("Refresh: 2; URL=administrador.php");
}
else{
    echo  "<div class='alert alert-danger'>";
    echo "<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>";
     echo "<strong>";
     echo "Datos Incorrectos";
     echo "</strong>";
   echo "</div>";
}
}
?>



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