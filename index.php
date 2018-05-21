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
            <li class="nav-item active">
              <a class="nav-link" href="#">Inicio
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
            <li class="nav-item">
              <a class="nav-link" href="redirecciona.php">Administrador</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Page Content -->
    <div class="container">

      <div class="row">

        <div class="col-lg-3">

          <h1 class="my-4">Rythm</h1>
          <div class="list-group" >
            <a href="index.php" class="list-group-item active">Inicio</a>
            <a href="albumes.php" class="list-group-item">Albumes</a>
            <a href="artistas.php" class="list-group-item">Artistas</a>
            <a href="canciones.php" class="list-group-item">Canciones</a>
          </div>

        </div>
        <!-- /.col-lg-3 -->

        <div class="col-lg-9">

          <div id="carouselExampleIndicators" class="carousel slide my-5" data-ride="carousel">
            <ol class="carousel-indicators">
              <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
            </ol>
            <div class="carousel-inner img-fluid" role="listbox">
              <div class="carousel-item active">
                <img class="d-block img-fluid" src="imagenes/lorde.jpg" alt="First slide">
                <div class="carousel-caption d-none d-md-block">
                <h1>Lorde</h1>

                <p>Melodrama</p>
                    </div>
              </div>
              <div class="carousel-item">
                <img class="d-block img-fluid" src="imagenes/lana.jpg" alt="Second slide">
                <div class="carousel-caption d-none d-md-block">
                <h1>Lana del Rey</h1>

                <p>Lust For Life</p>
                    </div>
              </div>
              <div class="carousel-item">
                <img class="d-block img-fluid" src="imagenes/dua.png" alt="Third slide">
                <div class="carousel-caption d-none d-md-block">
                <h1>DUA LIPA</h1>

                <p>One Kiss</p>
                    </div>
              </div>
              <div class="carousel-item">
                <img class="d-block img-fluid" src="imagenes/col.jpg" alt="Third slide">
                <div class="carousel-caption d-none d-md-block">
                <h1><font color="black">Coldplay</font></h1>

                <p><font color="black">Mylo Xyloto</font></p>
                    </div>
              </div>
              
            </div>
            
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>

               



            <center><h1 class="my-3 jumbotron jum">Nuevos Lanzamientos</h1></center><br>

          <div class="row jumbotron">
          
<!-- Tarjeta 1 -->
            <div class="col-lg-4 col-md-6 mb-4">
              <div class="card h-100">
              <?php
                         $result = mysqli_query($con,"SELECT imagen FROM album where idArtista=1;");
                         
                echo "<a href='producto.php?a=No tears left to cry'>";
                ?>
                    <img class="card-img-top" src="imagenes/<?php
                while($row = mysqli_fetch_array($result)) {
                    echo $row['imagen'];
                  }
                 ?>
                " alt=""></a>
                <div class="card-body">
                  <h4 class="card-title">
                    <a href="#">
                        <?php
                         $result = mysqli_query($con,"SELECT nombre FROM artista where idArtista=1;");
                         while($row = mysqli_fetch_array($result)) {
                          echo "<a href='producto.php?a=No tears left to cry'>";
                           echo $row['nombre'];
                           echo "</a>";
                         }
                        ?>
                    </a>
                  </h4>
                  <h3>
                  <?php
                         $result = mysqli_query($con,"SELECT nombre FROM album where idArtista=1;");
                         while($row = mysqli_fetch_array($result)) {
                           echo $row['nombre'];
                         }
                        ?>
                  </h3>
                  <p class="card-text">
                  <?php
                         $result = mysqli_query($con,"SELECT descripcion FROM album where idArtista=1;");
                         while($row = mysqli_fetch_array($result)) {
                           echo $row['descripcion'];
                         }
                        ?>
                  </p>
                  <h5>
                  $<?php
                         $result = mysqli_query($con,"SELECT precio FROM album where idArtista=1;");
                         while($row = mysqli_fetch_array($result)) {
                           echo $row['precio'];
                         }
                        ?> MX
                  </h5>
                  
                </div>
                <div class="card-footer">
                  <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9733;</small>
                  
                </div>
              </div>
            </div>

<!-- Tarjeta 2 -->
<div class="col-lg-4 col-md-6 mb-4">

              <div class="card h-100">
              <?php
                         $result = mysqli_query($con,"SELECT imagen FROM album where idArtista=5;");
                         
                         echo "<a href='producto.php?a=Melodrama'>";
                         ?>
                         <img class="card-img-top" src="imagenes/<?php
                while($row = mysqli_fetch_array($result)) {
                    echo $row['imagen'];
                  }
                 ?>
                " alt=""></a>
                <div class="card-body">
                  <h4 class="card-title">
                    <a href="#">
                        <?php
                         $result = mysqli_query($con,"SELECT nombre FROM artista where idArtista=5;");
                         while($row = mysqli_fetch_array($result)) {
                          echo "<a href='producto.php?a=Melodrama'>";
                           echo $row['nombre'];
                           echo "</a>";
                         }
                        ?>
                    </a>
                  </h4>
                  <h3>
                  <?php
                         $result = mysqli_query($con,"SELECT nombre FROM album where idArtista=5;");
                         while($row = mysqli_fetch_array($result)) {
                          
                           echo $row['nombre'];
                           
                         }
                        ?>
                  </h3>
                  <p class="card-text">
                  <?php
                         $result = mysqli_query($con,"SELECT descripcion FROM album where idArtista=5;");
                         while($row = mysqli_fetch_array($result)) {
                           echo $row['descripcion'];
                         }
                        ?>
                  </p>
                  <h5>
                  $<?php
                         $result = mysqli_query($con,"SELECT precio FROM album where idArtista=5;");
                         while($row = mysqli_fetch_array($result)) {
                           echo $row['precio'];
                         }
                        ?> MX
                  </h5>
                </div>
                <div class="card-footer">
                  <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
                </div>
              </div>
            </div>
<!-- Tarjeta 3 -->
<div class="col-lg-4 col-md-6 mb-4">
              <div class="card h-100">
              <?php
                         $result = mysqli_query($con,"SELECT imagen FROM album where idArtista=15;");
                         
                         echo "<a href='producto.php?a=Dont Kill My Vibe EP'>";
                ?>
                <img class="card-img-top" src="imagenes/<?php
                while($row = mysqli_fetch_array($result)) {
                    echo $row['imagen'];
                  }
                 ?>
                " alt=""></a>
                <div class="card-body">
                  <h4 class="card-title">
                    <a href="#">
                        <?php
                         $result = mysqli_query($con,"SELECT nombre FROM artista where idArtista=15;");
                         while($row = mysqli_fetch_array($result)) {
                          echo "<a href='producto.php?a=Dont Kill My Vibe EP'>";
                           echo $row['nombre'];
                           echo "</a>";
                         }
                        ?>
                    </a>
                  </h4>
                  <h3>
                  <?php
                         $result = mysqli_query($con,"SELECT nombre FROM album where idArtista=15;");
                         while($row = mysqli_fetch_array($result)) {
                           echo $row['nombre'];
                         }
                        ?>
                  </h3>
                  <p class="card-text">
                  <?php
                         $result = mysqli_query($con,"SELECT descripcion FROM album where idArtista=15;");
                         while($row = mysqli_fetch_array($result)) {
                           echo $row['descripcion'];
                         }
                        ?>
                  </p>
                  <h5>
                  $<?php
                         $result = mysqli_query($con,"SELECT precio FROM album where idArtista=15;");
                         while($row = mysqli_fetch_array($result)) {
                           echo $row['precio'];
                         }
                        ?> MX
                  </h5>
                </div>
                <div class="card-footer">
                  <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9733;</small>
                </div>
              </div>
            </div>
                  




          </div>
          <!-- /.row -->
          <div class="row">
                <center>
                <h1>Top Charts</h1>
                </center>
                <br>
            <table class="table table-striped table-hover">
            <tr><th>Imagen</th><th>Posición</th><th>Nombre</th><th>Artista</th><th>Album</th></tr>
            <?php
            $result = mysqli_query($con,"SELECT a.imagen, c.nombre cancion, ar.nombre artista, a.nombre album from canciones c, artista ar, album a where c.idArtista=ar.idArtista and c.idAlbum=a.idAlbum order by c.nombre");
            $contador=1;
            while($row = mysqli_fetch_array($result)) {
              $id=$row['album'];
              if($contador<=5){
                echo "<tr>";
                echo "<td>" . $contador++ . "</td>";
                echo "<td><img src='imagenes/" . $row['imagen'] . "' width='100px'></td>";

                echo "<th><a href='producto.php?a=$id'>" . $row['cancion'] . "</a></th>";
                echo "<td>" . $row['artista'] . "</td>";
                echo "<td>" . $row['album'] . "</td>";
                echo "<tr>";
              }
            }
          
            ?>
</table>
                </div>

          

        </div>
        <!-- /.col-lg-9 -->

      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->
<!--Parallax Effect -->
<style>
.parallax { 
    /* The image used */
    background-image: url("imagenes/halsey.jpg");

    /* Set a specific height */
    height: 500px; 

    /* Create the parallax scrolling effect */
    background-attachment: fixed;
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
}

.btn{
  font-size:10px;
        font-family:Verdana,Helvetica;
        font-weight:bold;
        font-size:30px;
        color:white;
        background:#638cb5;
        border:0px;
        width:200px;
        height:70px;
        border-radius: 35px;
  }
  .text-center{
      padding-top:200px;
  }
  .img-fluid{

            border-radius: 3%;
        }
  
  .jum{
    color:white;
    background:linear-gradient(30deg, crimson,sienna, purple, indianred, pink);
   
}
.titulo{
  color:white;
}


</style>
<!-- dentro de la imagen -->
    <div class="parallax">
    <?php  echo "<a href='producto.php?a=Hopeless Fountain Kingdom' class='nav-link'>"; ?> 
        <div class="text-center">
            
    <button class="btn">Halsey</button><br><br>
   
    <h4 class="titulo">
        Nuevo Album
    </h4>
</a>
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
