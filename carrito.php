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
    <title>Carrito</title>

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
            <li class="nav-item">
              <a class="nav-link active" href="carrito.php">Carrito &nbsp;<?php
                  if(isset($_SESSION['nombre'])){
                  echo "<span class='badge badge-info'>" . $_SESSION['articulos']. "</span>";
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

    <style>
.parallax { 
    /* The image used */
    background-image: url("charli_xc.jpg");

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
.contenedor{
    width:80%;
    padding-left:25%;
}
.btn{
    padding:20px;
}
.boton{
    padding-left:45%;

}
.botoncito{
    padding-left:60%;
}
</style>
<script>
function funcion(){
    $_SESSION['articulos'] = 0;
}

</script>



<div class="parallax">
<div class="text-center">
    <h1>
    Carrito
    </h1>
</div>

    </div>

    <?php



if(isset($_SESSION['nombre'])){ //checa si hay una sesion iniciada
      error_reporting(0);
     $a=$_GET['a'];
     $id=$_SESSION["id_usuario"];

    

    if($a!=null){ // Ingresar al carrito cuando se agrega algo 
     $sql="INSERT INTO carrito (idAlbum, idUsuario, cantidad)
     VALUES ($a, $id, 1);";
    if (!mysqli_query($con,$sql)) {
        die('Error: ' . mysqli_error($con));
      }
    
    
      $result = mysqli_query($con,"SELECT imagen, a.nombre album, ar.nombre artista, precio, ca.cantidad from album a, artista ar, carrito ca where a.idAlbum=ca.idAlbum and a.idArtista=ar.idArtista and idUsuario=$id;");
      $contador=1;
      echo "<div class='contenedor'>";
    echo "<table class='table table-striped table-hover'>";
    echo "<tr><th>Imagen</th><th>Producto</th><th>Artista</th><th>Album</th><th>Cantidad</th><th>Precio</th></tr>";
  
  while($row = mysqli_fetch_array($result)) {
    echo "<form action='carrito.php' method='post'>";
      echo "<tr>";
      echo "<td><img src='" . $row['imagen'] . "' width='100px'></td>";
      echo "<td>" . $contador++ . "</td>";
      echo "<td>" . $row['artista'] . "</td>";
      echo "<th> " . $row['album'] . "</th>";
      echo "<td><input type='text' size='5' value=' " . $row['cantidad'] . "'></td>";
      echo "<td> $ " . $row['precio'] . " MX </td>";
      echo "<tr>";
      echo "</form>";
     
  }
  echo "</table>";
  echo "</div>";
    
  echo "<div class='botoncito'>";
  echo "<a href='carrito.php' onclick='funcion()' class='btn btn-danger'>Vaciar Carrito</a>";
  echo "</div>";
  echo "<br>";
}

//Entra al carrito sin agregar productos a este

else{

    $result = mysqli_query($con,"SELECT imagen, a.nombre album, ar.nombre artista, precio, ca.cantidad from album a, artista ar, carrito ca where a.idAlbum=ca.idAlbum and a.idArtista=ar.idArtista and idUsuario=$id;");
      $contador=1;
      echo "<div class='contenedor'>";
    echo "<table class='table table-striped table-hover'>";
    echo "<tr><th>Imagen</th><th>Articulo</th><th>Artista</th><th>Album</th><th>Cantidad</th><th>Precio</th></tr>";
  
  while($row = mysqli_fetch_array($result)) {
    echo "<form action='carrito.php' method='post'>";
      echo "<tr>";
      echo "<td><img src='" . $row['imagen'] . "' width='100px'></td>";
      echo "<td>" . $contador++ . "</td>";
      echo "<td>" . $row['artista'] . "</td>";
      echo "<td>" . $row['album'] . "</td>";
      echo "<td><input type='text' size='5' value=' " . $row['cantidad'] . "'></td>";
      echo "<td> $" . $row['precio'] . " MX </td>";
      echo "<tr>";
      echo "</form>";
     
  }
  echo "</table>";
  echo "</div>";
    
  echo "<div class='botoncito'>";
  echo "<a href='carrito.php' onclick='funcion()' class='btn btn-danger'>Vaciar Carrito</a>";
  echo "</div>";
  echo "<br>";
}
}

//Pagina sin Iniciar Sesion

else{
    echo "<br>";
    echo  "<div class='alert alert-danger'>";
   echo "<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>";
    echo "<strong>";
    echo "Es Necesario Iniciar Sesión";
    echo "</strong>";
  echo "</div>";
  echo "<br>";
  echo "<div class='boton'>";
  echo "<a href='sesion.php'>";
  echo "<button type='button' class='btn btn-success'>Iniciar Sesion</button>";
  echo "</a>";
  echo "</div>";
  echo "<br>";
}
        ?>

<!-- Acaba PHP -->

    <!-- Footer -->
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