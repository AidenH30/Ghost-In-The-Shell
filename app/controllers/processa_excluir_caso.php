<?php
require_once '../helpers/helpers_database.php';
require_once '../helpers/helpers.php';

if (!isset($_GET['numero_caso'])) {
    alert("Poxa, acho que você encontrou essa página da maneira errada...");
    redirect("../../public/index.php");
    exit;
}

    $numero_caso = $_GET['numero_caso'];
    excluir_caso($numero_caso);

?>