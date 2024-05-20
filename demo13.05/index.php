 <!DOCTYPE html>

 <body>
   <?php require_once "header.php" ?>
   <main class="container-main">
     <form class="form-reg" method="post" action="method/regPHP.php" id="loginForm">
       ФИО
       <input type="text" name='fio' class="input-reg" id='fio' pattern="^[a-zA-Zа-яА-яЁё]*\s[a-zA-Zа-яА-яЁё]*\s[a-zA-Zа-яА-яЁё]*$" title="Фамилия Имя Отчество" required>
       Номер телефона
       <input type="text" name='phone' class="input-reg" id='phone' pattern="^7\d{10}$" title="7-ХХХ-ХХХ-ХХ-ХХ" required>
       Логин
       <input name='login' class="input-reg" id='login' type='email' required>
       Вод. удостоверение
       <input type="text" name=' auto_number' class="input-reg" id='auto_number' required>
       пароль
       <input type="text" name='pass' class="input-reg" id='pass' pattern="(?=.*\d).{3,}" title="Пароль должен содержать минимум 1 цифру , 3 символа" required>
       <input type="submit" class="btn btn-success" value="Зарегестрироваться" id="btn"></input>
     </form>
     <div id="loginError" style="color: red;"></div><br>


   </main>
   <?php require_once "footer.php" ?>
 </body>
 <!-- <script>
   let regext = /^7\d{10}$/;
   let str = '79651479875';
   let regext2 = /^[A-Za-zА-Яа-яЁё]*\s[A-Za-zА-Яа-яЁё]*\s[A-Za-zА-Яа-яЁё]*$/
   let str2 = 'авывdsdыа аdsdsаа аааа';
   //let regext_pass = /^ (?=.{2,})(?=.*[\d+])$/
   let regext_pass = /^(?=.*[0-9]).{3,}$/;
   let str3 = ";1;";
   console.log(str.match(regext));
   console.log(str2.match(regext2));
   console.log(str3.match(regext_pass));



   function BtnReg(event) {
     event.preventDefault();
     let fio = document.getElementById('fio').value;
     let phone = document.getElementById('phone').value;
     let login = document.getElementById('login').value;
     let auto_number = document.getElementById('auto_number').value;
     let pass = document.getElementById('pass').value;
     let err = document.getElementById('err');
     if (fio == "" || phone == "" || login == "" || auto_number == "" || pass == "") {
       err.innerHTML = "Не все поля заполнены"; // проверка на заполненность
     } else { // далее валидация данных и отправка на оброботку php
       let regex_nubmer = /^7\d{10}$/;
       let regext_fio = /^[A-Za-zА-Яа-яЁё]*\s[A-Za-zА-Яа-яЁё]*\s[A-Za-zА-Яа-яЁё]*$/
       let regext_pass = /^(?=.*[0-9]).{3,}$/;
       if (fio.match(regext_fio)) {


         if (phone.match(regex_nubmer)) {
           if (pass.match(regext_pass)) {

             err.innerHTML = "Вы умничка";
             // formdata ляляля....
           } else {
             err.innerHTML = "Введите корректный пароль (1 цифра, мин 3 символа) "
           }
         } else {
           err.innerHTML = "Введите корректный номер телефона"
         }
       } else {
         err.innerHTML = "Введите корректные ФИО"
       }
     }
   }
 </script> -->
 <script>
   document.getElementById('loginForm').addEventListener('submit', function(event) {
     event.preventDefault();
     var form = event.target;
     fetch(form.action, {
         method: form.method,
         body: new FormData(form)
       })
       .then(response => response.json())
       .then(data => {
         if (data.success) {
           alert(data.message)
           window.location = "auth.php"
         } else {
           document.getElementById('loginError').innerHTML =
             data.message
         }
       })
       .catch(error => console.error('Ошибка:', error));
   });
 </script>

 </html>