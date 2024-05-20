<!DOCTYPE html>
<?php
require_once "header.php";
require_once "method/connect.php";
if ($_SESSION['user']['role'] == 'admin') {
  header("Location: admin.php");
}
?>

<body>
  <main class="container-main">
    <form class="form-reg auth" method="post" action="method/add_orderPHP.php" id='loginform'>
      Выберите мастера

      <select name="master" id="" class="form-inpt">
        <?php $add_masters = $mysqli->query("SELECT * FROM `master`"); ?>
        <?php while ($row = $add_masters->fetch_assoc()) : ?>
          <option value=<?= $row['id'] ?>><?= $row['name']; ?></option>
        <?php endwhile; ?>
      </select>
      Выберите время
      <input type="date" name='date' class="input-reg form-inpt">
      <select name='time' class="form-inpt">
        <option value="8:00">8:00</option>
        <option value="9:00">9:00</option>
        <option value="10:00">10:00</option>
        <option value="11:00">11:00</option>
        <option value="12:00">12:00</option>
        <option value="13:00">13:00</option>
        <option value="14:00">14:00</option>
        <option value="15:00">15:00</option>
        <option value="16:00">16:00</option>
        <option value="17:00">17:00</option>
        <option value="18:00">18:00</option>
      </select>
      <input type="submit" class="btn btn-success" value="Отправить"></input>
    </form>
    <div><label id='err'> </label></div>
  </main>
  <?php require_once "footer.php" ?>
</body>
<script>
  document.getElementById('loginform').addEventListener('submit', (event) => {
    event.preventDefault();
    let err = document.getElementById('err')
    var form = event.target
    fetch(form.action, {
        method: form.method,
        body: new FormData(form)
      })
      .then(response => response.json())
      .then(data => {
        if (data.success) {
          alert(data.message)
          window.location = "history.php"
        } else {
          err.innerHTML = data.message
        }
      })
      .catch()
  })
</script>


</html>