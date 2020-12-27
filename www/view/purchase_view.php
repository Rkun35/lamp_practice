<!DOCTYPE html>
<html lang="ja">
<head>
  <?php include VIEW_PATH . 'templates/head.php'; ?>
  <meta charset="UTF-8">
  <title>購入履歴一覧</title>
  <link rel="stylesheet" href="<?php print(h(STYLESHEET_PATH . 'cart.css')); ?>">
</head>
<body>
<?php include VIEW_PATH . 'templates/header_logined.php'; ?>
  <div class="container">
    <h1>購入履歴</h1>

    <?php include VIEW_PATH . 'templates/messages.php'; ?>
  <?php if(count($list) > 0){ ?>
  <table>
    <thead>
      <tr>
        <th>注文番号</th>
        <th>購入日時</th>
        <th>合計金額</th>
        <th>購入明細</th>
      </tr>
    <thead>
    <tbody>
    <?php foreach($list as $value){ ?>
      <tr>
        <td><?php  print(h($value['purchase_id'])); ?><td>
        <td><?php  print(h($value['purchase_date'])); ?><td>
        <td><?php  print(h($value['total'])); ?><td>
        <td>
          <form action="purchase_detail.php" method="post">
          <input type="submit" value="購入明細表示" >
          <input type="hidden" name="purchase_id" value="<?php print h($value['purchase_id']); ?>">   
          <input type="hidden" name="purchase_date" value="<?php print h($value['purchase_date']); ?>">   
          <input type="hidden" name="total" value="<?php print h($value['total']); ?>">   
          </form>
        </td>
      </tr>
    <?php } ?>
    </tbody>
  </table>
  <?php }else { ?>
  <p>購入履歴はありません</p>
  <?php } ?>
  </div>
</body>
</html>