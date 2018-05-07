<!DOCTYPE html>
<html lang="es">
  <?php
  // Crear una conexión
  $con = mysqli_connect("localhost","root","","rythm");

  // Check connection
  if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
?>
   
  <head>
        Datos
  </head>

<body>
    <?php
$nom=$_POST['mail'];
$contra=$_POST['contrasena'];
/*
$nombre=$_POST['nombre'];
$mail=$_POST['email'];
$contraseña=$_POST['pwd'];
$fecha=$_POST['date'];
$tarjeta=$_POST['tarjeta'];
$direccion=$_POST['direccion'];
*/
//echo "nombre " . $nombre . "email " . $mail . "Contraseña " . $contraseña . "Fecha " . $fecha . "tarjeta " . $tarjeta . "Direccion " .$direccion;

echo "nombre" . $nom . "contraseña" . $contra;
?>
</body>
<?php
mysqli_close($con);
?>

</html>