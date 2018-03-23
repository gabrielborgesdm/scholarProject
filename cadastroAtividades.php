<?php

include("init.php");
$retorno = Array();


if (empty($_POST["nomeAtividade"]) or empty($_POST["dataAtividade"]) or empty($_FILES["uploadAtividade"]["name"])) {
    print_r($_POST["nomeAtividade"] . " " . $_POST["dataAtividade"] . " " . $_FILES["uploadAtividade"]["name"]);
    $retorno["acao"] = 0;
    $retorno["mensagem"] = "Existe campos vazios";
}
else {


            $target_dir = "uploads/";
            $target_file = $target_dir . basename($_FILES["uploadAtividade"]["name"]);
            $uploadOk = 1;
            $fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

            $nome = $_POST["nomeAtividade"];
            $data = $_POST["dataAtividade"];
            $descricao = $_POST["descricao"];
            
            
            $descricao = isset($_POST['descricao']) ? $_POST['descricao'] : '';
            if($descricao == ''){
                $descricao = 'Nenhum detalhe sobre o projeto';
            }
            $link = $target_file;

            // Check if file already exists
            if (file_exists($target_file)) {
                $retorno["acao"] = 0;
                $retorno["mensagem"] = "Arquivo com mesmo nome já existe";
            }
            else{
                // Check file type
                if ($fileType !== "zip" && $fileType !== "rar") {
                    $retorno["acao"] = 0;
                    $retorno["mensagem"] = "Tipo de arquivo inválido";

                }
                else{                
                    // Check file size
                    if ($_FILES["uploadAtividade"]["size"] > 2000000) {
                        $retorno["acao"] = 0;
                        $retorno["mensagem"] = "Arquivo muito grande";
                    }
                    else{                 
                        // Check if $uploadOk is set to 0 by an error
                        if ($uploadOk == 0) {
                            $retorno["acao"] = 0;
                            $retorno["mensagem"] = "Arquivo não pode ser enviado";

                            // if everything is ok, try to upload file
                        }
                        else {

                            if (!move_uploaded_file($_FILES["uploadAtividade"]["tmp_name"], $target_file)) {
                                $retorno["acao"] = 0;
                                $retorno["mensagem"] = "O arquivo não pode ser enviado!";
                            }
                            else {

                                //Inserir no banco
                                $PDO = conexaoDB();
                                $sql = 'INSERT INTO portifolio(nome, descricao, dataInsercao, linkAtividade) VALUES(:nome, :descricao, :dataInsercao, :linkAtividade);';
                                $stmt = $PDO->prepare($sql);
                                $stmt->bindParam(':nome', $nome);
                                $stmt->bindParam(':descricao', $descricao);
                                $stmt->bindParam(':dataInsercao', $data);
                                $stmt->bindParam(':linkAtividade', $link);
                                if ($stmt->execute()) {
                                    $retorno["acao"] = 1;
                                    $retorno["mensagem"] = "Cadastro da atividade efetuado com sucesso";
                                }
                                else {
                                    $retorno["acao"] = 0;
                                    $retorno["mensagem"] = $stmt->errorInfo();
                                }
                            } 
                        }
                    }
                }
            } 
}
echo json_encode($retorno);
