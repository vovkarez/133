<!DOCTYPE html>
<?php
require_once "method/connect.php";
require_once "header.php";
if (!isset($_SESSION['user']['id']) || $_SESSION['user']['id'] == 'user') {
  header('Location: index.php');
}

$id_user = $_SESSION['user']['id'];
$get_info_admin = $mysqli->query("SELECT orders.id,user.fio,user.login,master.name, orders.date,orders.time,orders.status FROM `master` INNER JOIN `orders` ON master.id = orders.id_master INNER JOIN `user` ON orders.id_client = user.id");

?>

<body>
  <main class="cnt-info">
    <?php while ($row = $get_info_admin->fetch_assoc()) : ?>
      <form action="method/adminPHP.php" method="post" class="adminform">
        <div class="container-info">
          Номер заявки:
          <label><?= $row['id'] ?></label>
          <input hidden value='<?= $row['id'] ?>' name='id'> </input>
          ФИО клиента:
          <label><?= $row['fio'] ?></label>
          Телефон клиента:
          <label><?= $row['login'] ?></label>
          Дата процедуры:
          <label><?= $row['date'] ?></label>
          Время процедуры:
          <label><?= $row['time'] ?></label>
          Мастер:
          <label><?= $row['name'] ?></label>
          Статус:
          <label><?= $row['status'] ?></label>
          <?php if ($row['status'] == 'Новое') : ?>
            <select name="status">
              <option value="Подтверждено">Подтверждено</option>
              <option value="Отклонено"> Отклонено</option>
              <input type="submit" class="btn btn_admin" value="Отправить">
            </select>
          <?php endif; ?>
        </div>
      </form>
    <?php endwhile; ?>
  </main>
  <?php require_once "footer.php" ?>
</body>
<script>
  document.querySelectorAll('.adminform').forEach(form => {
    form.addEventListener('submit', function(event) {
      event.preventDefault();
      var formData = new FormData(form);
      fetch(form.action, {
          method: form.method,
          body: formData
        })
        .then(response => response.json())
        .then(data => {
          if (data.success) {
            alert(data.message)
            window.location = 'admin.php'
          } else {
            alert(data.message)
            window.location = 'admin.php'
          }
        })
        .catch(error => console.error('Ошибка:', error));
    });
  });
</script>

</html>