<?php
require __DIR__. '/dbconnect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post">
        <input id="add" type="text" name="add" placeholder="新しいToDoを入力してください" />
        <button type="submit" id="add-btn">追加</button>
    </form>
    <ul id="todo-list">
        <?php
        foreach($dbh->query("SELECT * FROM todos") as $row){?>
        <li class="todo">
            <p><? echo $row['title']."　";?></p>
            <form method="post" action="./update/index.php" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?php echo $row['id']; ?>" />
                <button type="submit" id="completed-btn"><?php if($row['completed']===true){echo"complete";}elseif($row['completed']===false){echo"uncomplete";};?></button>
            </form>
            <form method="post" action="./edit/index.php" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?php echo $row['id']; ?>" />
                <button type="submit" id="edit-btn">edit</button>
            </form>
            <form method="post" action="./delete/index.php" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?php echo $row['id']; ?>" />
                <button type="submit" id="delete-btn">delete</button>
            </form>
        <?}?>
</body>
</html>
