<?php
require_once '../helpers/helpers_database.php'; 
require_once '../helpers/helpers.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        // Recebendo dados do formulário
        $numeroCaso = $_POST['numero_caso'];
        $dataAbertura = $_POST['data_abertura'];
        $finalizado = isset($_POST['finalizado']) ? 1 : 0;
        $dataEncerramento = $_POST['data_encerramento'];
        $descricao = $_POST['descricao'];
        $envolvidos = $_POST['envolvidos'];

        if (isset($_POST['acao'])) {
            $acao = $_POST['acao'];
            if($acao === "salvar"){
                if(inserir_caso($numeroCaso, $dataAbertura, $finalizado, $dataEncerramento, $descricao, $envolvidos) === 1){
                    alert("Caso regitrado!");
                    redirect("../../public/listar_casos.php");
                }else{
                    alert("Erro ao salvar o caso.");
                    redirect("../../public/listar_casos.php");
                }
            }
        }
} else{
    header("Location: ../../public/index.php");
    exit;
}
?>