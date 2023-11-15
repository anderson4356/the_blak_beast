<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "the_black-beast";


// Crea la conexion
$conn = new mysqli($servername, $username, $password, $database);

// Conexion fallida
if ($conn->connect_error) {
  die("Conexion con error: " . $conn->connect_error);
}
else {
  //se comenta para que no aparezca en todo lado
   //echo "Conexion ok :)";
}
 
