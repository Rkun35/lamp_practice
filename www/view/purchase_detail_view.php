<!DOCTYPE html>
<html lang="ja">
<head>
  <?php include VIEW_PATH . 'templates/head.php'; ?>
  <meta charset="UTF-8">
  <title>購入明細一覧</title>
  <link rel="stylesheet" href="<?php print(h(STYLESHEET_PATH . 'cart.css')); ?>">
</head>
<body>
<?php include VIEW_PATH . 'templates/header_logined.php'; ?>
    <h1>購入明細</h1>

    <?php include VIEW_PATH . 'templates/messages.php'; ?>
    <?php if(count($list) > 0){ ?>
  <table>
      <tr>
        <th>注文番号</th>
        <th>購入日時</th>
        <th>合計金額</th>
      </tr>
      <tr>
        <td><?php  print h($purchase_id); ?><td>
        <td><?php  print h($purchase_date); ?><td>
        <td><?php  print h($total); ?><td>
      </tr>
  </table>
  <table>
      <tr>
        <th>商品名</th>
        <th>価格</th>
        <th>購入数</th>
        <th>小計</th>
      </tr>
      <?php foreach($list as $value){?>
        <tr>
          <th><?php print (h($value['name'])); ?></th>
          <th><?php print (h($value['price'])); ?></th>
          <th><?php print (h($value['amount'])); ?></th>
          <th><?php print (h((int)$value['price'] * (int)$value['amount'])); ?></th>
        </tr>
    <?php } ?>
  </table>
  <?php } ?>
</body>
</html>