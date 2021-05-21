<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Blaster</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header>
        <h1>task blaster</h1>
    </header>
    <nav>
        <a href="/" <?php if (!$tasks[0]->getIsCompleted()) echo "class='activeLink'" ?> >Uncompleted</a>
        <a href="/completed" <?php if ($tasks[0]->getIsCompleted()) echo "class='activeLink'" ?> >Completed</a>
    </nav>
    <form action="/" method="post" id="newTaskInputForm">
        <input type="text" name="newTaskInput" id="newTaskInput" placeholder="Create a new task...">
        <input type="submit" id="submitNewTaskButton" value="&#8594">
    </form>
    <ul id="taskContainer">
        <?php

        foreach ($tasks as $task) {
            echo
            "<li class='taskItem'>
                    <form action='/mark' method='post' class='markCompleteContainer'>
                        <button name='markComplete' value=" . $task->getId() . " class='markCompleteButton'></button>
                    </form>
                    <p class='taskContent'>" . $task->getTaskContent() . "</p>
                    <div><a href='/edit/" . $task->getId() . "'>&#128295;</a></div>
                    <div><a href='/delete/" . $task->getId() . "'>&#10060;</a></div>
            </li>";
        }

        ?>
    </ul>
</body>
</html>
