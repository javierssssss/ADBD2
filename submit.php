<?php
try{
    session_start();
    $un = $_POST['usuario'];
    $pwd = $_POST['clave'];

   /* if(empty($un) || empty($pwd)){
        echo"<script>alert('Debe Llenar los campos vacios');window.location.href='index.php';</script>";
        die();
    }*/
    $bdd = new PDO(
        "mysql:host=" . getenv("MYSQL_ADDON_HOST") . ";dbname=" . getenv("MYSQL_ADDON_DB"),
        getenv("MYSQL_ADDON_USER"),
        getenv("MYSQL_ADDON_PASSWORD")
    );
    if ( isset($bdd) ) {
        
        $stmt = $bdd->prepare("SELECT * FROM users WHERE  BINARY  usuario=:un AND BINARY  clave = :pwd");
        /*$stmt->bindValue(':un', 'Joe');
        $stmt->bindValue(':pwd', 'Joe');*/

        $stmt->execute(['un' => $un, 'pwd' => $pwd]); 
        $result = $stmt->fetchAll();
        //echo count($result) ;
        if (count($result) == 1){
            //echo "Logueado";
            session_status();
            $_SESSION["conectado"]="C";
            header('Location: https://sql-injection.cleverapps.io ');
        }else{
            header('Location: https://sql-injection.cleverapps.io ');
        }
       
    
    }else{
        die("Connection failed: " . $conn->connect_error);
        header('Location: https://sql-injection.cleverapps.io ');
    }
}catch(Exception $e){
   // echo $e->getMessage();
}


// Check connection


?>