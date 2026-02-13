<?php
    require __DIR__. '/../dbconnect.php';
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if(isset($_POST['id'])){
        $id = $_POST['id'];
        $stmt = $dbh->prepare("UPDATE todos SET completed = NOT completed WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        }else{
        echo "IDが指定されていません。";
        }
    header('Location: /admin/index.php');
    exit();
    }