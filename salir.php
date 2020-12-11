<?php
$salir = $_POST['salir'];
if(!empty($salir)){
    session_start();
    session_destroy();
    header('Location: https://sql-injection.cleverapps.io ');
}

header('Location: https://sql-injection.cleverapps.io ');
?>