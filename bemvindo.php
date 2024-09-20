<?php

    session_start();
        if (!isset ($_SESSION['usuario'])) {
            header("Location: login2.php");
            exit();
        }

?>
<!DOCTYPE html>
<html>
    <head>
    </head>
    <body>
        <h1>Bem Vindo, <?php echo $_SESSION['usuario'];?>!<h1>
        <p><a href="logout2.php">Click aqui para sair</a></p>    
    </body>
</html>