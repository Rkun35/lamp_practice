<?php 
require_once MODEL_PATH . 'functions.php';
require_once MODEL_PATH . 'db.php';

function history_regist($total, $user_id, $db){ 

  $sql = "
    INSERT INTO
      purchase(
        total,
        user_id
      )
    VALUES(:total, :user_id)
  ";
$params = array(':total' => $total, ':user_id' => $user_id);
  return execute_query($db, $sql, $params);
}

function details_regist($item_id, $price, $amount, $purchase_id, $db){

  $sql = "
    INSERT INTO
    purchase_detail(
      item_id,
      price,
      amount,
      purchase_id 
      )
    VALUES(:item_id, :price, :amount, :purchase_id)
    ";
  $params = array(':item_id' => $item_id, ':price' => $price, ':amount' => $amount, ':purchase_id' => $purchase_id);
  
      return execute_query($db, $sql, $params);

}