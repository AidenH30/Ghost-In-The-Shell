<?php

define('HOST', 'localhost');
define('USER', 'root');
define('PASSWORD', 'guilherme1');
define('DATABASE', 'ghost');
define('TABLE_CASOS', 'casos');

function open_connection($db = DATABASE) {
    $conn = new mysqli(HOST, USER, PASSWORD, $db);

    if ($conn->connect_error) {
        throw new Exception("Erro ao conectar ao banco de dados: " . $conn->connect_error);
    }

    return $conn;
}

function create_database() {
    $conn = new mysqli(HOST, USER, PASSWORD);

    if ($conn->connect_error) {
        throw new Exception("Erro ao conectar ao servidor MySQL: " . $conn->connect_error);
    }

    $createDBQuery = "CREATE DATABASE IF NOT EXISTS " . DATABASE;

    if ($conn->query($createDBQuery) !== TRUE) {
        throw new Exception("Erro ao criar banco de dados: " . $conn->error);
    }

    echo "<script>console.log('Banco de dados criado (ou já existe');</script>";
    $conn->close();
}

function create_table() {
    $conn = open_connection();

    $createTableQuery = "CREATE TABLE IF NOT EXISTS " . TABLE_CASOS . " (
        numero_caso INT AUTO_INCREMENT PRIMARY KEY,
        data_abertura DATE,
        finalizado TINYINT(1),
        data_encerramento DATE,
        descricao TEXT,
        envolvidos TEXT,
        arquivado TINYINT(1)
    );";

    if ($conn->query($createTableQuery) !== TRUE) {
        throw new Exception("Erro ao criar tabela: " . $conn->error);
    }

    echo "<script>console.log('Tabela criada (ou já existe');</script>";
    $conn->close();
}

function inserir_caso($numeroCaso, $dataAbertura, $finalizado, $dataEncerramento, $descricao, $envolvidos) {
    $conn = open_connection();

    $inserir_caso_query = "INSERT INTO " . TABLE_CASOS . " 
        (numero_caso, data_abertura, finalizado, data_encerramento, descricao, envolvidos) 
        VALUES (?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($inserir_caso_query);

    if (!$stmt) {
        $conn->close();
        throw new Exception("Erro ao preparar a query: " . $conn->error);
    }

    // Associe os parâmetros corretamente (finalizado como inteiro)
    if (!$stmt->bind_param("isssis", $numeroCaso, $dataAbertura, $finalizado, $dataEncerramento, $descricao, $envolvidos)) {
        $stmt->close();
        $conn->close();
        throw new Exception("Erro no bind_param: " . $stmt->error);
    }

    if (!$stmt->execute()) {
        $stmt->close();
        $conn->close();
        throw new Exception("Erro ao executar a query: " . $stmt->error);
    }

    $stmt->close();
    $conn->close();

    return 1;
}

function mostrar_todos_casos(){
    $conn = open_connection();
        $casos = [];
        $select_case_query = "SELECT * FROM " . TABLE_CASOS;
        $result = $conn->query($select_case_query);

        if(!$result){
            $conn->close();
            throw new Exception("Erro ao executar a query de seleção de casos: " . $conn->error);
        }

        if($result->num_rows > 0){
            while ($row = $result->fetch_assoc()){
                $casos[] = $row;
            }
        }else{
            echo "Nenhum caso encontrado.";
        }

        foreach($casos as $caso){

        }
    
        $result->free();
    $conn->close();
}


?>