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
    <section id="adicionado">
        <?php
        include "functions/add_pesq_main.php";
        ?>
    </section>
    
</div>

<?php
include 'includes/rodape.php';