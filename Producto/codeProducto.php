<!-- Instrucciones de uso  https://sweetalert.js.org/guides/#installation -->
<script src="../js/sweetalert.js"></script>

<?php
//incluimos la conexion a la base de datos 
include("../Conexion/conexion.php");


//Recibimos las variables enviadas
$id_producto = (isset($_POST['id_producto'])) ? $_POST['id_producto'] : "";
$nombre_producto = (isset($_POST['nombre_producto'])) ? $_POST['nombre_producto'] : "";
$color = (isset($_POST['color'])) ? $_POST['color'] : "";
$tallas = (isset($_POST['tallas'])) ? $_POST['tallas'] : "";
$diseñador = (isset($_POST['diseñador'])) ? $_POST['diseñador'] : "";
$marca = (isset($_POST['marca'])) ? $_POST['marca'] : "";
$id_categoria = (isset($_POST['id_categoria'])) ? $_POST['id_categoria'] : "";



$accion = (isset($_POST['accion'])) ? $_POST['accion'] : "";


switch ($accion) {
    case 'btnAgregar':

                /* la variable sentencia recolecta la informacion del formulario y 
                la envia a la base de datos.
                La variable conn nos brinda la conexion a la base de datos.
                ->prepare nos prepara la sentencia SQL para que inyecte los valores a la BD.
                */

                $insercionproducto = $conn->prepare(
                "INSERT INTO producto (id_producto,nombre_producto,color, tallas, diseñador, marca,id_categoria) 
                VALUES ('$id_producto', '$nombre_producto','$color','$tallas','$diseñador','$marca','$id_categoria')"
             );



        $insercionproducto->execute();
        $conn->close();

        header('location: index.php');



        break;

    case 'btnModificar':

        $editarproducto = $conn->prepare(" UPDATE producto SET nombre_producto = '$nombre_producto, 'color = '$color' , 
        tallas = '$tallas', diseñador = '$diseñador', marca = '$marca', id_categoria = '$id_categoria'
        WHERE id_producto = '$id_producto' ");



        $editarproducto->execute();
        
        $conn->close();

        header('location: index.php');

        break;

    case 'btnEliminar':
        

        $eliminarproducto = $conn->prepare(" DELETE FROM producto
        WHERE id_producto = '$id_producto' ");

        // $consultaFoto->execute();
        $eliminarproducto->execute();
        $conn->close();

        header('location: index.php');

        break;

    case 'btnCancelar':
        header('location: index.php');
        break;

    default:
        # code...
        break;
}



/* Consultamos todos los Clientes  */
$consultaproducto = $conn->prepare("SELECT * FROM producto");
$consultaproducto->execute();
$listaProducto = $consultaproducto->get_result();

$consultacategoria = $conn->prepare("SELECT * FROM categoria");
$consultacategoria->execute();
$listaCategoria = $consultacategoria->get_result();

$conn->close();


?>