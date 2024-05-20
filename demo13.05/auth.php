<!DOCTYPE html>

<body>
  <?php require_once "header.php" ?>
  <main class="container-main">
    <form class="form-reg auth" method="post" action="method/authPHP.php" id='loginform'>
      Логин
      <input type="text" name='login' class="input-reg">
      пароль
      <input type="text" name='pass' class="input-reg">
      <input type="submit" class="btn btn-success" value="Авторизироваться"></input>
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
          window.location = "add_order.php"
        } else {
          err.innerHTML = data.message
        }
      })
      .catch()
  })
</script>


</html>