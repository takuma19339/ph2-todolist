<?php
require __DIR__. '/../dbconnect.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!empty($_POST['title'])) {
        $title = $_POST['title'];
        $id = $_POST['id'];
        $stmt = $dbh->prepare("UPDATE todos SET title = :title WHERE id = :id");
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }else{
        echo "タイトルを入力してください。";
    }
    header('Location: /admin/index.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../style/css/reset.css">
    <link rel="stylesheet" href="../../style/css/style.css">
</head>
<body>
    <h1>ToDo編集</h1>
    <form method="post" action="./index.php">
        <?php
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $stmt = $dbh->prepare("SELECT * FROM todos WHERE id = :id");
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            $todo = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($todo) {
                ?>
                <input type="hidden" name="id" value="<?php echo htmlspecialchars($todo['id'], ENT_QUOTES, 'UTF-8'); ?>" />
                <input id="edit" class="edit-input" type="text" name="title" value="<?php echo htmlspecialchars($todo['title'], ENT_QUOTES, 'UTF-8'); ?>" required/><br />
                <button type="submit" id="edit-btn">更新</button>
                <?php
            } else {
                echo "指定されたToDoは存在しません。";
            }
        } else {
            echo "ToDoのIDが指定されていません。";
        }
        ?>
    </form>


