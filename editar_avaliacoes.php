<?php
include 'db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $conn->prepare("SELECT * FROM avaliacoes WHERE id = :id");
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $avaliacao = $stmt->fetch();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $nota = $_POST['nota'];

    $stmt = $conn->prepare("UPDATE avaliacoes SET nota = :nota WHERE id = :id");
    $stmt->bindParam(':nota', $nota);
    $stmt->bindParam(':id', $id);
    $stmt->execute();

    header("Location: listar_avaliacoes.php");
}

?>

<form method="POST">
    <input type="hidden" name="id" value="<?php echo $avaliacao['id']; ?>">
    Nota: <input type="number" step="0.01" name="nota" value="<?php echo $avaliacao['nota']; ?>">
    <button type="submit">Atualizar</button>
</form>