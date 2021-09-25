<?php include 'template/header.php' ?>

<?php
    include_once "model/conexion.php";
    $sentencia = $bd -> query("select * from persona");
    $persona = $sentencia -> fetchAll(PDO::FETCH_OBJ);
    //print_r ($persona);

?>

<div class="container mt-5">
    <dive class="row justify-content-center">
        <div class="col-md-7">
            <!-- Inicia Alerta -->
            <?php 
                if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'falta' ) {
            ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Error!</strong> Rellena todos los campos.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" arial-label="Close"></button>
                </div>
                <?php 
                }
            ?>

            <?php 
                if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'registrado' ) {
            ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>registrado!</strong> Se han agregado los datos.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" arial-label="Close"></button>
                </div>
                <?php 
                }
            ?>

            <?php 
                if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'error' ) {
            ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Error!</strong> Vuelve a intentar.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" arial-label="Close"></button>
                </div>
                <?php 
                }
            ?>

            <?php 
                if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'editado' ) {
            ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Editado!</strong> Los datos fueron actualizados.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" arial-label="Close"></button>
                </div>
                <?php 
                }
            ?>

            <?php 
                if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'eliminado' ) {
            ?>
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>Eliminado!</strong> Los datos fueron eliminados.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" arial-label="Close"></button>
                </div>
                <?php 
                }
            ?>
            <!-- Termina Alerta -->

            <div class="card">
                <div class="card-header">
                    USUARIOS
                </div>
                <div class="p-4">
                    <table class="table aling-middle">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Edad</th>
                                <th scope="col">Signo</th>
                                <th scope="col" colspan="2">Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                foreach($persona as $dato){

                            ?>

                            <tr>
                                <td scope="row"><?php echo $dato->codigo; ?></td>
                                <td><?php echo $dato->nombre; ?></td>
                                <td><?php echo $dato->edad; ?></td>
                                <td><?php echo $dato->signo; ?></td>
                                <td><a class="text-success" href="editar.php?codigo=<?php echo $dato->codigo; ?>"><i class="bi bi-pencil-square"></i></a></td>
                                
                                <td><a onclick="return confirm('Estas seguro de eliminar?')" class="text-danger" href="eliminar.php?codigo=<?php echo $dato->codigo; ?>"><i class="bi bi-trash"></i></a></td>

                                
                            </tr>

                            <?php
                                }
                            ?>

                        </tbody>
                    </table>
                    
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Ingresar datos:
                </div>
                <form class="p-4" method="POST" action="registrar.php">
                    <div class="mb-3">
                        <label class="form-label">Nombre:</label>
                        <input type="text" class="form-control" name="txtNombre" autofocus required></imput>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Edad:</label>
                        <input type="number" class="form-control" name="txtEdad" autofocus required></imput>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Signo:</label>
                        <input type="text" class="form-control" name="txtSigno" autofocus required></imput>
                    </div>
                    <div class="d-grid">
                        <input type="hidden" name="oculto"  value="1">
                        <input type="submit" class="btn btn-primary" value="registrar">
                    </div>
                </form>
            </div>
        </div>
    </dive>
</div>

<?php include 'template/footer.php' ?>

