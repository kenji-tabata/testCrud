/**
 * Alert para confirmar o DELETE do registro
 */

// percorrer o array de links
$(document).ready(function () {

    $("a[title='Deletar']").click(function (event) {
        event.preventDefault();

        var linha = $(this).parent().parent();
        var id = $(this).attr("data-id");

        $.post("controllers/Pesquisado.php", "ac=delete&id=" + id, function (resp) {
            linha.fadeOut("slow", function () {
                console.log(id);
                // Remover linha
                linha.remove();
                setTimeout(function () {
                    $("#erro").fadeOut("slow", function () {
                        $("#erro").remove();
                    });
                }, 5000);
                $("#erro").remove();
                $("#msgErro").append("<p id='erro'>" + resp + "</p>");
            });
        }).fail(function (error) {
            alert(error);
        });
    });

    $("a[title='Editar']").click(function (event) {
        event.preventDefault();

        var section = $('#index');
        var id = $(this).attr("data-id");

        $.post("controllers/Pesquisado.php", "ac=form-update&id=" + id, function (html) {
            section.fadeOut("slow", function () {
                section.remove();
                $('body').append(html);
            });
        }).fail(function (error) {
            alert(error);
        });
    });

    $("a[title='Inserir']").click(function (event) {
        event.preventDefault();

        var section = $('#index');

        $.post("controllers/Pesquisado.php", "ac=form-insert", function (html) {
            section.fadeOut("slow", function () {
                section.remove();
                $('body').append(html);
            });
        }).fail(function (error) {
            alert(error);
        });
    });

    $("a[title='Listar']").click(function (event) {
        event.preventDefault();

        var section = $('#index');
        var script = $('#index-js');

        $.post("controllers/Pesquisado.php", "ac=list", function (html) {
            section.fadeOut("slow", function () {
                section.remove();
                script.remove();
                $('body').append(html);
            });
        }).fail(function (error) {
            alert(error);
        });
    });
    
    $(".info").click(function (event) {
       event.preventDefault();
       
       var section = $('#index');
       
//       $.post("controllers/Pesquisado.php", "ac=info", function (html) {
//          section.fadeOut("slow", function () {
//                section.remove();
//                $('body').append(html);
//            });
//       });
    });

});