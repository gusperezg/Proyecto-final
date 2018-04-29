<!DOCTYPE html>
<html>

<?php
  // Crear una conexión
  $con = mysqli_connect("localhost","root","","rythm");

  // Check connection
  if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
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
            <li class="nav-item">
              <a class="nav-link" href="#">Iniciar Sesion</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Carrito</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Contacto</a>
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
      <a href="#" class="list-group-item">Artistas</a>
      <a href="#" class="list-group-item">Canciones</a>
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
</style>
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
        <div class="col-lg-3 col-md-6 mb-4">
          <div class="card">
          <?php
                         $result = mysqli_query($con,"SELECT imagen FROM album where idArtista=1;");
                         ?>
            <img class="card-img-top" src="<?php
                while($row = mysqli_fetch_array($result)) {
                    echo $row['imagen'];
                  }
                 ?>" alt="">
            <div class="card-body">
              <h4 class="card-title">
              <?php
                         $result = mysqli_query($con,"SELECT nombre FROM album where idArtista=1;");
                         while($row = mysqli_fetch_array($result)) {
                            echo $row['nombre'];
                          }
                         ?>
            </h4>
            <h3 class="color">
            <?php
                         $result = mysqli_query($con,"SELECT nombre FROM artista where idArtista=1;");
                         while($row = mysqli_fetch_array($result)) {
                            echo $row['nombre'];
                          }
                         ?>
            
            </h3>
            <h5>
                  $<?php
                         $result = mysqli_query($con,"SELECT precio FROM album where idArtista=1;");
                         while($row = mysqli_fetch_array($result)) {
                           echo $row['precio'];
                         }
                        ?> MX
                  </h5>
              <p class="card-text">
              <?php
                         $result = mysqli_query($con,"SELECT descripcion FROM album where idArtista=1;");
                         while($row = mysqli_fetch_array($result)) {
                            echo $row['descripcion'];
                          }
                         ?>
              </p>
              
            </div>
            <div class="card-footer">        
                  <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9733;</small>&nbsp; &nbsp;
              <a href="#" class="btn btn-primary">Comprar</a>
            </div>
          </div>
        </div>
<!-- Lorde -->
        <div class="col-lg-3 col-md-6 mb-4">
          <div class="card">
          <?php
                         $result = mysqli_query($con,"SELECT imagen FROM album where idArtista=2;");
        ?>
            <img class="card-img-top" src="<?php
            while($row = mysqli_fetch_array($result)) {
                echo $row['imagen'];
              }
             ?>
            " alt="">
            <div class="card-body">
              <h4 class="card-title"> <?php
                         $result = mysqli_query($con,"SELECT nombre FROM album where idArtista=2;");
                         while($row = mysqli_fetch_array($result)) {
                            echo $row['nombre'];
                          }
                         ?></h4>
              <h3 class="color">
            <?php
                         $result = mysqli_query($con,"SELECT nombre FROM artista where idArtista=2;");
                         while($row = mysqli_fetch_array($result)) {
                            echo $row['nombre'];
                          }
                         ?>
            
            </h3>

            <h5>
                  $<?php
                         $result = mysqli_query($con,"SELECT precio FROM album where idArtista=2;");
                         while($row = mysqli_fetch_array($result)) {
                           echo $row['precio'];
                         }
                        ?> MX
                  </h5>
            
              <p class="card-text">
              <?php
                         $result = mysqli_query($con,"SELECT descripcion FROM album where idArtista=2;");
                         while($row = mysqli_fetch_array($result)) {
                            echo $row['descripcion'];
                          }
                         ?>
              </p>


              
            </div>
            <div class="card-footer">
            <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>&nbsp; &nbsp;
              <a href="#" class="btn btn-primary">Comprar</a>

            </div>
          </div>
        </div>
<!-- Luis Miguel -->
        <div class="col-lg-3 col-md-6 mb-4">
        <div class="card">
          <?php
                         $result = mysqli_query($con,"SELECT imagen FROM album where idArtista=3;");
        ?>
            <img class="card-img-top" src="<?php
            while($row = mysqli_fetch_array($result)) {
                echo $row['imagen'];
              }
             ?>
            " alt="">
            <div class="card-body">
              <h5 class="card-title"> <?php
                         $result = mysqli_query($con,"SELECT nombre FROM album where idArtista=3;");
                         while($row = mysqli_fetch_array($result)) {
                            echo $row['nombre'];
                          }
                         ?></h4>
              <h5 class="color">
                  <h3 class="color">
            <?php
                         $result = mysqli_query($con,"SELECT nombre FROM artista where idArtista=3;");
                         while($row = mysqli_fetch_array($result)) {
                            echo $row['nombre'];
                          }
                         ?>
            
            </h3>

            <h5>
                  $<?php
                         $result = mysqli_query($con,"SELECT precio FROM album where idArtista=3;");
                         while($row = mysqli_fetch_array($result)) {
                           echo $row['precio'];
                         }
                        ?> MX
                  </h5>
            
              <p class="card-text">
              <?php
                         $result = mysqli_query($con,"SELECT descripcion FROM album where idArtista=3;");
                         while($row = mysqli_fetch_array($result)) {
                            echo $row['descripcion'];
                          }
                         ?>
              </p>


              
            </div>
            <div class="card-footer">
            <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9733;</small>&nbsp; &nbsp;
              <a href="#" class="btn btn-primary">Comprar</a>

            </div>
          </div>
        </div>
<!-- Bazzi -->
        <div class="col-lg-3 col-md-6 mb-4">
        <div class="card">
          <?php
                         $result = mysqli_query($con,"SELECT imagen FROM album where idArtista=4;");
        ?>
            <img class="card-img-top" src="<?php
            while($row = mysqli_fetch_array($result)) {
                echo $row['imagen'];
              }
             ?>
            " alt="">
            <div class="card-body">
              <h4 class="card-title"> <?php
                         $result = mysqli_query($con,"SELECT nombre FROM album where idArtista=4;");
                         while($row = mysqli_fetch_array($result)) {
                            echo $row['nombre'];
                          }
                         ?></h4>
              <h3 class="color">
            <?php
                         $result = mysqli_query($con,"SELECT nombre FROM artista where idArtista=4;");
                         while($row = mysqli_fetch_array($result)) {
                            echo $row['nombre'];
                          }
                         ?>
            
            </h3>

            <h5>
                  $<?php
                         $result = mysqli_query($con,"SELECT precio FROM album where idArtista=4;");
                         while($row = mysqli_fetch_array($result)) {
                           echo $row['precio'];
                         }
                        ?> MX
                  </h5>
            
              <p class="card-text">
              <?php
                         $result = mysqli_query($con,"SELECT descripcion FROM album where idArtista=4;");
                         while($row = mysqli_fetch_array($result)) {
                            echo $row['descripcion'];
                          }
                         ?>
              </p>


              
            </div>
            <div class="card-footer">
            <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9733;</small>&nbsp; &nbsp;
              <a href="#" class="btn btn-primary">Comprar</a>

            </div>
          </div>

      </div>
      <!-- /.row1 -->
                        </div>
      <!-- row 2 -->
      <div class="row text-center">
          <!-- M83 -->
      <div class="col-lg-3 col-md-6 mb-4">
          <div class="card">
          <?php
                         $result = mysqli_query($con,"SELECT imagen FROM album where idArtista=5;");
                         ?>
            <img class="card-img-top" src="<?php
                while($row = mysqli_fetch_array($result)) {
                    echo $row['imagen'];
                  }
                 ?>" alt="">
            <div class="card-body">
              <h4 class="card-title">
              <?php
                         $result = mysqli_query($con,"SELECT nombre FROM album where idArtista=5;");
                         while($row = mysqli_fetch_array($result)) {
                            echo $row['nombre'];
                          }
                         ?>
            </h4>
            <h3 class="color">
            <?php
                         $result = mysqli_query($con,"SELECT nombre FROM artista where idArtista=5;");
                         while($row = mysqli_fetch_array($result)) {
                            echo $row['nombre'];
                          }
                         ?>
            
            </h3>
            <h5>
                  $<?php
                         $result = mysqli_query($con,"SELECT precio FROM album where idArtista=5;");
                         while($row = mysqli_fetch_array($result)) {
                           echo $row['precio'];
                         }
                        ?> MX
                  </h5>
              <p class="card-text">
              <?php
                         $result = mysqli_query($con,"SELECT descripcion FROM album where idArtista=5;");
                         while($row = mysqli_fetch_array($result)) {
                            echo $row['descripcion'];
                          }
                         ?>
              </p>
              
            </div>
            <div class="card-footer">        
                  <small class="text-muted">&#9733; &#9733; &#9733; &#9734; &#9734;</small>&nbsp; &nbsp;
              <a href="#" class="btn btn-primary">Comprar</a>
            </div>
          </div>
        </div>
<!-- Sigrid -->
        <div class="col-lg-3 col-md-6 mb-4">
          <div class="card">
          <?php
                         $result = mysqli_query($con,"SELECT imagen FROM album where idArtista=6;");
        ?>
            <img class="card-img-top" src="<?php
            while($row = mysqli_fetch_array($result)) {
                echo $row['imagen'];
              }
             ?>
            " alt="">
            <div class="card-body">
              <h4 class="card-title"> <?php
                         $result = mysqli_query($con,"SELECT nombre FROM album where idArtista=6;");
                         while($row = mysqli_fetch_array($result)) {
                            echo $row['nombre'];
                          }
                         ?></h4>
              <h3 class="color">
            <?php
                         $result = mysqli_query($con,"SELECT nombre FROM artista where idArtista=6;");
                         while($row = mysqli_fetch_array($result)) {
                            echo $row['nombre'];
                          }
                         ?>
            
            </h3>

            <h5>
                  $<?php
                         $result = mysqli_query($con,"SELECT precio FROM album where idArtista=6;");
                         while($row = mysqli_fetch_array($result)) {
                           echo $row['precio'];
                         }
                        ?> MX
                  </h5>
            
              <p class="card-text">
              <?php
                         $result = mysqli_query($con,"SELECT descripcion FROM album where idArtista=6;");
                         while($row = mysqli_fetch_array($result)) {
                            echo $row['descripcion'];
                          }
                         ?>
              </p>


              
            </div>
            <div class="card-footer">
            <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>&nbsp; &nbsp;
              <a href="#" class="btn btn-primary">Comprar</a>

            </div>
          </div>
        </div>
<!-- Lana del Rey -->
        <div class="col-lg-3 col-md-6 mb-4">
        <div class="card">
          <?php
                         $result = mysqli_query($con,"SELECT imagen FROM album where idArtista=7;");
        ?>
            <img class="card-img-top" src="<?php
            while($row = mysqli_fetch_array($result)) {
                echo $row['imagen'];
              }
             ?>
            " alt="">
            <div class="card-body">
              <h4 class="card-title"> <?php
                         $result = mysqli_query($con,"SELECT nombre FROM album where idArtista=7;");
                         while($row = mysqli_fetch_array($result)) {
                            echo $row['nombre'];
                          }
                         ?></h4>
              <h3 class="color">
            <?php
                         $result = mysqli_query($con,"SELECT nombre FROM artista where idArtista=7;");
                         while($row = mysqli_fetch_array($result)) {
                            echo $row['nombre'];
                          }
                         ?>
            
            </h3>

            <h5>
                  $<?php
                         $result = mysqli_query($con,"SELECT precio FROM album where idArtista=7;");
                         while($row = mysqli_fetch_array($result)) {
                           echo $row['precio'];
                         }
                        ?> MX
                  </h5>
            
              <p class="card-text">
              <?php
                         $result = mysqli_query($con,"SELECT descripcion FROM album where idArtista=7;");
                         while($row = mysqli_fetch_array($result)) {
                            echo $row['descripcion'];
                          }
                         ?>
              </p>


              
            </div>
            <div class="card-footer">
            <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9733;</small>&nbsp; &nbsp;
              <a href="#" class="btn btn-primary">Comprar</a>

            </div>
          </div>
        </div>
<!-- Halsey -->
        <div class="col-lg-3 col-md-6 mb-4">
        <div class="card">
          <?php
                         $result = mysqli_query($con,"SELECT imagen FROM album where idArtista=8;");
        ?>
            <img class="card-img-top" src="<?php
            while($row = mysqli_fetch_array($result)) {
                echo $row['imagen'];
              }
             ?>
            " alt="">
            <div class="card-body">
              <h4 class="card-title"> <?php
                         $result = mysqli_query($con,"SELECT nombre FROM album where idArtista=8;");
                         while($row = mysqli_fetch_array($result)) {
                            echo $row['nombre'];
                          }
                         ?></h4>
              <h3 class="color">
            <?php
                         $result = mysqli_query($con,"SELECT nombre FROM artista where idArtista=8;");
                         while($row = mysqli_fetch_array($result)) {
                            echo $row['nombre'];
                          }
                         ?>
            
            </h3>

            <h5>
                  $<?php
                         $result = mysqli_query($con,"SELECT precio FROM album where idArtista=8;");
                         while($row = mysqli_fetch_array($result)) {
                           echo $row['precio'];
                         }
                        ?> MX
                  </h5>
            
              <p class="card-text">
              <?php
                         $result = mysqli_query($con,"SELECT descripcion FROM album where idArtista=8;");
                         while($row = mysqli_fetch_array($result)) {
                            echo $row['descripcion'];
                          }
                         ?>
              </p>


              
            </div>
            <div class="card-footer">
            <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9733;</small>&nbsp; &nbsp;
              <a href="#" class="btn btn-primary">Comprar</a>

            </div>
          </div>


    
        </div>
        <!-- /Row 2 -->
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
