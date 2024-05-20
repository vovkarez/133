<!DOCTYPE html>
<html lang="ru">
<?php session_start();

?>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="style.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <title>Ноготочки</title>
</head>

<body>
  <header class="container-header">
    <div class="header">
      <div class="logo">
        <img src="img/logo.png" class="img">
        <div class="logo-text">
          <h6>Записываемся на</h6>
          <h5>Ноготочки!</h5>
        </div>

      </div>
      <ul class="nav">
        <?php if (!isset($_SESSION['user']['id'])) : ?>
          <a href="auth.php">Авторизация</a>
          <a href="index.php">Регистрация</a>
        <?php endif; ?>
        <?php if (isset($_SESSION['user']['id']) && ($_SESSION['user']['role']) == 'user') : ?>
          <a href="method/exit.php">Выйти</a>
          <a href="add_order.php">Создать заявку</a>
          <a href="history.php">Мои заявки</a>
        <?php endif; ?>
        <?php if (isset($_SESSION['user']['id']) && ($_SESSION['user']['role']) == 'admin') : ?>
          <a href="method/exit.php">Выйти</a>
          <a href="admin.php">Заявки</a>
        <?php endif; ?>

      </ul>
    </div>
  </header>

</body>

</html>