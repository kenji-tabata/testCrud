<?php include '../includes/topo.php'; ?>
<div id="content_main">
    <nav>
        <ul>
            <li><a href="pesq-form.php" title="Inserir">Inserir pesquisado</a></li>
            <li><a href="pesq-index.php" title="Listar">Listar pesquisado</a></li>
        </ul>
    </nav>
    <section id="index">
        <h1>Listar Pesquisados</h1>
        <table border="1px">
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Sexo</th>
                <th>CPF</th>
                <th>Cargo</th>
                <th>Status</th>
                <th>Oculto</th>
                <th>OP</th>
            </tr>
            <?php foreach ($view->pesquisados as $pesquisado): ?>
                <tr>
                    <td><?php echo $pesquisado->id; ?></td>
                    <td><?php echo $pesquisado->nome; ?></td>
                    <td><?php echo $pesquisado->sexo; ?></td>
                    <td><?php echo $pesquisado->cpf; ?></td>
                    <td><?php echo $pesquisado->cargo; ?></td>
                    <td><?php echo $pesquisado->status; ?></td>
                    <td><?php echo ($pesquisado->oculto == 0) ? "Não" : "Sim"; ?></td>
                    <td>
                        <a href="/deletar(<?php echo $pesquisado->id; ?>)" title="Deletar" data-id="<?php echo $pesquisado->id; ?>">
                            <img src="../imagens/del.png" title="Deletar" alt="Deletar">
                        </a>
                        
                        <a href="/abrir-formulario(<?php echo $pesquisado->id; ?>)" title="Editar" data-id="<?php echo $pesquisado->id; ?>">
                            <img src="../imagens/edit.png" title="Editar" alt="Editar">
                        </a>
                    </td>
                </tr>
            <?php endforeach ?>
        </table>
    </section>
</div>

<script type="text/javascript" src="../controllers/pesq-index.js"></script>

<?php
include '../includes/rodape.php';

