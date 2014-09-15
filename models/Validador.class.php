<?php

/**
 * Valida os inputs do formulario do pesquisado
 */
class Validador {

    /**
     * Verifica se o INPUT recebeu algum valor
     * @param type $input
     * @return boolean
     */
    function ehVazio($input) {
        # Retorna TRUE caso o campo esteja vazio
        if (!$input) {
            return true;
        } else {
            return false;
        }
    }

    function validaCPF($input) {
        # Retorna TRUE caso o CPF esteja no formato incorreto
        if (!preg_match("/^[0-9]{3}\.[0-9]{3}\.[0-9]{3}-[0-9]{2}$/", $input)) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Recebe a quantidade de campos vazios e seus repectiveis nomes para montar a mensagem de erro
     */
    function camposVazios($qtdVazio, $inputVazio) {
        # Caso a quantidade de campos vazio seja 1 retorna a mensagem no singular
        if ($qtdVazio == 1) {
            return "O campo " . $inputVazio[0] . " não foi preenchido ou está preenchido de forma incorreta.";
        } 
        # Caso a quantidade de campos vazios seja maior que 1 retorna a mensagem no plural
        else {
            $inputs = $inputVazio[0];
            for ($erros = 1; $erros < $qtdVazio; $erros++) {
                
                # Se o laço FOR for igual a quantidade de campos vazios -1, atribui o 'e' na concatenação do INPUTS
                if ($erros == $qtdVazio - 1) {
                    $inputs = $inputs . " e " . $inputVazio[$erros];
                } 
                # Se o laço FOR for diferente a quantidade de campos vazios -1, atribui a ',' na concatenação do INPUTS
                else {
                    $inputs = $inputs . ", " . $inputVazio[$erros];
                }
            }
            return "Os campos $inputs não foram preenchidos ou estão preenchidos de forma incorreta.";
        }
    }

}
