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
            }else{
                echo "<script>window.alert('Erro ao salvar o caso!')</script>";
            }
        } elseif($acao === 'visualizar'){
            echo mostrar_todos_casos();
        }

    } else {
        echo "Nenhuma ação foi selecionada.";
    }
}