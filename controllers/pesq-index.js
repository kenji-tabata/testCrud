/**
 * Alert para confirmar o DELETE do registro
 */

// percorrer o array de links
$(document).ready(function () {

    $("a[title='Deletar']").click(function (event) {
        event.preventDefault();
        
        var linha = $(this).parent().parent();
        var id = $(this).attr("data-id");

        $.ajax({
            type: 'GET',
            url: 'pesq-index-action.php',
            data: 'id=' + id,
            dataType: 'json',
            success: function () {
                linha.fadeOut("slow", function () {
                    // Remover linha
                    linha.remove();
                });
            },
            error: function (xhr, errorThrown) {
//                alert("Erro na chamada ajax!");
//                console.log("Um erro ocorreu: " + (errorThrown ? errorThrown : xhr.status));
                console.log({
                    script: "pesq-index.js",
                    operacao: "tentando deletar pesquisado "+ id,
                    erro: errorThrown,
                    xhr: xhr
                });
            }
            
            
        });
    });

    $("a[title='Editar']").click(function (event) {
        event.preventDefault();
        var id = $(this).attr("data-id");
        // Abrir formulário
        $(location).attr("href", "../controllers/pesq-form.php?id=" + id);
    });

});