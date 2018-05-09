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
    <title>Iniciar Sesion</title>

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
            <li class="nav-item active">
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
    background-image: url("imagenes/sig.jpg");

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
.botoncito:hover{
  background-color:#1550A7;
}
.botoncito{
  background-color:#1A4687;
  color:white;
}

</style>

<div class="parallax">
<div class="text-center">
    <h1>
    Iniciar Sesión
    </h1>
</div>

    </div>

<br><br>
<div class="container">
<div class="row">

<div class="col-lg-3">
<div class="jumbotron">
  <h2>Iniciar Sesión</h2><br>
  <form action="sesion.php" method="post">

    <div class="form-group">
      <label for="Email">Email:</label>
      <input type="email" class="form-control" id="email" placeholder="Ingrese Correo" name="mail">
    </div>
    <div class="form-group">
      <label for="pwd">Contraseña:</label>
      <input type="password" class="form-control" id="pwd" placeholder="Ingrese Contraseña" name="contrasena">
    </div>
    <br>
    <div class="boton">
    <button type="submit" class="btn botoncito">Enviar</button>
    <br><br>
</div>
</div>
  </form>

  <?php
  error_reporting(0);
$correo = $_POST['mail'];
$pwd = $_POST['contrasena'];
if($correo!=null){

    $sql = "SELECT idUsuarios, nombre FROM usuarios WHERE correo = '$correo' AND contra = '$pwd'";
	$resultado=mysqli_query($con,$sql); 
    $numregistros=mysqli_num_rows($resultado); 
    $row = mysqli_fetch_array($resultado);
    if($numregistros>0){
        //alerta de Bienvenida
        echo  "<div class='alert alert-success'>";
   echo "<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>";
    echo "<strong>";
    echo "Bienvenido  ";
    echo "</strong>";
  echo "</div>";
  header("Refresh: 2; URL=index.php");
        //inicia la sesion
        $_SESSION["id_usuario"] = $row['idUsuarios'];
        $_SESSION["nombre"] = $row['nombre'];
    }
    else{
        //alerta de Datos Incorrectos
        echo  "<div class='alert alert-danger'>";
   echo "<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>";
    echo "<strong>";
    echo "Datos Incorrectos";
    echo "</strong>";
  echo "</div>";
        }
}


?>
</div>



<div class="col-lg-9">

  <h2>Registrate</h2><br>
  <form action="sesion.php" method="post">
  <div class="form-group">
      <label for="nombre">Nombre:</label>
      <input type="text" class="form-control" id="nombre" placeholder="Ingrese Nombre" name="nombre">
    </div>
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" placeholder="Ingrese Correo" name="email">
    </div>
    <div class="form-group">
      <label for="pwd">Contraseña:</label>
      <input type="password" class="form-control" id="pwd" placeholder="Ingrese Contraseña" name="pwd">
    </div>
    <div class="form-group">
      <label for="date">Fecha de Nacimiento:</label>
      <input type="date" class="form-control" id="date" name="date">
    </div>
    <div class="form-group">
      <label for="number">Tarjeta de Credito:</label>
      <input type="number" class="form-control" id="number" placeholder="16 Digitos" name="tarjeta">
    </div>
    <div class="form-group">
      <label for="direccion">Dirección:</label>
      <input type="text" class="form-control" id="direccion" placeholder="Dirección" name="direccion">
    </div>
    <br>
    <div class="boton2">
    <button type="submit" class="btn btn-success">Enviar</button>
</div>
  </form>


    </div>

</div>
</div>
<br><br>
<?php
error_reporting(0);
$nombre=$_POST['nombre'];
$mail=$_POST['email'];
$contras=$_POST['pwd'];
$fecha=$_POST['date'];
$tarjeta=$_POST['tarjeta'];
$direccion=$_POST['direccion'];
if($nombre!=null){

  $sql = "SELECT nombre FROM usuarios WHERE correo = '$mail'";
	$resultado=mysqli_query($con,$sql); 
    $numregistros=mysqli_num_rows($resultado); 
    $row = mysqli_fetch_array($resultado);
    if($numregistros>0){
      echo  "<div class='alert alert-danger'>";
      echo "<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>";
       echo "<strong>";
       echo "Usuario ya existente";
       echo "</strong>";
     echo "</div>";
    }
  else{


  $sql="INSERT INTO usuarios (nombre, correo, contra, nacimiento, tarjeta, direccion)
      VALUES ('$nombre', '$mail', '$contras', '$fecha', $tarjeta, '$direccion');";

    if (!mysqli_query($con,$sql)) {
      die('Error: ' . mysqli_error($con));
    }
    echo  "<div class='alert alert-success'>";
   echo "<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>";
    echo "<strong>";
    echo "Success!  ";
    echo "</strong>";
    echo "Se ingresaron los Datos.";
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