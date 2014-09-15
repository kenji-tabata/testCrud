/**
 * Recebe como parametro o idBlock e atribui ao elemento o display:block (Torna visivel o elemento)
 * Recebe como parametro o idLink e muda a funcao do onclick do elemento
 * @param {type} idBlock
 * @param {type} idLink
 * @returns {undefined}
 */
function mostrar(idBlock,idLink){
    document.getElementById(idBlock).style.display="block";
    if(tipo1 == "contato"){
        document.getElementById(idLink).setAttribute('onclick', 'esconder("contato","btnContato")');
    }else{
        document.getElementById(idLink).setAttribute('onclick', 'esconder("empresa","btnEmpresa")');
    }
}

/**
 * Recebe como parametro o idBlock e atribui ao elemento o display:none (Esconde o elemento)
 * Recebe como parametro o idLink e muda a funcao do onclick do elemento
 * @param {type} idBlock
 * @param {type} idLink
 * @returns {undefined}
 */
function esconder(idBlock,idLink){
    document.getElementById(idBlock).style.display="none";
    if(tipo1 == "contato"){
        document.getElementById(idLink).setAttribute('onclick', 'mostrar("contato","btnContato")');
    }else{
        document.getElementById(idLink).setAttribute('onclick', 'mostrar("empresa","btnEmpresa")');
    }
}

/**
 * Valida os campos do formulario do pesquisado com JavaScript
 * @param {type} cadastro
 * @returns {Boolean}
 */
function validar(cadastro){
    if(cadastro.nome.value == ""){
        alert('Preenche com o seu nome!');
        document.getElementById("nome").style.border="1px solid #F00";
        cadastro.nome.focus();
        return false;
    }else{
        document.getElementById("nome").style.border="none";
        document.getElementById("cpf").style.border="none";
        document.getElementById("cargo").style.border="none";
    }
    
    regExp = /^[0-9]{3}\.[0-9]{3}\.[0-9]{3}-[0-9]{2}$/;
    if(cadastro.cpf.value == "" || regExp.test(cadastro.cpf.value) == false ){
        alert('Preenche o numero de CPF!');
        document.getElementById("cpf").style.border="1px solid #F00";
        cadastro.cpf.focus();
        return false;
    }else{
        document.getElementById("nome").style.border="none";
        document.getElementById("cpf").style.border="none";
        document.getElementById("cargo").style.border="none";
    }
    if(cadastro.cargo.value == ""){
        alert('Preenche o seu cargo atual da empresa!');
        document.getElementById("cargo").style.border="1px solid #F00";
        cadastro.cargo.focus();
        return false;
    }else{
        document.getElementById("nome").style.border="none";
        document.getElementById("cpf").style.border="none";
        document.getElementById("cargo").style.border="none";
    }
}