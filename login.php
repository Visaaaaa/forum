<?php
require __DIR__ . '/checkAuth.php';

// Обработка формы авторизации
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $login = $_POST['login'] ?? '';
    $password = $_POST['password'] ?? '';

    if (checkAuth($login, $password)) {
        // Устанавливаем куки
        setcookie('login', $login, time() + 3600, '/');
        setcookie('password', $password, time() + 3600, '/');
        header('Location: index.php');
        exit;
    } else {
        $error = "Неверный логин или пароль!";
    }
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Авторизация</title>
</head>
<body>

<h1>Вход на сайт</h1>

<?php if (isset($error)): ?>
    <p style="color: red;"><?= htmlspecialchars($error) ?></p>
<?php endif; ?>

<form action="" method="post">
    <input type="text" name="login" placeholder="Логин"><br>
    <input type="password" name="password" placeholder="Пароль"><br>
    <button type="submit">Войти</button>
</form>

<a href="index.php">Назад к комментариям</a>

</body>
</html>