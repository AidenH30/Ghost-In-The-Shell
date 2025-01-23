<?php
include_once '../app/helpers/helpers_database.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: ../app/controllers/login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/style.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Lista de Casos</title>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light shadow">
        <div class="container">
            <!-- Logo -->
            <a class="navbar-brand" href="index.php">
                <img src="images/logo.png" alt="Logo" class="d-inline-block align-text-top">
            </a>

            <!-- Botão Responsivo -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Conteúdo da Navbar -->
            <div class="collapse navbar-collapse" id="navbarContent">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="btn btn-danger px-4" href="../app/controllers/logout.php">Sair</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

<div class="container mt-4 p-4 border rounded shadow bg-light">
        <h2>Lista de Casos</h2> <br> <hr>
        <div class="mb-3">
            <?php
                mostrar_todos_casos();
            ?>
    </div>
</div>

</body>
</html>
