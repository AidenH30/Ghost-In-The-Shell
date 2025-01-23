<?php
require_once '../helpers/helpers_database.php';
require_once '../helpers/helpers_autenticacao.php';
require_once '../helpers/helpers.php'; 
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../../public/css/style.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Criar Conta</title>
</head>
<body>

<form class="container mt-4 p-4 border rounded shadow bg-light" method="post">
        <h2>Registre-se</h2> 
        <br> 
        <hr> 
        <div class="mb-3">
        <label for="username" class="form-label">Nome de usuário:</label>
        <input type="text" class="form-control" name="username" placeholder="Digite o nome de usuário...">
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Senha:</label>
            <input type="password" class="form-control" name="password" placeholder="Digite a senha..." required>
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Criar conta</button>
</form>


<div class="my-div-centralizada">
    <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            registrar($username, $password);
        }
    ?>
</div>


</body>
</html>