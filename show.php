<!-- phpを読み込み -->
<?php require_once('menu.php') ?>
<?php require_once('data.php') ?>

<?php
// $_GETでクエリ情報の値を受け取って、変数$menuNameに代入
$menuName=$_GET['name'];
// Menuクラスに対してfindByNameというクラスメソッドを呼び出す
$menu = Menu::findByName($menus, $menuName);
// $menuに対して$reviewsを引数としてgetReviewsメソッドを呼び出して、戻り値を変数$menuReviewsに代入
$menuReviews = $menu->getReviews($reviews);

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Progate</title>
  <link rel="stylesheet" type="text/css" href="stylesheet.css">
  <link href='https://fonts.googleapis.com/css?family=Pacifico|Lato' rel='stylesheet' type='text/css'>
</head>
<body>
  <div class="review-wrapper">

    <div class="review-menu-item">
      <img src="<?php echo $menu->getImage() ?>" class="menu-item-image">
      <h3 class="menu-item-name"><?php echo $menu->getName() ?></h3>
  
      <?php if ($menu instanceof Drink): ?>
        <p class="menu-item-type"><?php echo $menu->getType() ?></p>
      <?php else: ?>
        <?php for ($i = 0; $i < $menu->getSpiciness(); $i++): ?>
          <img src="https://s3-ap-northeast-1.amazonaws.com/progate/shared/images/lesson/php/chilli.png" class='icon-spiciness'>
        <?php endfor ?>
      <?php endif ?>
      <p class="price">¥<?php echo $menu->getTaxIncludedPrice() ?></p>
    </div>
    
    <div class="review-list-wrapper">
      <div class="review-list">
        <div class="review-list-title">
          <img src="https://s3-ap-northeast-1.amazonaws.com/progate/shared/images/lesson/php/review.png" class='icon-review'>
          <h4>レビュー一覧</h4>
        </div>
        <!-- foreach文 -->
        <?php foreach($menuReviews as $review): ?>
          <!-- $reviewに対して、引数を$usersとしてgetUserメソッドを呼び出して、戻り値を変数$userに代入 -->
          <?php $user = $review->getUser($users)?>
          <div class="review-list-item">
            <div class="review-user">
              <!-- $userのgenderプロパティによって別の画像を表示 -->
              <?php if($user->getGender() == 'male'): ?>
                <img src="https://s3-ap-northeast-1.amazonaws.com/progate/shared/images/lesson/php/male.png" class='icon-user'>
              <?php else :?>
                <img src="https://s3-ap-northeast-1.amazonaws.com/progate/shared/images/lesson/php/female.png" class='icon-user'>
              <?php endif ?>
              <!-- <p>タグの中に、$userのゲッターを用いてnameプロパティを表示 -->
              <p><?php echo $user->getName() ?></p>
            </div>
            <p class="review-text"><?php echo $review->getBody() ?></p>
          </div>
        <?php endforeach ?>
      </div>
    </div>

    <a href="index.php">← メニュー一覧へ</a>
  </div>
</body>
</html>