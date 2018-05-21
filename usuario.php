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

    <title>Usuario</title>

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
            echo "<a class='nav-link'  >";
            echo "Bienvenid@ " . $_SESSION['nombre'];
            echo "</a>";
            echo "</li>";
            echo "<li class='nav-item active'>";
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
            <li class="nav-item">
              <a class="nav-link" href="carrito.php">Carrito 
              </a>
             
            </li>
            <li class="nav-item">
            <a class="nav-link" href="contacto.php">Contacto</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Administrador</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>


<style>
.parallax { 
    /* The image used */
    background-image: url("imagenes/lor.jpg");

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
  .jumbotrons{

background-color:#D4E6F1 !important;
}

</style>



<div class="parallax">
<div class="text-center">
    <h1>
    Usuario
    </h1>
</div>

    </div>
    <br>
    
  <div class="Container">
  <div class="row">
  <div class="col-lg-1">
  </div>
  
  <div class="col-lg-10">
  <div class="jumbotron jumbotrons">
  <h2>Datos del Usuario</h2>
  </div>
      <div class="jumbotron">
    
  
    <?php
    $id=$_SESSION['id_usuario'];
    $result = mysqli_query($con,"SELECT nombre, correo, contra, nacimiento, tarjeta, direccion FROM usuarios where idUsuarios=$id;");
    while($row = mysqli_fetch_array($result)) {
    echo "<h4>Nombre:  " . $row['nombre'] . "</h4>";
    echo "<br>";
    echo "<h4>Correo:  " . $row['correo'] . "</h4>";
    echo "<br>";
    echo "<h4>Fecha de Nacimiento:  " . $row['nacimiento'] . "</h4>";
    echo "<br>";
  
    echo "<h4>Tarjeta:  " . $row['tarjeta'] . "</h4>";
    echo "<br>";
    echo "<h4>Dirección:  " . $row['direccion'] . "</h4>";
    }

    ?>
    </div>
    </div>
    </div>
    
    <br>



 




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