<?php

include("init.php");
$html = htmlStart();


$html .= '<div class="container">
	';
$html .= cabecalho();

$html .= '		
		<section class="row">
			<div class="col-12 text-center">
				<h1 class=" display-4">
					Lista das atividades
				<h1>
				<hr />
			</div>';

$PDO = conexaoDB();
$sql = 'SELECT nome, descricao, dataInsercao, linkAtividade FROM portifolio;';
$stmt = $PDO->prepare($sql);
$i = 0;

if ($stmt->execute()) {
    while ($atividade = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $explodido = explode(" ", $_SESSION["cor"][0][$i]);

        $html .= '
        <div class="card col-12 bg-' . $_SESSION["cor"][0][$i] . ' text-' . $explodido[1] . ' my-3">
                <div class="card-body">
                        <h4 class="card-title">' . $atividade["nome"] . '</h4>
                        <p class="lead"><small>' . $atividade["descricao"] . '. Esta atividade foi feita em: ' . $atividade["dataInsercao"] . '</small></p>
                        <a href="downloadArquivos.php?linkAtividade=' . $atividade["linkAtividade"] . '" class=" text-' . $explodido[1] . '" >Clique aqui para fazer o download desta atividade</a>
                </div>
        </div>	
        ';
        $i++;
        
        if ($i >= count($_SESSION["cor"][0])) {       
            $i = 0;
        }
    }
    if ($i <= 0) {
        $html .= '
        <p class="text-center col-12 mx-0 lead text-' . $_SESSION["cor"][2] . '">Nenhuma atividade cadastrada</p>
        <div class=" col-6 mx-auto text-center">						
                <a href="index.php" class="btn btn-outline-' . $_SESSION["cor"][2] . ' col-sm-4">Voltar ao ínicio</a>
        </div>
        ';
    }
}
else {
    $html .= '
		<p class="text-center lead text-success">Erro:</p>
		
		' . serialize($stmt->errorInfo());
}

$html .= '		
		</section>	
	</div>
	';


$html .= htmlEnd();
echo $html;
?>	