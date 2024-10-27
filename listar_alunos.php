<?php
include 'db.php';

$stmt = $conn->query("SELECT * FROM alunos");
$alunos = $stmt->fetchAll();

foreach ($alunos as $aluno) {
    echo "ID: " . $aluno['id'] . " - Nome: " . $aluno['nome'] . " - Email: " . $aluno['email'];
    echo " <a href='editar_aluno.php?id=" . $aluno['id'] . "'>Editar</a>";
    echo " | <a href='excluir_aluno.php?id=" . $aluno['id'] . "'>Excluir</a><br>";
}
?>