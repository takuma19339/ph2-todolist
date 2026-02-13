<?php
    require __DIR__. '/../dbconnect.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['id'])) {
        $id = $_POST['id'];
        $stmt = $dbh->prepare("DELETE FROM todos WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }
    header('Location: /admin/index.php');
    exit();
}