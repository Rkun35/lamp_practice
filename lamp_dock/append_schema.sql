-- 購入履歴テーブル, purchase
-- 購入番号、購入日時、合計金額、ユーザＩＤ
-- purchase_id,purchase_date,total,user_id
-- 購入明細テーブル,purchase_detail
-- 商品ＩＤ、購入時の商品価格、購入数、購入番号,購入明細ＩＤ
-- item_id,price,amount,purchase_id,purchase_detail_id

CREATE TABLE purchase (
  purchase_id int(11) NOT NULL AUTO_INCREMENT,
  purchase_date datetime DEFAULT CURRENT_TIMESTAMP,
  total int(11) NOT NULL,
  user_id int(11) NOT NULL,
  PRIMARY KEY (purchase_id)
);

CREATE TABLE purchase_detail (
  purchase_detail_id  int(11) NOT NULL AUTO_INCREMENT,
  prcie int(11) NOT NULL,
  amount int (11) NOT NULL,
  item_id int(11) NOT NULL,
  purchase_id int(11) NOT NULL,
  PRIMARY KEY (purchase_detail_id)
);
