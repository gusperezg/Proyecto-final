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
    <title>Contacto</title>

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
            <li class="nav-item active">
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


    <!--Parallax Effect -->
<style>
.parallax { 
    /* The image used */
    background-image: url("imagenes/luis.jpg");

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
.boton{
    padding-left:32%;
}

.btn-success{
    padding-left:50%;
    padding-right:45%;
}

</style>

<div class="parallax">
<div class="text-center">
    <h1>
    Contacto
    </h1>
</div>

    </div>

<br><br>
<div class="container">
<div class="row">

<div class="col-lg-3">
<div class="jumbotron">
  <h2>Contactanos</h2><br>
  <form action="#" method="post">

    <div class="form-group">
      <label for="Email">Email:</label>
      <input type="email" class="form-control" id="email" placeholder="Ingrese Correo" name="mail">
    </div>
    <div class="form-group">
      <label for="pwd">Comentario</label>
      <textarea class="form-control" id="comentario" name="comentario">
      Comentarios </textarea>
    </div>
    <br>
    <div class="boton">
    <button type="submit" class="btn btn-default">Enviar</button>
    <br><br>
</div>
</div>
  </form>

  <?php
error_reporting(0);
$mail=$_POST['mail'];

if($mail!=null){
  echo  "<div class='alert alert-success'>";
  echo "<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>";
  echo "<strong>";
  echo "Success!  ";
  echo "</strong>";
  echo "Se Enviaron Tus Comentarios.";
echo "</div>";
}

?>

</div>



<div class="col-lg-9">

  <h2>Ubicación</h2><br>
  
  <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d3763.2543709138317!2d-99.2659243855262!3d19.401412386902056!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1ses-419!2smx!4v1525751834979" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>


    </div>

</div>
</div>
<br><br>

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