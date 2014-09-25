<?php

/**
 * Valida os inputs do formulario do pesquisado
 */
class Validador {

    /**
     * Verifica se o $input é vazio ou não
     *
     * @param type $input
     * @return boolean
     */
    function ehVazio($input) {
        # Se for vazio...
        if (!$input) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Verifica se é um formato de CPF válido
     *
     * @param type $input
     * @return boolean
     */
    function validaCPF($input) {
        # Se casar...
        if (preg_match("/^[0-9]{3}\.[0-9]{3}\.[0-9]{3}-[0-9]{2}$/", $input)) {
            return true;
        } else {
            return false;
        }
    }

//    function validaEmail($input) {
//        # Se casar...
//        if (preg_match("/^(([0-9a-zA-Z]+[-._+&])*[0-9a-zA-Z]+@([-0-9a-zA-Z]+[.])+[a-zA-Z]{2,6}){0,1}$/", $input)) {
//            return true;
//        } else {
//            return false;
//        }
//    }
    
    function validaTel($input) {
        # Se casar...
        if (preg_match("^\(+[0-9]{2,3}\) [0-9]{4}-[0-9]{4}$^", $input)) {
            return true;
        } else {
            return false;
        }
    }
    function validaCel($input) {
        # Se casar...
        if (preg_match("^\(+[0-9]{2,3}\) [0-9]{5}-[0-9]{4}$^", $input)) {
            return true;
        } else {
            return false;
        }
    }
    
//    function validaData($input) {
//        # Se casar...
//        if (preg_match('/^\d{1,2}\/\d{1,2}\/\d{4}$/', $input)) {
//            return true;
//        } elseif(preg_match('/^\d{4}\-\d{1,2}\-\d{1,2}$/', $input)) {
//            return true;
//        } else{
//            return false;
//        }
//    }
    
//    function validaCep($input) {
//        # Se casar...
//        if (preg_match('/^[0-9]{5}-[0-9]{3}$/', $input)) {
//            return true;
//        } else{
//            return false;
//        }
//    }
    
    /**
     * Recebe os campos que estão em branco e retorna uma mensagem
     */
    function camposVazios($emBranco) {
        $resp = json_decode($emBranco);
        
        # Se a quantidade de campos que esta em branco for 1, retorna a mensagem no singular
        if(count($resp->campos) == 1){
            return "O campo " . $resp->campos[0]->campo . " não foi preenchido ou está preenchido de forma incorreta.";
        } 
        # Se a quantidade de campos que estão em branco for maior que 1, retorna a mensagem no plural
        else {
            # Primeiro campo que esta em branco
            $input = $resp->campos[0]->campo;
            # Campos em brancos restantes
            for ($e = 1; $e < count($resp->campos); $e++){
                # Se for o penúltimo elemento coloca o " e " antes do último elemento 
                if ($e == count($resp->campos) -1){
                    $input = $input . " e " . $resp->campos[$e]->campo;
                } 
                # Se existir mais elementos coloca a ", " antes do próximo elemento
                else {
                    $input = $input . ", " . $resp->campos[$e]->campo;
                }
            }
            return "Os campos $input não foram preenchidos ou estão preenchidos de forma incorreta!";
        }
    }

}
