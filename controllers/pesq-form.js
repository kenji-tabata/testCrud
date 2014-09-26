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
            cpf: $("input[name='cpf']").val(),
            
            id_pesq: $("#id_pesq").val(),
            dt_nasc: $("input[name='dt_nasc']").val(),
            endereco: $("input[name='endereco']").val(),
            bairro: $("input[name='bairro']").val(),
            cidade: $("input[name='cidade']").val(),
            uf: $("input[name='uf']").val(),
            cep: $("input[name='cep']").val(),
            telefone_res: $("input[name='telefone_res']").val(),
            telefone_cel: $("input[name='telefone_cel']").val(),
            telefone_com: $("input[name='telefone_com']").val(),
            email: $("input[name='email']").val(),
            formacao: $("input[name='formacao']").val(),
            empresa: $("input[name='empresa']").val(),
            dt_adm: $("input[name='dt_adm']").val(),
            dt_preen: $("input[name='dt_preen']").val()
        };
        
        // validar
        $.post("controllers/Pesquisado.php", "ac=validar&pesq=" + JSON.stringify(objPesquisado), 
        function (resposta_do_ajax) {
            console.log(resposta_do_ajax);
            // Update
            if($('#id').val()){
                $.post("controllers/Pesquisado.php", "ac=update&pesq=" + JSON.stringify(objPesquisado), 
                function (resp) {
                    setTimeout( function (){
                        $("#erro").fadeOut ("slow", function () {
                            $("#erro").remove();
                        });
                    },5000);
                    $("#erro").remove();
                    $("#msgErro").append("<p id='erro'>"+ resp +"</p>");
                }).fail(function (ajaxError) {
                    alert(ajaxError);
                });
            }

            // Insert
            else {
                $.post("controllers/Pesquisado.php", "ac=insert&pesq=" + JSON.stringify(objPesquisado), 
                function (resp) {
                    setTimeout( function (){
                        $("#erro").fadeOut ("slow", function () {
                            $("#erro").remove();
                        });
                    },5000);
                    $("#erro").remove();
                    $("#msgErro").append("<p id='erro'>"+ resp +"</p>");
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