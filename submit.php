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
       
                if ($resultado = $mysqli->query("SELECT * FROM users WHERE usuario='".$un."'")) {
                    printf("La selección devolvió %d filas.\n", $resultado->num_rows);
                    
                    /* liberar el conjunto de resultados */
                    $resultado->close();
                }
            }
    
  
    
    $bdd = new PDO(
        "mysql:host=" . getenv("MYSQL_ADDON_HOST") . ";dbname=" . getenv("MYSQL_ADDON_DB"),
        getenv("MYSQL_ADDON_USER"),
        getenv("MYSQL_ADDON_PASSWORD")
    );
    if ( isset($bdd) ) {
        $sql="SELECT * FROM users WHERE usuario=".$un;//."' AND clave = '".$pwd."'";
        echo $sql;
        $stmt = $bdd->query($sql);
        /*$stmt->bindValue(':un', 'Joe');
        $stmt->bindValue(':pwd', 'Joe');*/

        
        $result = $stmt->fetch();
        //echo count($result) ;
        if (count($result) == 1){
            echo "Logueado";
            session_status();
            $_SESSION["conectado"]="C";
            //header('Location: https://sql-injection-insecure.cleverapps.io/ ');
        }else{
           // header('Location: https://sql-injection-insecure.cleverapps.io/ ');
        }
       
    
    }else{
        die("Connection failed: " . $conn->connect_error);
        header('Location: https://sql-injection-insecure.cleverapps.io/ ');
    }
}catch(Exception $e){
   // echo $e->getMessage();
}


// Check connection


?>
