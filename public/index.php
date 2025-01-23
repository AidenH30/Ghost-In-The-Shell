<?php
require_once '../app/helpers/helpers_database.php';
create_database();
create_table__users();
create_table_casos();
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
    <title>Ghost in the Shell</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0;
        }

        .container {
            text-align: center;
        }

        .btn-registrar {
            background-color: #8c52ff;
            color: #fff;
            padding: 10px 20px;
            font-size: 14px;
        }

        .btn-registrar:hover {
            background-color: #7a47e0;
        }

        .btn-visualizar {
            background-color: #534d7b;
            color: #fff;
            padding: 10px 20px;
            font-size: 14px;
        }

        .btn-visualizar:hover {
            background-color: #474269;
        }

        .btn {
            margin-bottom: 10px;
            width: 200px;
        }
    </style>
</head>
<body>
    <div class="container">
        <a href="registrar_caso.php" class="btn btn-registrar">REGISTRAR CASO</a>
        <a href="listar_casos.php" class="btn btn-visualizar">VISUALIZAR CASOS</a>
        <a href="../app/controllers/resetar_bd.php" class="btn btn-registrar">RESETAR BD</a>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
