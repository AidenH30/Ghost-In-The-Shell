<?php
require_once 'helpers_database.php';
function logar($username, $password){
    $conn = open_connection();

    $stmt = $conn->prepare("SELECT id, password FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $hashedPassword);
        $stmt->fetch();

        if (password_verify($password, $hashedPassword)) {
            $_SESSION['user_id'] = $id;
            return 1;
        } else {
            echo "Senha inválida.";
        }
    } else {
        echo "Usuário não encontrado.";
    }

    $stmt->close();
    $conn->close();
}

function registrar($username, $password){
    $conn = open_connection();

    $stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
    $stmt->bind_param("ss", $username, $password);

    if ($stmt->execute()) {
        echo "Sucesso! Retorne à página de login";
    } else {
        echo "Erro ao registrar: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}

?>