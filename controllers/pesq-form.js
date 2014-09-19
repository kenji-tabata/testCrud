$(document).ready(function () {
    
    // Eventos do formulário
    $("form").submit(function (event) {
        event.preventDefault();

        // montar objeto apartir do html...
        var objPesquisado = {
            id: $("#id").val(),
            nome: $("input[name='nome']").val(),
            oculto: $("input[name='oculto']").val(),
            sexo: $("input[name='sexo']").val(),
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
///**
// * Valida os campos do formulario do pesquisado com JavaScript
// * @param {type} cadastro
// * @returns {Boolean}
// */
//function validar(cadastro){
//    if(cadastro.nome.value == ""){
//        alert('Preenche com o seu nome!');
//        document.getElementById("nome").style.border="1px solid #F00";
//        cadastro.nome.focus();
//        return false;
//    }else{
//        document.getElementById("nome").style.border="none";
//        document.getElementById("cpf").style.border="none";
//        document.getElementById("cargo").style.border="none";
//    }
//    
//    regExp = /^[0-9]{3}\.[0-9]{3}\.[0-9]{3}-[0-9]{2}$/;
//    if(cadastro.cpf.value == "" || regExp.test(cadastro.cpf.value) == false ){
//        alert('Preenche o numero de CPF!');
//        document.getElementById("cpf").style.border="1px solid #F00";
//        cadastro.cpf.focus();
//        return false;
//    }else{
//        document.getElementById("nome").style.border="none";
//        document.getElementById("cpf").style.border="none";
//        document.getElementById("cargo").style.border="none";
//    }
//    if(cadastro.cargo.value == ""){
//        alert('Preenche o seu cargo atual da empresa!');
//        document.getElementById("cargo").style.border="1px solid #F00";
//        cadastro.cargo.focus();
//        return false;
//    }else{
//        document.getElementById("nome").style.border="none";
//        document.getElementById("cpf").style.border="none";
//        document.getElementById("cargo").style.border="none";
//    }
//}