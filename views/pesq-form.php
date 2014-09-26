    <section id="index">
        <h1><?php echo ($idPesq) ? "Alterar Pesquisado" : "Inserir Pesquisados"; ?></h1>

        <form name="form" id="form" action="<?php echo $view->urlAction ?>" method="post">
            <fieldset>
                <legend>Dados Pessoais</legend>
                <input type="hidden" value="<?php echo $pesquisado->id?>" id="id"/>
                <div id="msgErro"></div>
                <div class="rotulo"><label for="oculto">Oculto: </label></div>
                <div class="entrada">
                    <label for="sim">
                        <input type="radio" name="oculto" id="sim" value="1" 
                               <?php echo ($view->pesquisado->oculto == 1) ? "checked" : ""; ?> /> Sim</label>
                    <label for="nao">
                        <input type="radio" name="oculto" id="nao" value="0"
                               <?php echo ($view->pesquisado->oculto == 0) ? "checked" : ""; ?> /> Não</label>
                </div>
                <div class="rotulo"><label for="nome">Nome: </label></div>
                <div class="entrada">
                    <input type="text" id="nome" name="nome" placeholder="Nome completo" 
                           value="<?php echo $view->pesquisado->nome; ?>"/>
                </div>
                <div class="rotulo">Sexo: </div>
                <div class="entrada">
                    <label for="masc">
                        <input type="radio" id="masc" name="sexo" value='M' 
                               <?php echo ($view->pesquisado->sexo == "M") ? "checked" : ""; ?> /> Masculino</label>
                    <label for="fem">
                        <input type="radio" id="fem" name="sexo" value='F' 
                               <?php echo ($view->pesquisado->sexo == "F") ? "checked" : ""; ?> /> Feminino</label>
                </div>
                <div class="rotulo"><label for="cpf">CPF: </label></div>
                <div class="entrada">
                    <input type="text" id="cpf" name="cpf" placeholder="000.000.000-00" 
                           value="<?php echo $view->pesquisado->cpf; ?>"/></div>
                <div class="rotulo"><label for="cargo">Cargo: </label></div>
                <div class="entrada">
                    <input type="text" id="cargo" name="cargo" placeholder="Cargo da Empresa" 
                           value="<?php echo $view->pesquisado->cargo; ?>"/></div>
            </fieldset>
            <fieldset>
                <legend id="btnContato" class="toggle">Contatos Pessoais</legend>
                <div id="contato" class="toggleDiv">
                    <input type="hidden" value="<?php echo $pesquisado->id_pesq ?>" id="id_pesq"/>
                    <div class="rotulo"><label for="nascimento">Data de Nascimento: </label></div>
                    <div class="entrada"><input type="text" id="nascimento" name="dt_nasc" placeholder="0000-00-00" value="<?php echo $view->pesquisado->dt_nasc; ?>"/></div>
                    <div class="rotulo"><label for="email">E-mail: </label></div>
                    <div class="entrada"><input type="email" id="email" name="email" placeholder="Endereço de e-mail" value="<?php echo $view->pesquisado->email; ?>"/></div>
                    <div class="rotulo"><label for="tel_res">Telefone Residencial: </label></div>
                    <div class="entrada"><input type="text" id="tel_res" name="telefone_res" placeholder="(000)0000-0000" maxlength="16" value="<?php echo $view->pesquisado->telefone_res; ?>"/></div>
                    <div class="rotulo"><label for="tel_cel">Telefone Celular: </label></div>
                    <div class="entrada"><input type="tel" id="tel_cel" name="telefone_cel" placeholder="(000) 0000-0000" maxlength="17" value="<?php echo $view->pesquisado->telefone_cel; ?>"/></div>
                    <div class="rotulo"><label for="tel_com">Telefone Comercial: </label></div>
                    <div class="entrada"><input type="text" id="tel_com" name="telefone_com" placeholder="(000) 0000-0000" maxlength="16" value="<?php echo $view->pesquisado->telefone_com; ?>"/></div>
                    <div class="rotulo"><label for="endereco">Endereço: </label></div>
                    <div class="entrada"><input type="text" id="endereco" name="endereco" placeholder="Rua, Avenida e etc." value="<?php echo $view->pesquisado->endereco; ?>"/></div>
                    <div class="rotulo"><label for="cidade">Bairro: </label></div>
                    <div class="entrada"><input type="text" id="bairro" name="bairro" placeholder="Bairro" value="<?php echo $view->pesquisado->bairro; ?>"/></div>
                    <div class="rotulo"><label for="cidade">Cidade: </label></div>
                    <div class="entrada"><input type="text" id="cidade" name="cidade" placeholder="Cidade" value="<?php echo $view->pesquisado->cidade; ?>"/></div>
                    <div class="rotulo"><label for="uf">Estado: </label></div>
                    <div class="entrada"><input type="text" id="uf" name="uf" placeholder="Estado" maxlength="2" value="<?php echo $view->pesquisado->uf; ?>"/></div>
                    <div class="rotulo"><label for="cep">CEP: </label></div>
                    <div class="entrada"><input type="text" id="cep" name="cep" placeholder="00000-000" maxlength="9" value="<?php echo $view->pesquisado->cep; ?>"/></div>
                </div>
            </fieldset>
            <fieldset>
                <legend id="btnEmpresa" class="toggle">Dados da Empresa</legend>
                <div id="pessoal" class="toggleDiv">
                    <div class="rotulo"><label for="formacao">Formação Acadêmica: </label></div>
                    <div class="entrada"><input type="text" id="formacao" name="formacao" placeholder="Grau de Estudo" value="<?php echo $view->pesquisado->formacao; ?>"/></div>
                    <div class="rotulo"><label for="empresa">Empresa: </label></div>
                    <div class="entrada"><input type="text" id="empresa" name="empresa" placeholder="Nome da Empresa" value="<?php echo $view->pesquisado->empresa; ?>"/></div>
                    <div class="rotulo"><label for="admissao">Data de Admissão: </label></div>
                    <div class="entrada"><input type="date" id="admissao" name="dt_adm" value="<?php echo $view->pesquisado->dt_adm; ?>"/></div>
                </div>
            </fieldset>
            <fieldset>
                <div class="rotulo">
                    <input type="submit" value="Enviar">
                    <input type="reset" value="Limpar">
                </div>
            </fieldset>
        </form>
    </section>

<script type="text/javascript" src="controllers/pesq-form.js"></script>