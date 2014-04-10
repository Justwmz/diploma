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
    <title>Main Page</title>
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
              </ul>
            </div><!--/.navbar-collapse -->
          </div>
        </div>
       <div class="container" style="padding-top: 70px">
          <div class="row">
            <div class="col-md-6">
            <button class="btn btn-primary" data-toggle="modal" data-target="#myModal">Добавити запит на інцидент</button>
            </div>
          </div>
          <!-- Modal -->
          <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <h4 class="modal-title" id="myModalLabel">Запит на інцидент</h4>
                </div>
                <div class="modal-body">
                <label>Оберіть послугу</label>
                  <select class="form-control">
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                  </select>
                <label>Тип запиту</label>
                  <select class="form-control">
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                  </select>
                <label>Опис проблеми</label>
                <textarea class="form-control" rows="6"></textarea>
                <label>Вплив</label>
                  <select class="form-control">
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                  </select>
                <label>Категорії запиту</label>
                  <select class="form-control">
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                  </select>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Закрити</button>
                  <button type="button" class="btn btn-primary">Відправити</button>
                </div>
              </div>
            </div>
          </div>
      </body>
</html>