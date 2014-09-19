/**
 * Alert para confirmar o DELETE do registro
 */

// percorrer o array de links
$(document).ready(function () {

    $("a[title='Deletar']").click(function (event) {
        event.preventDefault();

        var linha = $(this).parent().parent();
        var id = $(this).attr("data-id");

        $.post("Pesquisado.php","ac=delete&id=" + id, function () {
            linha.fadeOut("slow", function () {
                console.log(id);
                // Remover linha
                linha.remove();
            });
        }).fail(function(error) {
                alert(error);
        });  
    });

    $("a[title='Editar']").click(function (event) {
        event.preventDefault();

        var section = $('#index');
        var id = $(this).attr("data-id");
        
        $.post("pesq-form.php", "id=" + id, function(html) {
            section.fadeOut("slow", function () {
                section.remove();
                $('body').append(html);
            });
        }).fail(function(error) {
                alert(error);
        });  
    });

    $("a[title='Inserir']").click(function (event) {
        event.preventDefault();

        var section = $('#index');

        $.post("pesq-form.php", function(html) {
           section.fadeOut ("slow", function () {
                section.remove();
                $('body').append(html);
            });
        }).fail(function(error) {
                alert(error);
        });  
    });
});