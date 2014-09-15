<?php include '../includes/topo.php'; ?>
<div id="content_main">
    <nav>
        <ul>
            <li><a href="pesq-form.php">Inserir pesquisado</a></li>
            <li><a href="pesq-index.php">Listar pesquisado</a></li>
        </ul>
    </nav>
    <section id="cadastro">
 <!--onsubmit="return validar(this);"-->
        <h1><?php echo ($idPesq) ? "Alterar Pesquisado" : "Inserir Pesquisados"; ?></h1>

        <form name="form" id="form" action="<?php echo $view->urlAction ?>" method="post">
            <fieldset>
                <legend>Dados Pessoais</legend>
                <p><?php echo $view->msgErro; ?></p>
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
                           value="<?php echo $view->pesquisado->nome; ?>"/></div>
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
                <legend id="btnContato" class="toggle" onclick="mostrar('contato', 'btnContato');">Contatos Pessoais</legend>
                <div id="contato" class="toggleDiv">
                    <div class="rotulo"><label for="nascimento">Data de Nascimento: </label></div>
                    <div class="entrada"><input type="date" id="nascimento" value=""/></div>
                    <div class="rotulo"><label for="email">E-mail: </label></div>
                    <div class="entrada"><input type="email" id="email" placeholder="Endereço de e-mail" value=""/></div>
                    <div class="rotulo"><label for="tel_res">Telefone Residencial: </label></div>
                    <div class="entrada"><input type="text" id="tel_res" placeholder="0000-0000" maxlength="9" value=""/></div>
                    <div class="rotulo"><label for="tel_cel">Telefone Celular: </label></div>
                    <div class="entrada"><input type="tel" id="tel_cel" placeholder="0000-0000" maxlength="9" value=""/></div>
                    <div class="rotulo"><label for="tel_com">Telefone Comercial: </label></div>
                    <div class="entrada"><input type="text" id="tel_com" placeholder="00000-0000" maxlength="10" value=""/></div>
                    <div class="rotulo"><label for="endereco">Endereço: </label></div>
                    <div class="entrada"><input type="text" id="endereco" placeholder="Rua, Avenida e etc." value=""/></div>
                    <div class="rotulo"><label for="cidade">Cidade: </label></div>
                    <div class="entrada"><input type="text" id="cidade" placeholder="Cidade" value=""/></div>
                    <div class="rotulo"><label for="uf">Estado: </label></div>
                    <div class="entrada"><input type="text" id="uf" maxlength="2" value=""/></div>
                </div>
            </fieldset>
            <fieldset>
                <legend id="btnEmpresa" class="toggle" onclick="mostrar('empresa', 'btnEmpresa');">Dados da Empresa</legend>
                <div id="empresa" class="toggleDiv">
                    <div class="rotulo"><label for="formacao">Formação Acadêmica: </label></div>
                    <div class="entrada"><input type="text" id="formacao" placeholder="Grau de Estudo" value=""/></div>
                    <div class="rotulo"><label for="empresa">Empresa: </label></div>
                    <div class="entrada"><input type="text" id="empresa" placeholder="Nome da Empresa" value=""/></div>
                    <div class="rotulo"><label for="admissao">Data de Admissão: </label></div>
                    <div class="entrada"><input type="date" id="admissao" value=""/></div>
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
</div>

<script type="text/javascript" src="pesq-form.js"></script>

<?php
include '../includes/rodape.php';
