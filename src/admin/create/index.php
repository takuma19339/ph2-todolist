<?php
require __DIR__. '/../dbconnect.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!empty($_POST['title'])) {
        $title = $_POST['title'];
        $stmt = $dbh->prepare("INSERT INTO todos (title, completed) VALUES (:title, 0)");
        $stmt->bindParam(':title', $title);
        $stmt->execute();
    }else{
        echo "タイトルを入力してください。";
    }
    header('Location: ../index.php');
    exit();
}
?>