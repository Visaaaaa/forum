<?php
require __DIR__ . '/checkAuth.php';

// Проверка авторизации
if (!getUserLogin()) {
    header('Location: login.php');
    exit;
}

// Обработка формы
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $comment = trim($_POST['comment'] ?? '');

    if (!empty($comment)) {
        // Сохранение комментария в файл
        $commentToSave = getUserLogin() . ": " . $comment;
        file_put_contents(__DIR__ . '/comments.txt', $commentToSave . PHP_EOL, FILE_APPEND);
        header('Location: index.php');
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Добавить комментарий</title>
</head>
<body>

<h1>Оставить комментарий</h1>

<form action="" method="post">
    <textarea name="comment" rows="5" cols="30" placeholder="Ваш комментарий"></textarea><br>
    <button type="submit">Отправить</button>
</form>

<a href="index.php">Назад к комментариям</a>

</body>
</html>