        <div id="content_main">
            <nav>
                <ul>
                    <li><a href="#cadastro" onclick="mostrar('cadastro', 'listar')">Cadastrar novo usuário</a></li>
                    <li><a href="#listar" onclick="mostrar('listar', 'cadastro')">Listar usuários</a></li>
                </ul>
            </nav>
            <section id="cadastro">
                <h1>Cadastro de Usuário</h1>
                <fieldset>
                    <legend>Dados Pessoais</legend>
                    <div class="rotulo"><label for="oculto">Oculto: </label></div>
                    <div class="entrada">
                        <input type="radio" id="oculto" name="oculto" value="0"> Sim
                        <input type="radio" name="oculto" value="1"> Não
                    </div>
                    <div class="rotulo"><label for="nome">Nome: </label></div>
                    <div class="entrada"><input type="text" id="nome" placeholder="Nome completo"/></div>
                    <div class="rotulo"><label for="sexo">Sexo: </label></div>
                    <div class="entrada">
                        <input type="radio" id="sexo" name="sexo" value="M"> Masculino
                        <input type="radio" name="sexo" value="F"> Feminino
                    </div>
                    <div class="rotulo"><label for="cpf">CPF: </label></div>
                    <div class="entrada"><input type="text" id="cpf" placeholder="Cidade"/></div>
                    <div class="rotulo"><label for="nascimento">Data de Nascimento: </label></div>
                    <div class="entrada"><input type="date" id="nascimento"/></div>
                    <div class="rotulo"><label for="formacao">Formação Acadêmica: </label></div>
                    <div class="entrada"><input type="text" id="formacao" placeholder="Grau de Estudo"/></div>
                </fieldset>
                <fieldset>
                    <legend>Contatos Pessoais</legend>
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
                    <div class="rotulo"><label for="empresa">Empresa: </label></div>
                    <div class="entrada"><input type="text" id="empresa" placeholder="Nome da Empresa"/></div>
                    <div class="rotulo"><label for="cargo">Cargo: </label></div>
                    <div class="entrada"><input type="text" id="cargo" placeholder="Cargo da Empresa"/></div>
                    <div class="rotulo"><label for="admissao">Data de Admissão: </label></div>
                    <div class="entrada"><input type="date" id="admissao"/></div>
                </fieldset>
                <fieldset>
                    <div class="rotulo">
                        <input type="submit" value="Enviar">
                        <input type="reset" value="Limpar">
                    </div>
                </fieldset>
            </section>
            <section id="listar">
                <h1>Listar Usuários</h1>
                <?php
                    $sql = "select * from pesq_main";
                    $result = mysql_query($sql,$con);
                    
                    while($consulta = mysql_fetch_array($result)){
                        echo "$consulta[nome]";
                    }
                    mysql_free_result($result); 
                    mysql_close($conecta); 
                ?>
            </section>
        </div>
