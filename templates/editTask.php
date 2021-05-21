<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Blaster</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
<header>
    <h1>task blaster</h1>
</header>
<nav>
    <a href="/">Uncompleted</a>
    <a href="/completed">Completed</a>
</nav>
<form action="/edit" method="post" id="newTaskInputForm">
    <input type="text" name="newTaskContent" id="newTaskContent" placeholder="Update your task...">
    <input type="hidden" name="id" value="<?php echo $id ?>">
    <input type="submit" id="submitNewTaskButton" value="&#8594">
</form>
</body>
</html>
