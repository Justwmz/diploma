<?php
include_once 'lib/safemysql.class.php';
$db = new SafeMySQL();
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Авторизація</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8" >
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/signin.css" rel="stylesheet">
    <script src="js/jquery-1.11.0.js"></script>
    <script src="js/bootstrap.min.js"></script>
    </head>
      <body>
        <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
          <div class="container">
            <div class="navbar-header">
              <a class="navbar-brand" href="#">Service Desk</a>
            </div>
            <div class="navbar-collapse collapse">
              <ul class="nav navbar-nav">      
              </ul>
            </div><!--/.navbar-collapse -->
          </div>
        </div>
       <div class="container" style="padding-top: 70px">
          <div class="row">
            <form class="form-signin" role="form" action="login.php" method="POST">
              <h2 class="form-signin-heading">Авторизуйтесь</h2>
              <input type="text" class="form-control" placeholder="Логін" required autofocus name="email">
              <input type="password" class="form-control" placeholder="Пароль" required name="password">
              <label class="checkbox">
                <input type="checkbox" value="remember-me"> Запам'ятати мене
              </label>
              <button class="btn btn-lg btn-primary btn-block" type="submit">Увійти</button>
            </form>
          </div>
      </body>
</html>