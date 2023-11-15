<?php include 'codeCategoria.php'; ?>

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
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Datos De La Categoría</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <!-- Cuerpo del modal -->
                        <div class="modal-body">

                            <div class="form-row">



                                <div class="form-group col-md-12">
                                    <label for="id_cliente">Numero de la categoría</label>
                                    <input type="text" class="form-control" require name="id_categoria" id="id_categoria" placeholder="" value="<?php echo $id_categoria ?>">
                                    <br>
                                </div>

                                <div class="form-group col-md-12">
                                    <label for="nombre_cliente">Nombre de la categoría</label>
                                    <input type="text" class="form-control" require name="nom_categoria" id="nom_categoria" placeholder="" value="<?php echo $nom_categoria ?>">
                                    <br>
                                </div>


                                <div class="form-group col-md-12">
                                    <label for="apellido_cliente">Descripción de la categoria </label>
                                    <input type="text" class="form-control" require name="des_categoria" id="des_categoria" placeholder="" value="<?php echo $des_categoria ?>">

                                </div>

                                <div class="form-group col-md-12">
                                    <label for="telefono_cliente">Abreviación de la categoria </label>
                                    <input type="tel" class="form-control" require name="abrev_categoria" id="abrev_categoria" placeholder="" value="<?php echo $abrev_categoria ?>">

                                </div>

                                <div class="form-group col-md-12">
                                    <label for="direccion_cliente">Estilo de la categoria</label>
                                    <input type="text" class="form-control" require name="est_categoria" id="est_categoria" placeholder="" value="<?php echo $est_categoria ?>">
                                    <br>
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
                Agregar Categoría
            </button>





        </form>
        <!-- Final del Formulario -->


        <div class="row">


            <table class="table table-hover table-bordered">

                <thead class="thead-dark">

                    <tr>

                        <th scope="col">Numero de la categoria</th>
                        <th scope="col">Nombre de la categoría</th>
                        <th scope="col">Nombre de la categoría</th>
                        <th scope="col">Abreviación de la categoria</th>
                        <th scope="col">Estilo de la categoria</th>

                        <th scope="col">Seleccionar</th>
                        <th scope="col">Eliminar</th>
                    </tr>

                </thead>
                <tbody>

                    <?php
                    /* Prefunto que si la variable listaClientes tiene algun contenido */
                    if ($listaCategoria->num_rows > 0) {

                        foreach ($listaCategoria as $categoria) {

                    ?>

                            <tr>



                                <td> <?php echo $categoria['id_categoria']        ?> </td>
                                <td> <?php echo $categoria['nom_categoria']    ?> </td>
                                <td> <?php echo $categoria['des_categoria'] ?> </td>
                                <td> <?php echo $categoria['abrev_categoria'] ?> </td>
                                <td> <?php echo $categoria['est_categoria']    ?> </td>


                                <!-- Este Formulario se utiliza para editar los registros -->
                                <form action="" method="post">

                                    <input type="hidden" name="id_categoria" value="<?php echo $categoria['id_categoria'];  ?>">
                                    <input type="hidden" name="nom_categoria" value="<?php echo $categoria['nom_categoria'];  ?>">
                                    <input type="hidden" name="des_categoria" value="<?php echo $categoria['des_categoria'];  ?>">
                                    <input type="hidden" name="abrev_categoria" value="<?php echo $categoria['abrev_categoria'];  ?>">
                                    <input type="hidden" name="est_categoria" value="<?php echo $categoria['est_categoria'];  ?>">


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