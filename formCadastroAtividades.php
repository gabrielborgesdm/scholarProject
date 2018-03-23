<?php

include("init.php");
$html = htmlStart();

$html.='
    <div class="container">';

$html .= cabecalho();
$html.='

    <section class="row">
        <div class="col-xs-12 col-md-8 mx-md-auto">		
            <h1 class="mb-3 text-center"><small>Cadastrar Atividade</small></h1>       
            <form method="post" action="#"  id="formCadastroAtividades" enctype="multipart/form-data" class="px-5 pt-3 border rounded">									
                <div class="form-group row">
                    <label for="nomeAtividade">Nome*</label>
                    <input type="text" class="form-control bg-' . $_SESSION["cor"][1] . ' text-' . $_SESSION["cor"][2] . '" name="nomeAtividade" id="nomeAtividade"  />
                </div>

                <div class="form-group row">
                    <label for="descricao">Breve descrição</label>
                    <textarea class="form-control bg-' . $_SESSION["cor"][1] . 'text-' . $_SESSION["cor"][2] . '" rows="2" name="descricao" id="descricao" style="resize:none" ></textarea>
                </div>

                <div class="form-group row">
                    <label for="dataAtividade">Data da elaboração*</label>
                    <input type="date" class="form-control bg-' . $_SESSION["cor"][1] . 'text-' . $_SESSION["cor"][2] . '" name="dataAtividade" id="dataAtividade" />
                </div>					

                <div class="form-group row">
                    <label for="uploadAtividade">Upload da atividade*</label>
                    <input type="file" class="form-control-file" name="uploadAtividade" accept=".zip, .rar" id="uploadAtividade" />
                </div>

                <div class="form-group row mt-5 mb-3">						
                    <button id="submitButton" class="btn btn-default btn-outline-' . $_SESSION["cor"][2] . ' col-sm-4 mx-auto">Cadastrar</button>
                </div>

            </form>         
        </section>	
    </div>';

$html .= htmlEnd();
echo $html;	