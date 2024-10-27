<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];

    $stmt = $conn->prepare("INSERT INTO disciplinas (nome) VALUES (:nome)");
    $stmt->bindParam(':nome', $nome);
    $stmt->execute();

    echo "Disciplina cadastrada com sucesso!";
}
?>

<form method="POST">
    Nome da Disciplina: <input type="text" name="nome">
    <button type="submit">Cadastrar</button>
</form>