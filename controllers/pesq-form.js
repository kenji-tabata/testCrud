$(document).ready(function () {
    
    // Eventos do formulário
    $("form").submit(function (event) {
        event.preventDefault();

        // montar objeto apartir do html...
        var objPesquisado = {
            id: $("#id").val(),
            nome: $("input[name='nome']").val(),
            oculto: $("input[name='oculto']:checked").val(),
            sexo: $("input[name='sexo']:checked").val(),
            cargo: $("input[name='cargo']").val(),
            cpf: $("input[name='cpf']").val()
        };
        
        // validar
        $.post("Pesquisado.php", "ac=validar&pesq=" + JSON.stringify(objPesquisado), function (resposta_do_ajax) {
            console.log(resposta_do_ajax);
            
            // Update
            if(id){
                $.post("Pesquisado.php", "ac=update&pesq=" + JSON.stringify(objPesquisado), function (resp) {
                    console.log(resp);
                }).fail(function (ajaxError) {
                    alert(ajaxError);
                });
            }
            
            // Insert
            else {
                $.post("Pesquisado.php", "ac=insert&pesq=" + JSON.stringify(objPesquisado), function (resp) {
                    console.log(resp);
                }).fail(function (ajaxError) {
                    alert(ajaxError);
                });
            }
        }).fail(function (phpError) {
            alert(phpError);
        });
    });
    
    // esconde o elemento html
    $(".toggleDiv").hide();
    // torna visível o elemento html
    $(".toggle").click(function (event) {
        event.preventDefault();
        $(this).next(".toggleDiv").toggle("slow");
    });
});