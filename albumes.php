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
    <title>Albumes</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/heroic-features.css" rel="stylesheet">

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
              <a class="nav-link" href="carrito.php">Carrito &nbsp; <?php
                  if(isset($_SESSION['nombre'])){
                  echo "<span class='badge badge-info'>" . $_SESSION['articulos'] . "</span>";
                  }
                  else{
                    echo "<span class='badge badge-info'>0</span>";
                  }
                  ?></a>
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

      <!-- Jumbotron Header -->
      <div class="container">

<div class="row">

  <div class="col-lg-3">

    <h1 class="my-4">Rythm</h1>
    <div class="list-group">
      <a href="index.php" class="list-group-item ">Inicio</a>
      <a href="albumes.php" class="list-group-item active">Albumes</a>
      <a href="artistas.php" class="list-group-item">Artistas</a>
      <a href="canciones.php" class="list-group-item">Canciones</a>
    </div>

  </div>
<style>
.parallax { 
    /* The image used */
    background-image: url("bebe.jpg");

    /* Set a specific height */
    width: 840px;
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
.color{
    color:#3498DB  ;
}
.naranja{
    color:orange;
}
.card-body{
    height:200px;
}
</style>

<script>
function mFunction() {
    <?php
    $_SESSION['articulos'] = ((int) $_SESSION['articulos'] + 1);
    ?>
}

 </script>   
        <div class="col-lg-9">


  <div class="parallax">
      <div class="text-center">
          
      <h1 class="texto">Albumes</h1>

</div>
</div>
<br><br>
</div>
      <!-- Tarjetas de los Discos -->
      <div class="row text-center">
          <!-- Ariana Grande -->
        
          <?php
              $result = mysqli_query($con,"SELECT imagen, a.nombre album, ar.nombre artista, precio, descripcion, a.idAlbum id FROM album a, artista ar where a.idArtista=ar.idArtista;");
              while($row = mysqli_fetch_array($result)) {

                $id=$row['album'];
                $idAlbum=$row['id'];
        echo "<div class='col-lg-3 col-md-6 mb-4'>";
        echo "<div class='card'>"; 
        echo "<a href='producto.php?a=$id'>";
        echo "<img class='card-img-top' src='" . $row['imagen'] . "'>";
        echo "<div class='card-body'>";
        echo "<h4 class='card-title'>";
        
            echo $row['album'];
        echo "</a>";
        echo "</h4>";
        echo "<h3>";
        echo $row['artista'];
        echo "</h3>";
        echo "<h5 class='naranja'>";
        echo "$";
        echo $row['precio'];
                echo "MX";
        echo "</h5>";


        echo " <p class='card-text'>";
        echo $row['descripcion'];
        echo "</p>";
        echo "</div>";
        echo " <div class='card-footer'>";

       echo "<small class='text-muted'>&#9733; &#9733; &#9733; &#9733; &#973".rand(3, 4)."</small>&nbsp; &nbsp;";
        echo "<a href='carrito.php?a=$idAlbum' onclick='mFunction()' class='btn btn-primary'>Comprar</a>";
        echo "</div>";
         echo  "</div>";

        echo "</div>";
                        }
                        ?>






    </div>
    
    <!-- /.container -->

    <!-- Footer -->
    <div class="container">
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
