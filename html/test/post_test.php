<?php
if(isset($_POST['user_card'])){
    echo $_POST['user_card'].' '.$_POST['product_id'];
}
else echo 'Error';