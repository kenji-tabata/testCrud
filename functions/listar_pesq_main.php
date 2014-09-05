<?php
include 'conexao.php';

$sql = "SELECT * FROM pesq_main";
$result = mysql_query($sql, $conecta);

echo "<table>"
 . "<tr>"
 . "<th>ID</th>"
 . "<th>Nome</th>"
 . "<th>Sexo</th>"
 . "<th>CPF</th>"
 . "<th>Cargo</th>"
 . "<th>Status</th>"
 . "<th>Oculto</th>"
 . "</tr>";
while ($consulta = mysql_fetch_array($result)) {
    if ($consulta[oculto] == 0) {
        $oculto = "Sim";
    } else {
        $oculto = "Não";
    }
    echo "<tr>"
    . "<td>$consulta[id]</td>"
    . "<td>$consulta[nome]</td>"
    . "<td>$consulta[sexo]</td>"
    . "<td>$consulta[cpf]</td>"
    . "<td>$consulta[cargo]</td>"
    . "<td>$consulta[status]</td>"
    . "<td>$oculto</td>"
    . "</tr>";
}
echo "</table>";
mysql_free_result($result);
mysql_close($conecta);
