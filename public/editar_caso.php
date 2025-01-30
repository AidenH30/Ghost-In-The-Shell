<?php
require_once '../app/helpers/helpers_database.php';
require_once '../app/helpers/helpers.php';

if (!isset($_GET['numero_caso'])) {
    alert("Poxa, acho que você encontrou essa página da maneira errada...");
    redirect("index.php");
    exit;
}

$numero_caso = $_GET['numero_caso'];

$conn = open_connection();
$query = "SELECT * FROM " . TABLE_CASOS . " WHERE numero_caso = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $numero_caso);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    alert("Poxa, esse caso não foi encontrado!");
    redirect("index.php");
    exit;
}

$caso = $result->fetch_assoc();
$stmt->close();
$conn->close();

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/style.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Editar Caso</title>
</head>

<body>
    
    <form action="../app/controllers/processa_editar_caso.php" method="POST" enctype="multipart/form-data" class="container mt-4 p-4 border rounded shadow bg-light">
        <h2>Editar Caso</h2><br><hr>

        <div class="mb-3">
            <label for="numero_caso" class="form-label">Nº do Caso:</label>
            <input required type="number" readonly name="numero_caso" class="form-control" value="<?= htmlspecialchars($caso['numero_caso']) ?>">
        </div>

        <div class="mb-3">
            <label for="data_abertura" class="form-label">Data de Abertura:</label>
            <input required  type="date" class="form-control" id="data_abertura" name="data_abertura" value="<?= htmlspecialchars($caso['data_abertura']) ?>">
        </div>

        <div class="mb-3">
            <label for="finalizado" class="form-label">Finalizado?</label>
            <select class="form-select" id="finalizado" name="finalizado">
                <option value="1" <?= $caso['finalizado'] ? 'selected' : '' ?>>Sim</option>
                <option value="0" <?= !$caso['finalizado'] ? 'selected' : '' ?>>Não</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="data_encerramento" class="form-label">Data de Encerramento</label>
            <input required type="date" class="form-control" id="data_encerramento" name="data_encerramento" value="<?= htmlspecialchars($caso['data_encerramento']) ?>">
        </div>

        <div class="mb-3">
            <label for="descricao" class="form-label">Descrição:</label>
            <textarea required class="form-control" id="descricao" name="descricao" rows="4"><?= htmlspecialchars($caso['descricao']) ?></textarea>
        </div>

        <div class="mb-3">
            <label for="envolvidos" class="form-label">Envolvidos:</label>
            <textarea required class="form-control" id="envolvidos" name="envolvidos" rows="3"><?= htmlspecialchars($caso['envolvidos']) ?></textarea>
        </div>

        <div class="my-div-centralizada-wrap">
        <button type="submit" class="btn btn-primary">Salvar</button>
        </div>

        <div class="my-div-centralizada-wrap">
        <button type="button" class="btn btn-danger" onclick="window.location.href='../app/controllers/processa_excluir_caso.php?numero_caso=<?= urlencode($caso['numero_caso']) ?>'">Excluir</button>
        </div>

    </form>
</div>
</body>
</html>
