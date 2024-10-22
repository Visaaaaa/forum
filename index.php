<?php
// Загружаем комментарии из файла comments.txt
$commentsFile = __DIR__ . '/comments.txt';
$comments = [];

if (file_exists($commentsFile)) {
    $comments = file($commentsFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
}

?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Форум</title>
</head>
<body>

<h1>Добро пожаловать на форум!</h1>

<!-- Выводим комментарии -->
<?php if (!empty($comments)): ?>
    <h2>Комментарии:</h2>
    <?php foreach ($comments as $comment): ?>
        <p><?= htmlspecialchars($comment) ?></p>
    <?php endforeach; ?>
<?php else: ?>
    <p>Комментариев пока нет.</p>
<?php endif; ?>

<!-- Проверяем, авторизован ли пользователь -->
<?php if (getUserLogin()): ?>
    <a href="comm.php">Оставить комментарий</a> | <a href="logout.php">Выйти</a>
<?php else: ?>
    <a href="login.php">Войти</a>
<?php endif; ?>

</body>
</html>