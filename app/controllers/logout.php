<?php
require_once '../helpers/helpers_database.php';
require_once '../helpers/helpers_autenticacao.php';
require_once '../helpers/helpers.php';
session_start();
session_destroy();
redirect("login.php");
?>