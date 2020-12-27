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

//purchase_idの注文番号、合計日時、合計金額の取得
$purchase_id = get_post('purchase_id');
$purchase_date = get_post('purchase_date');
$total = get_post('total');

$list = get_purchase_detail($db, $purchase_id);

include_once VIEW_PATH . 'purchase_detail_view.php';