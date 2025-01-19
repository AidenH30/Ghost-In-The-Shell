<?php
include_once '../app/helpers/helpers_database.php';
create_database();
create_table();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
<form action="../app/controllers/processa_caso.php" method="POST" enctype="multipart/form-data" class="container mt-4 p-4 border rounded shadow bg-light">
    <h2>Registro de Caso</h2> <br> <hr>
    <div class="mb-3">
        <label for="numero_caso" class="form-label">Nº do Caso:</label>
        <input type="number" class="form-control" id="numero_caso" name="numero_caso" placeholder="Digite o número do caso">
    </div>

    <div class="mb-3">
        <label for="data_abertura" class="form-label">Data de Abertura:</label>
        <input type="date" class="form-control" id="data_abertura" name="data_abertura">
    </div>

    <div class="mb-3">
        <label for="finalizado" class="form-label">Finalizado?</label>
        <select class="form-select" id="finalizado" name="finalizado">
            <option value="1">Sim</option>
            <option value="0">Não</option>
        </select>
    </div>

    <div id="div-data-encerramento" class="mb-3">
        <label for="data_encerramento" class="form-label">Data de Encerramento:</label>
        <input type="date" class="form-control" id="data_encerramento" name="data_encerramento">
    </div>

    <div class="mb-3">
        <label for="descricao" class="form-label">Descrição:</label>
        <textarea class="form-control" id="descricao" name="descricao" rows="5" placeholder="Digite a descrição"></textarea>
    </div>

    <div class="mb-3">
        <label for="envolvidos" class="form-label">Envolvidos:</label>
        <textarea class="form-control" id="envolvidos" name="envolvidos" rows="3" placeholder="Digite os envolvidos"></textarea>
    </div>

    <!-- <div class="mb-3">
        <label for="evidencias" class="form-label">Evidências (JPEG/JPG/PDF):</label>
        <input type="file" class="form-control" id="evidencias" name="evidencias" accept=".jpeg,.jpg,.pdf">
    </div> -->

    <div class="d-flex justify-content-between">
        <button type="submit" class="btn btn-primary" name="acao" value="salvar">Salvar</button>
        <button type="submit" class="btn btn-secondary" name="acao" value="arquivar">Arquivar</button>
        <button type="submit" class="btn btn-warning" name="acao" value="encerrar">Encerrar</button>
        <button type="submit" class="btn btn-danger" name="acao" value="excluir">Excluir</button>
        <button type="submit" class="btn btn-info" name="acao" value="visualizar">Mostrar</button>
    </div>
</form>

</body>
</html>
