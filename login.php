<?php
if (isset($_POST['email'])) {
    $passwordHash = hash('sha256', $_POST['password']);
    $email = $_POST['email']; 

include_once 'lib/safemysql.class.php';
$db = new SafeMySQL();

    $loginerr="";
    $res = $db->getRow("SELECT * FROM users WHERE name=?s AND password=?s", $email, $passwordHash);
    // Есть ли пользователь с таким логином?
    if (count($res) == "") { 
       $loginerr.="Немає такого користувача або пароль невірний, перевірте та спробуйте ще раз!";
       }
    
    echo "<b style='color:grey;'>$loginerr</b><br>"; 
    if(!$loginerr) {
        session_start();
        // Стартуем сессию и записываем логин в суперглобальный массив $_SESSION
        $_SESSION['user'] = $email;
        $_SESSION['id'] = $res['id'];
        $_SESSION['access'] = $res['access'];


            // Если определена страница с которой мы пришли,
            // на нее и переадресуем, либо на главную
            header ("location: main.php");
        }
}    
?>