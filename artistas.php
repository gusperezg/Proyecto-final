<!DOCTYPE html>
<html>

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
    <title>Artistas</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/heroic-features.css" rel="stylesheet">

  </head>

  <body>
      <!-- Barra de Arriba -->
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
                
              </a>
            </li>
            <?php
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
              <a class="nav-link" href="carrito.php">Carrito</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="contacto.php">Contacto</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="redirecciona.php">Administrador</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <br><br>

       <div class="container">

<div class="row">

  <div class="col-lg-3">

    <h1 class="my-4">Rythm</h1>
    <div class="list-group">
      <a href="index.php" class="list-group-item ">Inicio</a>
      <a href="albumes.php" class="list-group-item">Albumes</a>
      <a href="artistas.php" class="list-group-item active">Artistas</a>
      <a href="canciones.php" class="list-group-item">Canciones</a>
    </div>

  </div>

<style>
.parallax { 
    /* The image used */
    background-image: url("imagenes/troyes.jpg");

    /* Set a specific height */
    width: 868px;
    height: 400px; 

    /* Create the parallax scrolling effect */
    background-attachment: fixed;
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
}
.texto{
    font-family: Arial, Helvetica, sans-serif;
    font-size: 80px;
    color: white;
    padding-top:20%
    
}
.contenedor{
    position: relative;
    display: inline-block;
    text-align: center;
}
 
.texto-encima{
    position: absolute;
    top: 10px;
    left: 10px;
}
.centrado{
    position: absolute;
    color:white;
    font-size:40px;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);

}
.imagen{
    width:300px;
    height:300px;
}
.contenedor{
    width:100%;
}

</style>
        <div class="col-lg-9">
<div class="parallax">
    <div class="text-center">
          
      <h1 class="texto">Artistas</h1>

    </div>
</div>
</div>
<br><br>

<div class="container">
<br>



</div>
<div class="container">

 <div class="row">
     
     <?php
 $result = mysqli_query($con,"SELECT a.imagen, ar.nombre from album a, artista ar where a.idArtista=ar.idArtista;");
 while($row = mysqli_fetch_array($result)) {
        echo "<div class='col-md-3 col-sm-6 mb-4'>";
            echo "<div class='contenedor'>";
        echo "<img class='imagen' src='imagenes/"  . $row['imagen'] ."'>";
  echo "<div class='centrado'>" . $row['nombre'] . "</div>";
    echo "</div>";

echo "</div>";
 }
?>
</div>
</div>








    <!-- Footer -->
    <div class="contenedor">
    <footer class="py-5 bg-dark">

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