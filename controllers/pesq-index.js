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
                alert("Erro na chamada ajax!");
//                console.log("Um erro ocorreu: " + (errorThrown ? errorThrown : xhr.status));
                console.log({
                    script: "pesq-index.js",
                    operacao: "tentando deletar pesquisado " + id,
                    erro: errorThrown,
                    xhr: xhr
                });
            }
        });
        
//        $.post("dec_eixo_x_action.php", parametros, function() {})
//            .fail(function(error) {
//                alert(error);
//            });        
    });

    $("a[title='Editar']").click(function (event) {
        event.preventDefault();

        var section = $('#index');
        var id = $(this).attr("data-id");

        $.ajax({
            type: 'GET',
            url: 'pesq-form.php',
            data: 'id=' + id,
            dataType: 'html',
            success: function (html) {
                section.fadeOut("slow", function () {
                    section.remove();
                    $('body').append(html);
                });
            }
        });
    });

    $("a[title='Inserir']").click(function (event) {
        event.preventDefault();

        var section = $('#index');

        $.ajax({
            type: 'GET',
            url: 'pesq-form.php',
            dataType: 'html',
            success: function (html) {
                section.fadeOut("slow", function () {
                    section.remove();
                    $('body').append(html);
                });
            }
        });
    });

});