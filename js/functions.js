function mostrar(tipo1,tipo2){
    document.getElementById(tipo1).style.display="block";
    if(tipo1 == "contato"){
        document.getElementById(tipo2).setAttribute('onclick', 'esconder("contato","btnContato")');
    }else{
        document.getElementById(tipo2).setAttribute('onclick', 'esconder("empresa","btnEmpresa")');
    }
}

function esconder(tipo1,tipo2){
    document.getElementById(tipo1).style.display="none";
    if(tipo1 == "contato"){
        document.getElementById(tipo2).setAttribute('onclick', 'mostrar("contato","btnContato")');
    }else{
        document.getElementById(tipo2).setAttribute('onclick', 'mostrar("empresa","btnEmpresa")');
    }
}

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