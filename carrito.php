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
    <br><br>

    <style>
.parallax { 
    /* The image used */
    background-image: url("imagenes/charli_xc.jpg");

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

      $sql = "SELECT cantidad from album  WHERE idAlbum=$a";
      $resultado=mysqli_query($con,$sql);
      while($row = mysqli_fetch_array($resultado)) {
      if($row['cantidad']<=0){
        echo "<br>";
        echo  "<div class='alert alert-danger'>";
       echo "<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>";
        echo "<strong>";
        echo "Ya no tenemos ese Producto en Existencia";
        echo "</strong>";
      echo "</div>";
      echo "<br>";
      echo '<div class="alert alert-dark" role="alert">
      Pero Tenemos Otros Productos! Checalos ahora!
      </div>';
      echo "<br>";
      echo "<div class='boton'>";
      echo "<a href='index.php'>";
      echo "<button type='button' class='btn btn-success'>Regresar</button>";
      echo "</a>";
      echo "</div>";
      echo "<br>";
      }
      
    

      else{
     $sql="INSERT INTO carrito (idAlbum, idUsuario, cantidad) VALUES ($a, $id, 1);";
    if (!mysqli_query($con,$sql)) {
        die('Error: ' . mysqli_error($con));
      }
    
      header("Location: carrito.php");
      $result = mysqli_query($con,"SELECT imagen, a.nombre album, ar.nombre artista, precio, ca.cantidad, a.idAlbum id from album a, artista ar, carrito ca where a.idAlbum=ca.idAlbum and a.idArtista=ar.idArtista and idUsuario=$id;");
      $contador=1;
      echo "<br>";
      echo "<div class='contenedor'>";

    echo "<table class='table table-striped table-hover table-responsive'>";

    echo "<tr><th>Imagen</th><th>Producto</th><th>Artista</th><th>Album</th><th>Cantidad</th><th>Precio</th><th>Precio</th></tr>";
  
  while($row = mysqli_fetch_array($result)) {
    echo "<form action='carrito.php?id=" . $row['id'] . "' method='post'>";
      echo "<tr>";
      echo "<td><img src='imagenes/" . $row['imagen'] . "' width='100px'></td>";
      echo "<td>" . $contador++ . "</td>";
      echo "<td>" . $row['artista'] . "</td>";
      echo "<th> " . $row['album'] . "</th>";
      echo "<td><input type='text' size='5' value=' " . $row['cantidad'] . "'></td>";
      echo "<td width='150px'> $" . $row['precio'] . " MX </td>";
      echo "<td> <button type='submit' class='btn btn-success'>Actualizar</button></td>";
      echo "<tr>";
      
      echo "</form>";

      $total+=($row['cantidad'] * $row['precio']);
  }
  
  echo "<tr><td></td><td></td><td></td><td></td><td>TOTAL</td><td> $" . $total . " MX</td>";
  echo "<td>";
  echo "<a href='compraCompleta.php?total='" . $total . "''>";
  echo "<button class='btn btn-danger'>&nbsp;&nbsp;  Pagar  &nbsp; &nbsp;</button>";
  echo "</a>";
  echo "</td>";
  echo "</tr>";
  echo "</table>";
  echo "</div>";
    

  echo "<br>";

  
}
    }
  }
//Entra al carrito sin agregar productos a este

else{

    $result = mysqli_query($con,"SELECT imagen, a.nombre album, ar.nombre artista, precio, ca.cantidad, a.idAlbum id from album a, artista ar, carrito ca where a.idAlbum=ca.idAlbum and a.idArtista=ar.idArtista and idUsuario=$id;");  
    $contador=1;
      echo "<br>";
      echo "<div class='contenedor'>";
      echo "<p>" . '*Para Eliminar Poner la Cantidad en CERO' . "</p>";
      echo "<br>";
    echo "<table class='table table-striped table-hover table-responsive'>";
    echo "<tr><th>Imagen</th><th>Articulo</th><th>Artista</th><th>Album</th><th>Cantidad</th><th>Precio</th><th>Actualizar</th></tr>";
  
    $total="0";

  while($row = mysqli_fetch_array($result)) {
    echo "<form action='carrito.php?id=" . $row['id'] . "' method='post'>";
      echo "<tr>";
      echo "<td><img src='imagenes/" . $row['imagen'] . "' width='100px'></td>";
      echo "<td>" . $contador++ . "</td>";
      echo "<td>" . $row['artista'] . "</td>";
      echo "<td>" . $row['album'] . "</td>";
      echo "<td><input type='text' size='5' name='cantidad' value=' " . $row['cantidad'] . "'></td>";
      echo "<td width='150px'> $" . $row['precio'] . " MX </td>";
      echo "<td> <button type='submit' class='btn btn-success'>Actualizar</button></td>";
      echo "<tr>";
      $total+=($row['cantidad'] * $row['precio']);

      echo "</form>";
     
  }
  echo "<tr><td></td><td></td><td></td><td></td><td>TOTAL</td><td> $" . $total . " MX</td>";
  echo "<td>";
  echo '<a href="compraCompleta.php">';
  echo "<button class='btn btn-danger'>&nbsp;&nbsp;  Pagar  &nbsp; &nbsp;</button>";
  echo "</a>";
  echo "</td>";
  echo "</tr>";
  echo "</table>";
  echo "</div>";
  echo "</table>";
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

<?php
error_reporting(0);
$cantidad=$_POST['cantidad'];
$id=$_GET['id'];
$usuario=$_SESSION["id_usuario"];

  if($cantidad==0){
    $sql="DELETE from carrito where idAlbum='$id' and idUsuario='$usuario';";
   if (!mysqli_query($con,$sql)) {
     die('Error: ' . mysqli_error($con));
    }
    
  }
  else{

    $resultado = mysqli_query($con,"SELECT cantidad from album where idAlbum='$id';");
    $row = mysqli_fetch_array($resultado);
      $cant=$row['cantidad'];
    
    if($cant>=$cantidad){

      $sql="UPDATE carrito SET cantidad='$cantidad' where idAlbum='$id' and idUsuario='$usuario';";
       if (!mysqli_query($con,$sql)) {
         die('Error: ' . mysqli_error($con));
        }
        header("Location: carrito.php");
      }
      else{
        echo  "<div class='alert alert-danger'>";
           echo "<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>";
          echo "<strong>";
          echo "No tenemos tantos productos disponibles";
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