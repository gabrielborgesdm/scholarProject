<?php 
include("init.php");
$html = htmlStart();

	$html .= 
	'<div class="container">
	';
	$html .= cabecalho();

	$html .=
	'
            <section class="row">
                <div class="col-12 text-center">
                    <p class="display-4">
                        Portifólio de Atividades
                    <p>
                    <hr/>
                    <p class="lead col-xs-12 col-md-8 mt-4 mx-auto">
                        Bem vindo ao <span class="font-italic">my personal portfolio manager</span>, uma leve aplicação feita com intuito de gerenciar os projetos feitos na aula de WEB.	
                    </p>
                </div>	

                <div class="col-md-8 col-lg-10 mx-auto">
                    <div class="card bg-' . $_SESSION["cor"][1] . ' text-' . $_SESSION["cor"][2] . ' border border-' . $_SESSION["cor"][2] . ' text-center " >
                        <div class="card-header ">
                            My Portfolio manager
                        </div>
                        <div class="card-body border border-left-0 border-right-0 border-bottom-0 border-' . $_SESSION["cor"][2] . '">
                            <h4 class="card-title">Cadastre mais projetos</h4>
                            <p class="card-text">Clique aqui para ir ao formulário de cadastro de projetos, depois de cadastrado os projetos estarão listados 
                                <a class="font-italic text-' . $_SESSION["cor"][2] . '" href="listarAtividades.php">aqui</a>
                            </p>
                            <a href="formCadastroAtividades.php" class="btn btn-outline-' . $_SESSION["cor"][2] . '">Cadastrar mais projetos</a>
                        </div>
                    </div>
                </div>
            </section>	
	</div>
	';

 
$html .= htmlEnd();
echo $html;
?>	