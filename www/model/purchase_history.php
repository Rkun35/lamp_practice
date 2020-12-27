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

function get_purchase($db, $user){

  $sql = "
    SELECT
      purchase_id,
      purchase_date,
      total
    FROM
      purchase
    WHERE
      user_id = :user_id
    ";
  $params = array(':user_id' => $user);
    return fetch_all_query($db,$sql,$params);


}
function get_admin_purchase($db){

  $sql = "
    SELECT
      purchase_id,
      purchase_date,
      total
    FROM
      purchase
    ";
    return fetch_all_query($db,$sql);

}

function get_purchase_detail($db, $purchase_id) {

  $sql = "
    SELECT
      items.name,
      purchase_detail.price,
      purchase_detail.amount
    FROM
      purchase_detail
    JOIN
      items
    ON
      purchase_detail.item_id = items.item_id
    WHERE
      purchase_detail.purchase_id = :purchase_id;  
  ";
  $params = array(':purchase_id' => $purchase_id);
  return fetch_all_query($db, $sql, $params);
}