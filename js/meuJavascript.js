$(document).ready(function () {
 
    //Trata o submit do formulário de cadastro de atividades
    $(document).on("submit", "#formCadastroAtividades", function(event){
        event.preventDefault();
        var formData = new FormData(this);
        $.ajax({
            url: "cadastroAtividades.php",
            type: "post",
            data: formData,
            dataType: "json",
            success: function (result) {
                if (result.acao === 1) {
                    swal("Isso!", result.mensagem, "success");


                } else {
                    swal("Ops!", result.mensagem, "error");                       

                }
            },

            error: function (xhr, ajaxOptions, thrownError) {
                swal("Desculpe!", "Algo não está certo", "error");
                console.log(xhr.status);
                console.log(thrownError);
            },
            cache: false,
            contentType: false,
            processData: false

        });
    });

});



