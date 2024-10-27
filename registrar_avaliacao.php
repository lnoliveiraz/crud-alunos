<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $aluno_id = $_POST['aluno_id'];
    $disciplina_id = $_POST['disciplina_id'];
    $nota = $_POST['nota'];

    $stmt = $conn->prepare("INSERT INTO avaliacoes (aluno_id, disciplina_id, nota) VALUES (:aluno_id, :disciplina_id, :nota)");
    $stmt->bindParam(':aluno_id', $aluno_id);
    $stmt->bindParam(':disciplina_id', $disciplina_id);
    $stmt->bindParam(':nota', $nota);
    $stmt->execute();

    echo "Avaliação registrada com sucesso!";
}
?>

<form method="POST">
    ID do Aluno: <input type="number" name="aluno_id">
    ID da Disciplina: <input type="number" name="disciplina_id">
    Nota: <input type="number" step="0.01" name="nota">
    <button type="submit">Registrar</button>
</form>