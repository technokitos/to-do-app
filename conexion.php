<?php
        # PUEDE SER LOCALHOST O 127.0 .....
        $server = '127.0.0.1';
        $username = 'root';
        $password = "";
        $database = 'prueba_tecnica';
        
        $conn = mysqli_connect($server, $username, $password,$database);
        
        if (!$conn) {
              // MUESTRA EL ERROR 
            echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
            echo "error de depuración: " . mysqli_connect_errno() . PHP_EOL;
            echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
             
            exit();
        }
        
       

        
       
?>