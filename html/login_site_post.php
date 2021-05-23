<?php
session_start();
include_once('config.php');
if(isset ($_POST['login_site'])){
    $mysqli = ConnectDB();
    if (!$res = $mysqli->query("CALL login('$_POST[login]')")) {
        echo "Не удалось вызвать хранимую процедуру: (" . $mysqli->errno . ") " . $mysqli->error;
    }
    else {
        $res = $res->fetch_assoc();

        if (password_verify($_POST['password'], $res['password'])) {

            $mysqli = ConnectDB();
            if (!$res = $mysqli->query("CALL getMeFromLogin('$_POST[login]')")) {
                echo "Не удалось вызвать хранимую процедуру: (" . $mysqli->errno . ") " . $mysqli->error;
            } else {
                $res = $res->fetch_assoc();
                $_SESSION['id'] = $res['id'];
                $_SESSION['login'] = $res['login'];
                $_SESSION['first_name'] = $res['first_name'];
                $_SESSION['last_name'] = $res['last_name'];
                $_SESSION['middle_name'] = $res['middle_name'];
                $_SESSION['phone'] = $res['phone'];
                $_SESSION['age'] = $res['age'];
                $_SESSION['sekas'] = $res['sekas'];
                $_SESSION['status_user_id'] = $res['status_user_id'];
                $_SESSION['status_user_name'] = $res['name'];
                echo "Вы вошли";
            }
        } else {
            echo "Неверный логин или пароль";
            $_SESSION['badlogin'] = true;
        }
    }

}
echo "<script type=\"text/javascript\">

setTimeout('location.replace(\"http://80.87.195.174/novros/\")',300);

</script>
";