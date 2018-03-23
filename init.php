<?php
if(!isset($_SESSION)){
    session_start();
}

// inclui o arquivo de funções
require_once 'functions.php';
require_once 'conexao.php';

$_SESSION["cor"] = misturar();

if(!isset($_SESSION["logado"])){
    $_SESSION["logado"] = 0;
    $_SESSION["adm"] = 0;
}
