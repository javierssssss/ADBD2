<?php
try{
    session_start();
    $un = $_GET['usuario'];
    $pwd = $_GET['clave'];

   /* if(empty($un) || empty($pwd)){
        echo"<script>alert('Debe Llenar los campos vacios');window.location.href='index.php';</script>";
        die();
    }*/
    
    $mysqli =mysqli_connect(getenv("MYSQL_ADDON_HOST"),getenv("MYSQL_ADDON_USER"), getenv("MYSQL_ADDON_PASSWORD"),getenv("MYSQL_ADDON_DB"));
    if (mysqli_connect_errno())
          {
          echo "Failed to connect to MySQL: " . mysqli_connect_error();
          }else{
              
        /* Consultas de selección que devuelven un conjunto de resultados */
                    $sql2="SELECT * FROM users WHERE usuario='".$un."' AND CLAVE = '".$pwd."'";
                    echo $sql2;
                if ($resultado = $mysqli->query($sql2)) {
                   // printf("La selección devolvió %d filas.\n   ", $resultado->num_rows);
                    //printf($resultado);
                    while ($row = $resultado->fetch_assoc()) {
                    
                      echo "<h1> Bienvenido ! </h1> ";
                        echo $row['usuario']."<br>";
                         echo $row['id']."<br>";
                        echo $row['clave']."<br>";
                    }
                     printf("La CONSULTA devolvió %d filas.\n   ", mysqli_num_rows($resultado));
                    /* liberar el conjunto de resultados */
                   // $resultado->close();
                }
            }
 
}catch(Exception $e){
    echo $e->getMessage();
}


// Check connection


?>
