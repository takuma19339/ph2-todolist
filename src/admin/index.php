<?php
require __DIR__. '/dbconnect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../style/css/reset.css">
    <link rel="stylesheet" href="../style/css/style.css">
</head>
<body>
    <form method="post" action="./create/index.php">
        <input id="add" type="text" name="title" placeholder="新しいToDoを入力してください" required/><br />
        <button type="submit" id="add-btn">追加</button>
    </form>
    <ul id="todo-list">
        <?php
        foreach($dbh->query("SELECT * FROM todos") as $row){?>
        <li class="todo">
            <div class="title"><?php echo $row['title']."　";?></div>
            <div class="btn">
            <form method="post" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?php echo $row['id']; ?>" />
                <button type="submit" id="completed-btn"><?php echo $row['completed'] ? "complete" : "uncomplete"; ?></button>
            </form>
            <form method="post" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?php echo $row['id']; ?>" />
                <button type="submit" id="edit-btn">edit</button>
            </form>
            <form method="post" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?php echo $row['id']; ?>" />
                <button type="submit" id="delete-btn">delete</button>
            </form>
        </div>
    </li>
        <?}?>
</body>
</html>
