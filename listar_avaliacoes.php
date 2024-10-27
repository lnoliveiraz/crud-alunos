<?php
include 'db.php';

$stmt = $conn->query("SELECT avaliacoes.id, alunos.nome AS aluno, disciplinas.nome AS disciplina, avaliacoes.nota 
                      FROM avaliacoes
                      JOIN alunos ON avaliacoes.aluno_id = alunos.id
                      JOIN disciplinas ON avaliacoes.disciplina_id = disciplinas.id");
$avaliacoes = $stmt->fetchAll();

foreach ($avaliacoes as $avaliacao) {
    echo "ID: " . $avaliacao['id'] . " - Aluno: " . $avaliacao['aluno'] . " - Disciplina: " . $avaliacao['disciplina'] . " - Nota: " . $avaliacao['nota'];
    echo " <a href='editar_avaliacao.php?id=" . $avaliacao['id'] . "'>Editar</a>";
    echo " | <a href='excluir_avaliacao.php?id=" . $avaliacao['id'] . "'>Excluir</a><br>";
}
?>