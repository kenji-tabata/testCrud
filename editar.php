<?php
include 'includes/topo.php';
?>
<div id="content_main">
    <nav>
        <ul>
            <li><a href="cadastro.php">Cadastrar novo pesquisado</a></li>
            <li><a href="listar.php">Listar pesquisado</a></li>
        </ul>
    </nav>
   
    <section id="edicao">
        <h1>Editar Pesquisado</h1>
        <form name="editar" action="editado.php" method="POST">
            <?php include 'functions/show_pesq_main.php' ;?>
            <fieldset>
                <legend>Dados Pessoais</legend>
                <div class="rotulo"><label for="oculto">Oculto: </label></div>
                <div class="entrada">
                    <input type="radio" id="oculto" name="oculto" value="0" checked="<?php echo $oculto == "0" ? "checked" : ""; ?>"> Sim
                    <input type="radio" name="oculto" value="1" checked="<?php echo $oculto == "1" ? "checked" : ""; ?>"> Não
                </div>
                <div class="rotulo"><label for="nome">Nome: </label></div>
                <div class="entrada"><input type="text" id="nome" name="nome" placeholder="Nome completo" value="<?php echo "$nome"; ?>"/></div>
                <div class="rotulo"><label for="sexo">Sexo: </label></div>
                <div class="entrada">
                    <input type="radio" id="sexo" name="sexo" value="M" checked> Masculino
                    <input type="radio" name="sexo" value="F"> Feminino
                </div>
                <div class="rotulo"><label for="cpf">CPF: </label></div>
                <div class="entrada"><input type="text" id="cpf" name="cpf" placeholder="000.000.000-00" value="<?php echo "$cpf"; ?>"/></div>
                <div class="rotulo"><label for="cargo">Cargo: </label></div>
                <div class="entrada"><input type="text" id="cargo" name="cargo" placeholder="Cargo da Empresa" value="<?php echo "$cargo"; ?>"/></div>
            </fieldset>
            <fieldset>
                <legend>Contatos Pessoais</legend>
                <div class="rotulo"><label for="nascimento">Data de Nascimento: </label></div>
                <div class="entrada"><input type="date" id="nascimento"/></div>
                <div class="rotulo"><label for="email">E-mail: </label></div>
                <div class="entrada"><input type="email" id="email" placeholder="Endereço de e-mail"/></div>
                <div class="rotulo"><label for="tel_res">Telefone Residencial: </label></div>
                <div class="entrada"><input type="text" id="tel_res" placeholder="0000-0000" maxlength="9"/></div>
                <div class="rotulo"><label for="tel_cel">Telefone Celular: </label></div>
                <div class="entrada"><input type="tel" id="tel_cel" placeholder="0000-0000" maxlength="9"/></div>
                <div class="rotulo"><label for="tel_com">Telefone Comercial: </label></div>
                <div class="entrada"><input type="text" id="tel_com" placeholder="00000-0000" maxlength="10"/></div>
                <div class="rotulo"><label for="endereco">Endereço: </label></div>
                <div class="entrada"><input type="text" id="endereco" placeholder="Rua, Avenida e etc."/></div>
                <div class="rotulo"><label for="cidade">Cidade: </label></div>
                <div class="entrada"><input type="text" id="cidade" placeholder="Cidade"/></div>
                <div class="rotulo"><label for="uf">Estado: </label></div>
                <div class="entrada"><input type="text" id="uf" maxlength="2"/></div>
            </fieldset>
            <fieldset>
                <legend>Dados da Empresa</legend>
                <div class="rotulo"><label for="formacao">Formação Acadêmica: </label></div>
                <div class="entrada"><input type="text" id="formacao" placeholder="Grau de Estudo"/></div>
                <div class="rotulo"><label for="empresa">Empresa: </label></div>
                <div class="entrada"><input type="text" id="empresa" placeholder="Nome da Empresa"/></div>
                <div class="rotulo"><label for="admissao">Data de Admissão: </label></div>
                <div class="entrada"><input type="date" id="admissao"/></div>
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
include 'includes/rodape.php';