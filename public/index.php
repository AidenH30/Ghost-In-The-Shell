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
    <title>Document</title>
</head>
<body>
<h1>Registro de Caso</h1>
    <form action="../app/controllers/processa_caso.php" method="POST" enctype="multipart/form-data">
        <label for="numero_caso">Nº do Caso:</label>
        <input type="number" id="numero_caso" name="numero_caso" ><br><br>

        <label for="data_abertura">Data de Abertura:</label>
        <input type="date" id="data_abertura" name="data_abertura" ><br><br>

        <label for="finalizado">Finalizado?:</label>
        <select id="finalizado" name="finalizado" >
            <option value="1">Sim</option>
            <option value="0">Não</option>
        </select><br><br>

        <label for="data_encerramento">Data de Encerramento:</label>
        <input type="date" id="data_encerramento" name="data_encerramento"><br><br>

        <label for="descricao">Descrição:</label><br>
        <textarea id="descricao" name="descricao" rows="5" cols="40" ></textarea><br><br>

        <label for="envolvidos">Envolvidos:</label><br>
        <textarea id="envolvidos" name="envolvidos" rows="3" cols="40" ></textarea><br><br>

      <!-- <label for="evidencias">Evidências (JPEG/JPG/PDF):</label>
        <input type="file" id="evidencias" name="evidencias" accept=".jpeg,.jpg,.pdf"><br><br> -->

        <button type="submit" name="acao" value="salvar">Salvar</button>
        <button type="submit" name="acao" value="arquivar">Arquivar</button>
        <button type="submit" name="acao" value="encerrar">Encerrar</button>
        <button type="submit" name="acao" value="excluir">Excluir</button>
        <button type="submit" name="acao" value="visualizar">Mostrar</button>
    </form>
</body>
</html>
