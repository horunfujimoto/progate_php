<?php require_once('data.php') ?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Progate</title>
  <link rel="stylesheet" type="text/css" href="stylesheet.css">
  <link href='https://fonts.googleapis.com/css?family=Pacifico|Lato' rel='stylesheet' type='text/css'>
</head>
<body>

  <div class="order-wrapper">
    <h2>注文内容確認</h2>
    <!-- 変数$totalPaymentを定義し、数値の0を代入 -->
    <?php $totalPayment = 0 ?>
    <?php foreach ($menus as $menu): ?>
      <?php
        //変数$orderCountに$_POSTで受け取った値を代入
        $orderCount = $_POST[$menu->getName()];
        // $menuに対して、$orderCountを引数としてsetOrderCountメソッドを呼び出す
        $menu->setOrderCount($orderCount);
        // $totalPaymentに、$menuのgetTotalPriceメソッドで得た値を足す
        $totalPayment += $menu->getTotalPrice();
      ?>
      <p class="order-amount">
        <!-- ここに、$menuのゲッターを用いてnameプロパティを表示 -->
        <?php echo $menu->getName() ?>
        x
        <!-- ここに、$orderCountを表示 -->
        <?php echo $orderCount ?>
        個
      </p>
      <!-- $menuに対してgetTotalPriceメソッドを呼び出して、小計金額を表示 -->
      <p class="order-price"><?php echo $menu->getTotalPrice() ?>円</p>
    <?php endforeach ?>
    <!-- 合計金額 -->
    <h3>合計金額: <?php echo $totalPayment ?>円</h3>
  </div>

  <div class="back-page">
    <?php
      $h = $_SERVER['HTTP_HOST'];
      $r = $_SERVER['HTTP_REFERER']
    ?>
    <?php if (!empty($r) && (strpos($r, $h) !== false)) ?>
    <div class="post-detail-button is_prev">
        <a href="<?= $r ?>">前のページに戻る</a>
    </div>
  </div>

</body>
</html>