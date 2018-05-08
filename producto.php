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

    <?php
      $a=$_GET['a'];

    echo "<title>" . $a . "</title>";

    ?>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/heroic-features.css" rel="stylesheet">

  </head>

  <body>
      <!-- Barra de Arriba -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="index.php">Rythm</a>
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
              <a class="nav-link" href="carrito.php">Carrito </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Contacto</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="redirecciona.php">Administrador</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <br><br>


    <style>
        .img-fluid{
            width:700px;
            height:700px;
            border-radius: 2%;
        }
        .color{
            color:#2E86C1;
        }
        .contenedor{
            padding-left:80%;
        }
        .contenedor1{
            padding-left:40%;
        }
        .table-hover tbody tr:hover td {
    background-color: #AED6F1 ;
}
    </style>
    <!-- Page Content -->
    <div class="container">

      <!-- Portfolio Item Heading -->
      <?php
      error_reporting(0);
      $a=$_GET['a'];
      $result = mysqli_query($con,"SELECT a.imagen, ar.nombre artista, a.nombre album from album a, artista ar where a.idArtista=ar.idArtista and a.nombre='".$a."';");
 while($row = mysqli_fetch_array($result)) {
     echo "<br>";
    echo "<div class='contenedor'>";
    echo "<a href='albumes.php'>";
    echo "<button type='button' class='btn btn-success'>" . 'Regresar' . "</button>";
    echo "</a>";
    echo "</div>";
     echo "<h1 class='my-4'>" . $row['album'];
     echo '&nbsp;';
    echo "<small class='color'>" . $row['artista'] . "</small>";
    echo "</h1>";
    


      echo "<div class='row'>";

       echo  "<div class='col-md-8'>";
        echo "<img class='img-fluid' src='" . $row['imagen'] . "' alt=''>";
        echo "</div>";
 }
        $contador=1;
        echo "<div class='col-md-4'>";
        echo "<h3>" . 'Canciones' . "</h3>";
        
        echo "<table class='table table-striped table-hover'>";
        echo "<tr>
        <th>Numero</th>
        <th>Nombre</th>
        </tr>";
        $resultado = mysqli_query($con,"SELECT c.nombre cancion, a.idAlbum id from canciones c, album a where c.idAlbum=a.idAlbum and a.nombre='". $a ."' ;");
        while($row = mysqli_fetch_array($resultado)) {
            $idAlbum=$row['id'];
            echo "<tr>";
            echo "<td>" . $contador++ . "</td>";
            echo "<td>" . $row['cancion'] . "</td>";

            echo "</tr>";

        }
    
        echo "</table>";

        echo "<div class='contenedor1'>";
    echo "<a href='carrito.php?a=$idAlbum'>";
    echo "<button type='button' class='btn btn-primary'>" . 'Comprar' . "</button>";
    echo "</a>";
    echo "</div>";

        echo "</div>";
        echo "</div>";
        


 ?>




    <!-- Footer -->
    <div class="container">
    <br>
<br>
    <footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Your Website 2018</p>
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