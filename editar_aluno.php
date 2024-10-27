<?php
include 'db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $conn->prepare("SELECT * FROM alunos WHERE id = :id");
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $aluno = $stmt->fetch();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];

    $stmt = $conn->prepare("UPDATE alunos SET nome = :nome, email = :email WHERE id = :id");
    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':id', $id);
    $stmt->execute();

    header("Location: listar_alunos.php");
}

?>

<form method="POST">
    <input type="hidden" name="id" value="<?php echo $aluno['id']; ?>">
    Nome: <input type="text" name="nome" value="<?php echo $aluno['nome']; ?>">
    Email: <input type="email" name="email" value="<?php echo $aluno['email']; ?>">
    <button type="submit">Atualizar</button>
</form>