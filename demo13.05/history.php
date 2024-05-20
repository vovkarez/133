<!DOCTYPE html>
<?php
require_once "method/connect.php";
require_once "header.php";
if (!isset($_SESSION['user']['id'])) {
  header('Location: index.php');
}

$id_user = $_SESSION['user']['id'];
$get_orders = $mysqli->query("SELECT * FROM `orders` WHERE `id_client` = $id_user");
$get_info = $mysqli->query("SELECT orders.id, master.name, orders.date, orders.time, orders.status
FROM `master`
INNER JOIN `orders` ON master.id = orders.id_master
where orders.id_client = $id_user");
?>

<body>
  <main class="cnt-info">
    <?php while ($row = $get_info->fetch_assoc()) : ?>
      <div class="container-info">
        Номер заявки:
        <label><?= $row['id'] ?></label>
        Мастер:
        <label><?= $row['name'] ?></label>
        Время процедуры:
        <label><?= $row['date'] ?></label>
        <label><?= $row['time'] ?></label>
        Статус заявки:
        <label><?= $row['status'] ?></label>
      </div>
    <?php endwhile; ?>

  </main>
  <?php require_once "footer.php" ?>
</body>

</html>