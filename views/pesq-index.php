<?php
include '../includes/topo.php';
?>
<div id="content_main">
    <nav>
        <ul>
            <li><a href="pesq-form.php">Cadastrar novo pesquisado</a></li>
            <li><a href="pesq-index.php">Listar pesquisado</a></li>
        </ul>
    </nav>
    <section id="index">
        <h1>Listar Pesquisados</h1>
        <?php echo $lista ?>
    </section>
</div>

<?php
include '../includes/rodape.php';
