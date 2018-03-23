<?php

include("init.php");

function htmlStart() {
    $html = '
	<DOCTYPE html>
	<html lang="pt-BR">
	<head>
		<title>Site da Aula</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"/>
		<link href="css/style.css" rel="stylesheet"  />
	</head>
	<body class=" bg-' . $_SESSION["cor"][1] . 'text-' . $_SESSION["cor"][2] . ' mb-5">
	';
    return $html;
}

function cabecalho() {
    $html = '
	<section class="row mb-3">
		<div class="col-xs-12 col-md-6 mt-3 mx-auto">
			<ol class="breadcrumb d-flex justify-content-center bg-' . $_SESSION["cor"][1] . ' border rounded-1 ">
				<li class="breadcrumb-item" ><a class="text-' . $_SESSION["cor"][2] . '" href="index.php" id="linkInicio">Início</a></li>
				<li class="breadcrumb-item" ><a class="text-' . $_SESSION["cor"][2] . '" href="formCadastroAtividades.php" id="linkCadastrar">Cadastrar</a></li>
				<li class="breadcrumb-item" ><a class="text-' . $_SESSION["cor"][2] . '" href="listarAtividades.php" id="linkListar">Listar</a></li>
			</ol>
		</div>
	</section>
	';
    return $html;
}

function htmlEnd() {
    $html = '
        <p class=" small fixed-bottom bg-' . $_SESSION["cor"][1] . ' text-' . $_SESSION["cor"][2] . ' text-center  mt-3 p-2  border-top" style="margin-bottom:0">Site em desenvolvimento</p>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script type="text/javascript" src="js/meuJavascript.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	</body>	
	</html>	
	';
    return $html;
}

function misturar() {
    $cores = array("primary light", "secondary light", "dark light", "info light", "warning light", "danger light", "success light", "light dark");
    shuffle($cores);
    $i = count($cores) - 1;
    $i = rand(0, $i);
    $explodido = explode(" ", $cores[$i]);

    array_splice($cores, $i, 1);

    $cor = array($cores, $explodido[0] . ' ', $explodido[1] . ' ');

    return $cor;
}
