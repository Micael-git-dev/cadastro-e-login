<?php

    requere_once 'conexao.php'; 
        if (isset($_POST['buscar']))
            $nome = $_POST['nome'];
            try {
                $query = "SELECT * FROM usuarios WHERE nome LIKE :nome";
                $stmt = $pdo->prepare($query);
                $stmt->bindValue(':nome', '%' . $nome . '%');
                $stmt->execute();
                $usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    if  ($usuarios) {
                        echo "<h2>Usuarios encontrados:</h2>";
                        foreach ($usuarios as $usuario) {
                            echo "ID: " . $usuario['id'] . " - Nome: " . $usuario['nome'] . " - Email: " . $usuario['email'] . "<br>";
                        }
                    }   else {
                            echo "Nenhum usuario encontrado.";
                        }
            }   catch (PDOException $e) {
                    echo "Erro:" . $e->getMessage();
                }

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Buscar Usuarios</title>
    </head>
    <body>
        <h1>Buscar Usuarios Cadastrados<h1>
        <form action="buscar.php" method="post">
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" required><br>
            <br>
            <input type="submit" name="buscar" value="Buscar user">
        </form>
    </body>
</html>