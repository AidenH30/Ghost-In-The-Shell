<?php
require_once '../helpers/helpers_database.php';
require_once '../helpers/helpers_autenticacao.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    if(logar($username, $password) === 1){
        header("Location: ../../public/index.php");
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../../public/css/style.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Entrar</title>
</head>
<body>
    <form class="container mt-4 p-4 border rounded shadow bg-light" method="post">
        <div class="mb-3">
            <label for="username" class="form-label">Nome de usuário:</label>
            <input type="text" name="username" placeholder="Usuário" required>
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Senha:</label>
            <input type="password" name="password" placeholder="Senha" required>
        </div>

        <button type="submit" class="btn btn-primary">Entrar</button>
    </form>
</body>
</html>


