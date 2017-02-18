<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <style>
        .done{
            color: #ccc;
            text-decoration: line-through;
        }
    </style>
</head>
<body>
    <h1>Список задач</h1>
    <form action="/todo" method="post">
        <input type="text" name="title">
        <input type="submit">
    </form>

    <?php if(count($tasks)): ?>
        <hr>
        <form action="/todo/check" method="post">
            <select name="action" id="">
                <option value="">Выбирите действие</option>
                <option value="mark">Пометить как сделаные</option>
                <option value="delete">Удалить</option>
            </select>
            <input type="submit">
        <ul>
            <?php foreach($tasks as $task): ?>
                <?php $check = (bool) $task['complete'] ?>
                <li<?= ($check) ? ' class="done"' : '' ?>>
                    <input <?= ($check) ? 'checked' : '' ?> type="checkbox" name="complete[]" value="<?= $task['id'] ?>">
                    <?= $task['title'] ?>
                </li>
            <?php endforeach; ?>
        </ul>
        </form>
    <?php endif; ?>
</body>
</html>