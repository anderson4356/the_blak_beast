<?php include 'codeProducto.php'; ?>

<?php include("../paginas/head.php") ?>

<div class="container">
    <div class="row">




        <form action="" method="post">



            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">

                        <!-- cabecera del modal -->
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Datos del producto</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <!-- Cuerpo del modal -->
                        <div class="modal-body">

                            <div class="form-row">

                            <div class="form-group col-md-12">
                                    <label for="txtCorreo">Numero del Producto</label>
                                    <input type="text" class="form-control" require name="id_producto" id="id_producto" placeholder="" value="<?php echo $id_producto ?>">
                                    
                                </div>

                                
                                <div class="form-group col-md-12">
                                    <label for="txtApellidoP">Nombre del Producto</label>
                                    <input type="text" class="form-control" require name="nombre_producto" id="precio" placeholder="" value="<?php echo $nombre_producto ?>">

                                </div>

                                <div class="form-group col-md-12">
                                    <label for="txtApellidoP">Color</label>
                                    <input type="text" class="form-control" require name="color" id="color" placeholder="" value="<?php echo $color ?>">

                                </div>
                              
                                <div class="form-group col-md-12">
                                    <label for="txtApellidoP">Tallas</label>
                                    <input type="text" class="form-control" require name="tallas" id="tallas" placeholder="" value="<?php echo $tallas ?>">

                                </div>

                                <div class="form-group col-md-12">
                                    <label for="txtApellidoP">Diseñador</label>
                                    <input type="text" class="form-control" require name="diseñador" id="diseñador" placeholder="" value="<?php echo $diseñador ?>">

                                </div>

                                <div class="form-group col-md-12">
                                    <label for="txtApellidoP">Marca</label>
                                    <input type="text" class="form-control" require name="marca" id="marca" placeholder="" value="<?php echo $marca ?>">

                                </div>
                              
                                <div class="form-group col-md-12">
                                    <label for="txtApellidoP">Numero de la categoría</label>
                                    <input type="text" class="form-control" require name="id_categoria" id="id_categoria" placeholder="" value="<?php echo $id_categoria ?>">

                                </div>



                            </div>
                        </div>

                        <!-- Pie/Footer del modal -->
                        <div class="modal-footer">

                            <button value="btnAgregar" class="btn btn-success" type="submit" name="accion">Agregar</button>
                            <button value="btnModificar" class="btn btn-warning" type="submit" name="accion">Modificar</button>
                            <button value="btnEliminar" class="btn btn-danger" type="submit" name="accion">Eliminar</button>
                            <button value="btnCancelar" class="btn btn-primary" type="submit" name="accion">Cancelar</button>

                        </div>

                    </div>
                </div>
            </div>

            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Agregar Producto
            </button>





        </form>
        <!-- Final del Formulario -->


        <div class="row">


            <table class="table table-hover table-bordered">

                <thead class="thead-dark">

                    <tr>

                        <th scope="col">Numero del Producto</th>
                        <th scope="col">Nombre del Producto</th>
                        <th scope="col">Color</th>
                        <th scope="col">Tallas</th>
                        <th scope="col">Diseñador</th>
                        <th scope="col">Marca</th>
                        <th scope="col">Numero de la categoría</th>

                        <th scope="col">Seleccionar</th>
                        <th scope="col">Eliminar</th>
                    </tr>

                </thead>
                <tbody>

                    <?php
                    /* Prefunto que si la variable listaClientes tiene algun contenido */
                    if ($listaProducto->num_rows > 0) {

                        foreach ($listaProducto as $producto) {

                    ?>

                            <tr>


                                <td> <?php echo $producto['id_producto']    ?> </td>
                                <td> <?php echo $producto['nombre_producto']   ?> </td>
                                <td> <?php echo $producto['color']?> </td>
                                <td> <?php echo $producto['tallas']?> </td>
                                <td> <?php echo $producto['diseñador'] ?> </td>
                                <td> <?php echo $producto['marca']?> </td>
                                <td> <?php echo $producto['id_categoria']?> </td>


                                <!-- Este Formulario se utiliza para editar los registros -->
                                <form action="" method="post">

                                  <input type="hidden" name="id_producto" value="<?php echo $producto['id_producto'];  ?>">
                                  <input type="hidden" name="nombre_producto" value="<?php echo $producto['nombre_producto'];  ?>">
                                    <input type="hidden" name="color" value="<?php echo $producto['color'];  ?>">
                                    <input type="hidden" name="tallas" value="<?php echo $producto['tallas'];  ?>">
                                    <input type="hidden" name="diseñador" value="<?php echo $producto['diseñador'];  ?>">
                                    <input type="hidden" name="marca" value="<?php echo $producto['marca'];  ?>">
                                    <input type="hidden" name="id_categoria" value="<?php echo $producto['id_categoria'];  ?>">


                                    <td><input type="submit" class="btn btn-info" value="Seleccionar"></td>
                                    <td><button value="btnEliminar" class="btn btn-danger" type="submit" name="accion">Eliminar</button></td>

                                </form>


                            </tr>


                    <?php

                        }
                    } else {

                        echo "<h2> No tenemos resultados </h2>";
                    }

                    ?>


                </tbody>
            </table>

        </div>


    </div>
</div>

<?php include("../paginas/footer.php") ?>