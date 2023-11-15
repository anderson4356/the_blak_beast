<!-- Instrucciones de uso  https://sweetalert.js.org/guides/#installation -->
<script src="../js/sweetalert.js"></script>

<?php
//incluimos la conexion a la base de datos 
include("../Conexion/conexion.php");


//Recibimos las variables enviadas
$id_categoria = (isset($_POST['id_categoria'])) ? $_POST['id_categoria'] : "";
$nom_categoria = (isset($_POST['nom_categoria'])) ? $_POST['nom_categoria'] : "";
$des_categoria = (isset($_POST['des_categoria'])) ? $_POST['des_categoria'] : "";
$abrev_categoria = (isset($_POST['abrev_categoria'])) ? $_POST['abrev_categoria'] : "";
$est_categoria = (isset($_POST['est_categoria'])) ? $_POST['est_categoria'] : "";



$accion = (isset($_POST['accion'])) ? $_POST['accion'] : "";


switch ($accion) {
    case 'btnAgregar':

                /* la variable sentencia recolecta la informacion del formulario y 
                la envia a la base de datos.
                La variable conn nos brinda la conexion a la base de datos.
                ->prepare nos prepara la sentencia SQL para que inyecte los valores a la BD.
                */

                $insercionClientes = $conn->prepare(
                "INSERT INTO categoria (id_categoria, nom_categoria, des_categoria, abrev_categoria,est_categoria) 
                VALUES ('$id_categoria','$nom_categoria','$des_categoria','$abrev_categoria','$est_categoria')"
             );



        $insercionClientes->execute();
        $conn->close();

        header('location: index.php');



        break;

    case 'btnModificar':

        $editarClientes = $conn->prepare(" UPDATE categoria SET nom_categoria = '$nom_categoria' , 
        des_categoria = '$des_categoria', abrev_categoria = '$abrev_categoria', est_categoria = '$est_categoria'
        WHERE id_categoria = '$id_categoria' ");



        $editarClientes->execute();
        
        $conn->close();

        header('location: index.php');

        break;

    case 'btnEliminar':
        

        $eliminarCliente = $conn->prepare(" DELETE FROM categoria
        WHERE id_categoria = '$id_categoria' ");

        // $consultaFoto->execute();
        $eliminarCliente->execute();
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
$consultacategoria = $conn->prepare("SELECT * FROM categoria");
$consultacategoria->execute();
$listaCategoria = $consultacategoria->get_result();
$conn->close();
