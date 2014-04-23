<?php
session_start();
if(isset($_SESSION['user']))
{

}  
else{
  header ("location: index.php");
}
include_once 'lib/safemysql.class.php';
$db = new SafeMySQL();
$user_id = $_SESSION['id'];
?>
<!DOCTYPE html>
<html>
  <head>
    <title></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8" >
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/jquery-1.11.0.js"></script>
    <script src="js/bootstrap.min.js"></script>
    </head>
      <body>
        <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
          <div class="container">
          <ul class="nav navbar-nav navbar-right">
              <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span>
                  <?php
                  $users = $db->getRow("SELECT * FROM users WHERE id=?i",$user_id);
                      echo $users['first']; 
                      echo " ".$users['last'];
                  ?>
                  <b class="caret"></b></a>
                      <ul class="dropdown-menu">
                          <li><a href="chpass.php"><span class="glyphicon glyphicon-pencil"></span> Изменить пароль</a></li>
                          <li><a href="logout.php"><span class="glyphicon glyphicon-off"></span> Выйти</a></li>
                      </ul>
              </li>
          </ul>
            <div class="navbar-header">
              <a class="navbar-brand" href="#">Service Desk</a>
            </div>
            <div class="navbar-collapse collapse">
              <ul class="nav navbar-nav">
              <?php
              include 'nav_menu.php';
              ?>      
              </ul>
            </div><!--/.navbar-collapse -->
          </div>
        </div>
       <div class="container" style="padding-top: 70px">
          <div class="row">
            <div class="col-md-6">
              <?php
              foreach ($_POST['class'] as $value) {
                $db->query("INSERT INTO incidents VALUES (NULL, '".$_POST['service']."', '".$_POST['request']."', '".$_POST['description']."', '".$_POST['influence']."', '$value', '$user_id', CURDATE(), 0)");
              }
              ?>
              <div class="alert alert-success">Запит було відправлено на опрацювання!</div>
            </div>
          </div>
      </body>
</html>