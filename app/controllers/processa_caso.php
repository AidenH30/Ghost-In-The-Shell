<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../../public/css/style.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
<div class="container mt-4 p-4 border rounded shadow bg-light">

<?php
require_once '../helpers/helpers_database.php'; 
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        // Recebendo dados do formulário
        $numeroCaso = $_POST['numero_caso'];
        $dataAbertura = $_POST['data_abertura'];
        $finalizado = isset($_POST['finalizado']) ? 1 : 0;
        $dataEncerramento = $_POST['data_encerramento'];
        $descricao = $_POST['descricao'];
        $envolvidos = $_POST['envolvidos'];

    // Verificar qual botão foi pressionado
    if (isset($_POST['acao'])) {
        $acao = $_POST['acao'];
            
            if($acao === 'salvar'){
                if(inserir_caso($numeroCaso, $dataAbertura, $finalizado, $dataEncerramento, $descricao, $envolvidos) === 1){
                    echo "<script>window.alert('Caso registrado!')</script>";
                    echo mostrar_todos_casos();
                }else{
                    echo "<script>window.alert('Erro ao salvar o caso!')</script>";
                }
            } elseif($acao === 'visualizar'){
                echo mostrar_todos_casos();
            } elseif($acao === 'excluir'){
                echo excluir_caso_selecionado();
            }

    } else {
        echo "Nenhuma ação foi selecionada.";
    }
} else{
}
?>

</div>

</body>
</html>
