<?php require_once('data.php') ?>
<?php require_once('menu.php') ?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Café Progate</title>
  <link rel="stylesheet" type="text/css" href="stylesheet.css">
  <link href='https://fonts.googleapis.com/css?family=Pacifico|Lato' rel='stylesheet' type='text/css'>
</head>
<body>
  <div class="menu-wrapper container">
    <h1 class="logo">Café Progate</h1>
    <h3>メニュー<?php echo Menu::getCount() ?>品</h3>
    
    <!-- formの開始 -->
    <form method="post" action="confirm.php">
      <div class="menu-items">
        <?php foreach ($menus as $menu): ?>
          <div class="menu-item">
            <!-- imageプロパティのゲッター -->
            <img src="<?php echo $menu->getImage() ?>" class="menu-item-image">
            <!-- nameプロパティのゲッター -->
            <h3 class="menu-item-name"><?php echo $menu->getName() ?></h3>
            <?php if ($menu instanceof Drink): ?>
            <!-- $menuのゲッターを用いてtypeプロパティを表示 -->
              <p class="menu-item-type"><?php echo $menu->getType() ?></p>
            <?php else: ?>
              <?php for($i=0; $i<$menu->getSpiciness(); $i++): ?>
                <img src="https://s3-ap-northeast-1.amazonaws.com/progate/shared/images/lesson/php/chilli.png" class='icon-spiciness'>
              <?php endfor ?>
            <?php endif ?>
            <p class="price">¥<?php echo $menu->getTaxIncludedPrice() ?>（税込）</p>
            <!-- menuプロパティのゲッター、入力フォーム -->
            <input type="text" value="0" name="<?php echo $menu->getName() ?>">
            <span>個</span>
          </div>
        <?php endforeach ?>
      </div>
      <!-- 送信ボタン -->
      <input type="submit" value="注文する">
    </form>
    <!-- formの終了 -->

  </div>
</body>
</html>