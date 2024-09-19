<?php
    require_once 'conexao.php';
    if(isset($_POST['cadastrar'])){
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);
        try{
            $query = "INSERT INTO usuarios(nome, email, senha) VALUE (:nome, :email, :senha)";
            $stmt = $pdo->prepare($query);
            $stmt->bindParam(':nome',$nome);
            $stmt->bindParam(':email',$senha);
            $stmt->bindParam(':senha',$senha);
            if($stmt->execute()){
                echo"Usuário cadastrado com sucesso!";
            } else {
                echo"Erro ao cadastrar usuário";
            }
        } catch (PDOException $e){
            echo"Erro: " . $e->getMessage();
        }
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Cadastro de usuario</title>
    </head>
    <body>
        <h1>Cadastro de novo usuário</h1>
        <form action="cadastro.php" method="post">
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" requerid><br><br>
            <label for="email">E-mail:</label>
            <input type="email" id="email" name="email" requerid><br><br>
            <label for="senha">Senha:</label>
            <input type="password" id="senha" name="senha" requerid><br><br>
            <input type="Submit" name="cadastrar" value="Cadastrar">
            <button type="reset" class="btn-limpar">Cadastrar</button>
            <button type="button" class="btn-voltar" onclick="window.lacation.href='index.html'">Voltar</button>
        </form>
    </body>
</html>