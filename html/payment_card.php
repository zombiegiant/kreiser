<?php

require_once('config.php');
if(isset($_POST['user_card'])){
    //echo $_POST['user_card'].' '.$_POST['product_id'];

    $mysqli = ConnectDB();


    if (!$res = $mysqli->query("Select user.id as id, user.phone as phone, user.status_user_id as user_status_id, user_card.id as user_card_id  From user_card inner join user on user_card.user_id=user.id WHERE user_card.card=$_POST[user_card]")) {
        echo "Err Card ";
    } else {
        $user=$res->fetch_assoc();
        $user_id=$user['id'];
        $user_status_id=$user['user_status_id'];
        $user_card_id=$user['user_card_id'];
        $user_phone=$user['phone'];

            $mysqli1 = ConnectDB();
            if (!$res1 = $mysqli1->query("Select * From product where product.id=$_POST[product_id]")) {
                echo "Err product ";
            } else {
                $price=$res1->fetch_assoc();
                if($user_status_id==1) $price=$price['price_1'];
                if($user_status_id==3) $price=$price['price_3'];
                if($user_status_id==4) $price=$price['price_4'];

                $mysqli2 = ConnectDB();
                if (!$res2 = $mysqli2->query("Insert Into `order`(user_id,user_card_id,product_id,price) VALUES ($user_id, $user_card_id, $_POST[product_id], $price)")) {
                    echo "Err pay ";
                } else {
                    $mysqli3 = ConnectDB();
                    if (!$res3 = $mysqli3->query("Update user set balance = balance - $price WHERE user.id=$user_id")) {
                        echo "Err balance";
                    } else {
                        echo "ok";
                        $mysqli = ConnectDB();
                        if (!$res = $mysqli->query("Select * from user WHERE user.id=$user_id")) {

                        }
                            $row = $res->fetch_assoc();
                            $balance = $row['balance'];

                        $now_date=date("d.m.Y H:i:s");
                        send("api.smsfeedback.ru", 80, "s17080518", "306xz20J",
                            $user_phone, "$now_date, Покупка на $price руб., Текущий баланс: $balance руб.\n", "TEST-SMS");

                    }

                    $mysqli3 = ConnectDB();
                    if (!$res3 = $mysqli3->query("Update product inner join organization on organization.id = product.organization_id inner join user on user.id = organization.user_id set user.balance = user.balance + $price WHERE product.id=$_POST[product_id]")) {
                    ;}

                }

            }


    }

}
else echo 'Error';