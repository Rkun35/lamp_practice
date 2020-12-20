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

$token = get_post("token");
if(is_valid_csrf_token($token) === false) {
  unset($_SESSION['csrf_token']);
  redirect_to(LOGIN_URL);
}
unset($_SESSION['csrf_token']);

$db = get_db_connect();
$user = get_login_user($db);

$carts = get_user_carts($db, $user['user_id']);

$db->beginTransaction();

if(purchase_carts($db, $carts) === false){
  set_error('商品が購入できませんでした。');
  $db->rollback();
  redirect_to(CART_URL);
} 

$total_price = sum_carts($carts);

//購入履歴テーブルの登録 total,user_idを渡す
  
 if(history_regist($total_price, $user['user_id'], $db) === false){
   set_error('購入履歴が登録できませんでした。');
   $db->rollback();
   redirect_to(CART_URL);

 }
 
 $purchase_id = (int) $db->lastInsertId(); 

foreach($carts as $cart) {
  //購入明細テーブルの登録 item_id,price,amount
  if(details_regist((int)$cart['item_id'], (int)$cart['price'], (int)$cart['amount'], $purchase_id, $db) === false){
    set_error('購入履歴が登録できませんでした。');
    $db->rollback();
    redirect_to(CART_URL);
 
  }

  }
  $db->commit();


include_once '../view/finish_view.php';