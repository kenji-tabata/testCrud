<?php include '../includes/topo.php'; ?>
<div id="content_main">
    <nav>
        <ul>
            <li><a href="pesq-form.php">Cadastrar novo pesquisado</a></li>
            <li><a href="pesq-index.php">Listar pesquisado</a></li>
        </ul>
    </nav>
    <section id="cadastro">

        <?php
        if ($idPesq) {
            echo "<h1>Alterar Pesquisado</h1>";
            echo "<form name='formEditar' action='../controllers/pesq-form-action.php?id=$idPesq' method='POST' onsubmit='return validar(this);'>";
        } else {
            echo "<h1>Inserir de Pesquisados</h1>";
            echo "<form id='formCadastro' name='cadastro' action='../controllers/pesq-form-action.php' method='POST' onsubmit='return validar(this);'>";
            $oculto = 0;
            $nome = "";
            $sexo = "M";
            $cpf = "";
            $cargo = "";
        }
        ?>
        <fieldset>
            <legend>Dados Pessoais</legend>
            <div class="rotulo"><label for="oculto">Oculto: </label></div>
            <div class="entrada">
                <?php
                if ($oculto == 0) {
                    echo "<input type='radio' name='oculto' value='1' > Sim";
                    echo "<input type='radio' id='oculto' name='oculto' value='0' checked> Não";
                } else {
                    echo "<input type='radio' id='oculto' name='oculto' value='1' checked> Sim";
                    echo "<input type='radio' name='oculto' value='0'> Não";
                }
                ?>
            </div>
            <div class="rotulo"><label for="nome">Nome: </label></div>
            <div class="entrada"><input type="text" id="nome" name="nome" placeholder="Nome completo" value="<?php echo "$nome"; ?>"/></div>
            <div class="rotulo"><label for="sexo">Sexo: </label></div>
            <div class="entrada">
                <?php
                if ($sexo == "M") {
                    echo "<input type='radio' id='sexo' name='sexo' value='M' checked> Masculino";
                    echo "<input type='radio' name='sexo' value='F'> Feminino";
                } else {
                    echo "<input type='radio' id='sexo' name='sexo' value='M'> Masculino";
                    echo "<input type='radio' name='sexo' value='F' checked> Feminino";
                }
                ?>
            </div>
            <div class="rotulo"><label for="cpf">CPF: </label></div>
            <div class="entrada"><input type="text" id="cpf" name="cpf" placeholder="000.000.000-00" value="<?php echo "$cpf"; ?>"/></div>
            <div class="rotulo"><label for="cargo">Cargo: </label></div>
            <div class="entrada"><input type="text" id="cargo" name="cargo" placeholder="Cargo da Empresa" value="<?php echo "$cargo"; ?>"/></div>
            <?php
            if ($idPesq != "") {
                echo "<input type='hidden' name='id' id='id' value='$id' />";
            }
            ?>

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

<?php
include '../includes/rodape.php';
