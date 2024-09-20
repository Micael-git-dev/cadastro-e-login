<?php

    require_once 'conexao.php';
    session_start();
        if (isset($_POST['login'])) {
            $email = $_POST['email'];
            $senha = $_POST['senha'];

            try {
                $quary = "SELECT = FROM usuarios WHERE email = :email";
                $stmt = $pdo->prepare($query);
                $stmt->bindParam(':email', $email);
                $stmt->execute();
                $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

                if ($usuario && password_verify($senha, $usuario['senha'])) {
                    $_SESSION['usuario'] = $usuario['nome'];
                    header ("Location: bemvindo.php");
                    exit();
                } else {
                    echo "Email ou senha incorretos!";
                  }

            } catch (PDOException $e) {
                echo "Erro: " . $e->getMessage();
            }
        }

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Login</title>
    </head>
    <body>
        <h1>LOGIN DE USUARIO</h1>
        <form action="login2.php" method="post">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required><br>
            <br>
            <label for="senha">Senha:</label>
            <input type="password" id="senha" name="senha" required><br>
            <br>
            <input type="submit" name="login" value="Entrar">
        </form>
    </body>
</html>