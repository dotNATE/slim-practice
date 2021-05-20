<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Blaster</title>
    <link rel="stylesheet" href="<?php echo $_SERVER['DOCUMENT_ROOT'] . "/css/style.css"?>">
</head>
<body>
    <header>
        <h1>task blaster</h1>
    </header>
    <nav>
        <a href="/">Uncompleted</a>
        <a href="/completed">Completed</a>
    </nav>
    <form action="/" method="post">
        <input type="text" name="newTaskInput" id="newTaskInput" placeholder="Create a new task...">
        <input type="submit">
    </form>
    <ul id="taskContainer">
        <?php

        foreach ($tasks as $task) {
            echo "<li class='taskItem'>
                        <form action='/mark' method='post'>
                            <button name='markComplete' value=" . $task->getId() . ">Complete</button>
                        </form>
                        <p>" . $task->getTaskContent() . "</p>
                        <div><a href='/delete/" . $task->getId() . "'>X</a></div>
                      </li>";
        }

        ?>
    </ul>
</body>
</html>
