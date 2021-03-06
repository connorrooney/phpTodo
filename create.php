<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <link rel="stylesheet" href="main.css">
    <title>ToDo List</title>
</head>
<body>
<div>
    <a href="index.php"><i class="fas fa-chevron-left header"></i></a>
</div>
    <div class="wrapper">
        <div class="title"><h1>New Item</h1>
        <hr>
        <form method="POST" action="create.php">
            <h3>Title:</h3>
            <input name="todoTitle" type="text">
            <br>
            <h3>Description:</h3>
            <input name="todoDesc" type="text">
            <br>
            <input class="newItem" type="submit" name="submit" value="Create Item">
        </form>
        </div>
        
    </div>
</body>

<?php
require_once("db_connect.php");
if(isset($_POST['submit'])) {
    $title = $_POST['todoTitle'];
    $desc = $_POST['todoDesc'];
    db();
    global $link;
    $query = "INSERT INTO todo(todoTitle, todoDesc, date) VALUES ('$title', '$desc', now())";
    $insertTodo = mysqli_query($link, $query);
    if($insertTodo) {
        echo "Submitted Succesfully";
    } else {
        echo "An error has occoured:" . mysqli_error($link);
    }
    mysqli_close($link);
}
?>
</html>