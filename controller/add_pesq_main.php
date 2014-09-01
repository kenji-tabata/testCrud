<?php
include '../view/topo_pesq.php';
?>
<div id="content_main">
    <nav>
        <ul>
            <li><a href="../index.php" onclick="mostrar('adicionado', 'listar')">Cadastrar novo pesquisado</a></li>
            <li><a href="#listar" onclick="mostrar('listar', 'adicionado')">Listar pesquisado</a></li>
        </ul>
    </nav>
    <section id="adicionado">
        <?php
        
            $oculto = mysqli_real_escape_string($conecta,$_POST['oculto']);
            $nome = mysqli_real_escape_string($conecta,$_POST['nome']);
            $sexo = mysqli_real_escape_string($conecta,$_POST['sexo']);
            $cpf = mysqli_real_escape_string($conecta,$_POST['cpf']);
            $cargo = mysqli_real_escape_string($conecta,$_POST['cargo']);
            $status = "Não preenchido";
            $qtd_erro = 0;
            $campo_branco = "";

            if ($nome == "" || $nome == null) {
                $qtd_erro += 1;
                $campo_branco .= "Nome ";
            }

            if (!preg_match("/^[0-9]{3}\.[0-9]{3}\.[0-9]{3}-[0-9]{2}$/", $cpf)) {
                $qtd_erro += 1;
                $campo_branco .= "CPF ";
            }

            if ($cargo == "" || $cargo == null) {
                $qtd_erro += 1;
                $campo_branco .= "Cargo ";
            }
            if ($qtd_erro == 0) {
                require_once 'controller/conexao.php';

                mysqli_query($conecta, "INSERT INTO pesq_main values (,,'$status','$oculto','$nome','$sexo','$cpf','$cargo')");

                mysqli_close($conecta);

                echo "Pesquisado adicionado com sucesso!";
            } else {
                if ($qtd_erro == 1) {
                    echo "O campo $campo_branco não foi preenchido ou está preenchido de forma incorreta, volte e preencha novamente<br/><br/>"
                    . "<a href='javascript:window.history.go(-1)'>Voltar</a>";
                } else {
                    $campo_erro = explode(" ", $campo_branco);
                    $cont_erro = 0;
                    echo "Os campos ";
                    for ($erros = 1; $erros <= $qtd_erro; $erros++) {
                        if ($erros == 1) {
                            echo "$campo_erro[$cont_erro]";
                            $cont_erro++;
                        } elseif ($erros < $qtd_erro) {
                            echo ", $campo_erro[$cont_erro]";
                            $cont_erro++;
                        } else {
                            echo " e $campo_erro[$cont_erro]";
                            $cont_erro++;
                        }
                    }
                    echo " não foram preenchidos ou estão preencidos de forma incorreta, volte e preencha novamente<br/><br/>"
                    . "<a href='javascript:window.history.go(-1)'>Voltar</a>";
                }
            }
        
        ?>
    </section>
    <section id="listar">
        <h1>Listar Pesquisados</h1>
        <?php
        include "listar_pesq_main.php";
        ?>
    </section>
</div>

<?php
include '../view/rodape.php';
