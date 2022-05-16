<?php

session_start();

require 'conexion.php';

if(isset($_GET['error'])) {
    var_dump('HAY ERROR AL CREAR ACTIVIDAD SEGURO QUE ES LA QUERY' . $_GET['error']);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pueba Técnica</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="style.css">
    
</head>

<body>
    <header>
        <div class="row p-0 m-0">
            <div class="col-2 logo">
            <img src="assets/img/logo.png" alt="">
            </div>
            <div class="col-10">
               <h1>Aplicación para gestion de proyectos</h1>
            </div>
        </div>
    </header>

    <section class="vh-100" style="background-color: #eee;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col col-lg-12 col-xl-12">
                    <div class="card rounded-3">
                        <div class="card-body p-4">
                            <div class="row">
                                <div class="col-lg-6">
                                <h4 class="text-center my-3 pb-2">To-Do App</h4>
                                <!-- <form method="POST" action="funciones.php"class="row row-cols-lg-auto g-3 justify-content-center align-items-center mb-4 pb-2"> -->
                                <div class="col-12">
                                    <div class="form-outline">
                                        <label class="form-label" for="form1">Introduce una tarea</label>
                                        <input type="text" id="form1" class="form-control" name="titulo"/>
                                    </div>
                                    <div class="form-outline">
                                        <label class="form-label" for="form2">Introduce una etiqueta</label>
                                        <input type="text" id="form2" class="form-control" name="etiqueta"/>
                                    </div>
                                    <div class="form-outline">
                                        <label class="form-label" for="form3">Descripcion</label>
                                        <input type="textarea" rows="4" id="form3" class="form-control" name="descripcion"/>
                                    </div>
                                </div>

                                <div class="col-12 mt-2" >
                                    <button name="insertar" type="submit" class="btn btn-primary">Guardar</button>
                                </div>
                            <!-- </form> -->

                                </div>
                                <div class="col-lg-6" style="overflow:auto; height:60vh">

                                <?php 
                                // hacemos una consulta a la base  de datos 
                                $query_acti = "SELECT * FROM tareas WHERE finalizada_tarea = 0;" ;
                                //creamos una variable que sea una query para que haga la consulta a la BD
                                $acti = $conn->query(  $query_acti  );

                                     //hacemos un while y creamos la variable $a que se recorrera la base de datos 
                                ?>     
                                    <h4 class="text-center my-3 pb-2">Tareas</h4>
                                <table id="tareas_pendientes" class="table mb-4">
                                    <thead>
                                        <tr>
                                            <th scope="col">Título</th>
                                            <th scope="col">Etiqueta</th>
                                            <th scope="col">Descripcion</th>
                                            <th scope="col">Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                   <?php while ($a = $acti->fetch_array() ) : ?>
                                    <tr>
                                        <td><?php echo $a['titulo_tarea'];?></td>
                                        <td><?php echo $a['etiqueta_tarea'];?></td>
                                        <td><?php echo $a['descripcion_tarea'];?></td>
                                        <td>
                                        <form method="POST" action="funciones.php" style="display: flex;">
                                            <button name="eliminar" type="submit" class="btn btn-danger">Borrar</button>
                                            <button name="finalizar"type="submit" class="btn btn-success ms-1">Finalizar</button>
                                            <input type="hidden" name="id" value="<?php echo $a['id'];?>">
                                        </form>
                                        </td>
                                    </tr>
                                    <?php endwhile; ?> 
                                </tbody>
                            </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="container">
    <div class="card mt-2">


    <div class="col-lg-12" style="overflow:auto; height:60vh">

<?php 
// hacemos una consulta a la base  de datos 
$query_acti = "SELECT * FROM tareas WHERE finalizada_tarea = 1;" ;
//creamos una variable que sea una query para que haga la consulta a la BD
$acti = $conn->query(  $query_acti  );

     //hacemos un while y creamos la variable $a que se recorrera la base de datos 
?>     
    <h4 class="text-center my-3 pb-2">Tareas Realizadas</h4>
<table class="table mb-4">
    <thead>
        <tr>
            <th scope="col">Título</th>
            <th scope="col">Etiqueta</th>
            <th scope="col">Descripcion</th>
            
        </tr>
    </thead>
    <tbody>
   <?php while ($a = $acti->fetch_array() ) : ?>
    <tr>
        <td><?php echo $a['titulo_tarea'];?></td>
        <td><?php echo $a['etiqueta_tarea'];?></td>
        <td><?php echo $a['descripcion_tarea'];?></td>
    </tr>
    <?php endwhile; ?> 
</tbody>
</table>
</div>
</div>
</div>

    <footer>
        <div>
            <h4>Todos Los derechos reservados</h4>
        </div>
    </footer>
    <script>
     const urlAjax= 'funciones.php';
    </script>
    <script src="js/main.js"></script>


</body>

</html>