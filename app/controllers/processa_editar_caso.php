<?php
require_once '../helpers/helpers_database.php';
require_once '../helpers/helpers.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $numeroCaso = $_POST['numero_caso'];
    $dataAbertura = $_POST['data_abertura'];
    $finalizado = isset($_POST['finalizado']) ? 1 : 0;
    $dataEncerramento = $_POST['data_encerramento'];
    $descricao = $_POST['descricao'];
    $envolvidos = $_POST['envolvidos'];

    if(editar_caso($numeroCaso, $dataAbertura, $finalizado, $dataEncerramento, $descricao, $envolvidos) === 1){
        alert("Caso atualizado!");
    }else{
        alert("Algo não deu certo...");
    }

    redirect("../../public/listar_casos.php");

}else{
    redirect("../../public/index.php");
}

?>