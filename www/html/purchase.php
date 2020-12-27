<?php
require_once '../conf/const.php';
require_once MODEL_PATH . 'functions.php';
require_once MODEL_PATH . 'user.php';
require_once MODEL_PATH . 'item.php';
require_once MODEL_PATH . 'cart.php';
require_once MODEL_PATH . 'purchase_history.php';

session_start();

if(is_logined() === false){
  redirect_to(LOGIN_URL);
}

$db = get_db_connect();
$user = get_login_user($db);


if(is_admin($user) === false){
  $list = get_purchase($db, $user['user_id']);
}else{
  $list = get_admin_purchase($db);
}


include_once VIEW_PATH . 'purchase_view.php';