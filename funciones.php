<?php

include('conexion.php');

if (isset($_POST['insertar'])) {
    $titulo =  $_POST['titulo'];
    $etiqueta  =  $_POST['etiqueta'];
    $descripcion =  $_POST['descripcion'];

    

    $insertar = "INSERT INTO `tareas`(`id`, `titulo_tarea`, `etiqueta_tarea`, `descripcion_tarea`) VALUES (NULL,'$titulo','$etiqueta','$descripcion')";


    $query = mysqli_query($conn, $insertar); # ; (true|false)

    if ($query) {

    # AQUI VA header('Location: ../index.html'); ESTAS EN PHP
  

        //header('Location: index.php');
        echo json_encode($conn->insert_id);
        die();

    } else {
        # DEBEMOS PASARNOS UN PARAMETRO POR GET EN LA URL PARA SABER QUE NO HA IDO BIEN
        # LOS PARAMETROS GET SE PASAN ASI (GET)
        # url?preimero=valor primero&segundo=valor segundo&tercero=valor tercero....etc
        //header('Location: index.php?error= '.$insertar);
        echo json_encode($insertar);
        die();
        # !IMPORTANTE
    # AHORA EN INDEX DEBES HACER UN IF ISSET $_GET['error'] == 1 (hacer algo para el usuario)
    }
}

if (isset($_POST['eliminar'])) {


    var_dump($_POST);

    $id=$_POST['id'];

   $borrar = "DELETE FROM tareas WHERE id = $id ";

   $query = mysqli_query($conn, $borrar); # ; (true|false)

   if ($query) {

    # AQUI VA header('Location: ../index.html'); ESTAS EN PHP
  

        header('Location: index.php');
    } else {
        # DEBEMOS PASARNOS UN PARAMETRO POR GET EN LA URL PARA SABER QUE NO HA IDO BIEN
        # LOS PARAMETROS GET SE PASAN ASI (GET)
        # url?preimero=valor primero&segundo=valor segundo&tercero=valor tercero....etc
        header('Location: index.php?error= '.$borrar);

        # !IMPORTANTE
    # AHORA EN INDEX DEBES HACER UN IF ISSET $_GET['error'] == 1 (hacer algo para el usuario)
    }



}
if (isset($_POST['finalizar'])) {


    var_dump($_POST);

    $id=$_POST['id'];

   $finalizar = "UPDATE tareas SET finalizada_tarea = 1 WHERE id = $id ";

   $query = mysqli_query($conn, $finalizar); # ; (true|false)

   if ($query) {

    # AQUI VA header('Location: ../index.html'); ESTAS EN PHP
  

        header('Location: index.php');
    } else {
        # DEBEMOS PASARNOS UN PARAMETRO POR GET EN LA URL PARA SABER QUE NO HA IDO BIEN
        # LOS PARAMETROS GET SE PASAN ASI (GET)
        # url?preimero=valor primero&segundo=valor segundo&tercero=valor tercero....etc
        header('Location: index.php?error= '.$finalizar);

        # !IMPORTANTE
    # AHORA EN INDEX DEBES HACER UN IF ISSET $_GET['error'] == 1 (hacer algo para el usuario)
    }



}



?>