<?php
// Удаляем куки для разлогинивания
setcookie('login', '', time() - 3600, '/');
setcookie('password', '', time() - 3600, '/');

header('Location: index.php');
exit;
?>