<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $email = $_POST['email'];

    $stmt = $conn->prepare("INSERT INTO alunos (nome, email) VALUES (:nome, :email)");
    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':email', $email);
    $stmt->execute();

    echo "Aluno cadastrado com sucesso!";
}
?>

<form method="POST">
    Nome: <input type="text" name="nome">
    Email: <input type="email" name="email">
    <button type="submit">Cadastrar</button>
</form>