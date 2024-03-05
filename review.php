<?php
// Reviewクラスを定義
class Review{
    private $menuName;
    private $body;
    // $userIdというprivateなプロパティを定義
    private $userId;

  // 引数を$menuName,$body,$userNameとするコンストラクタを定義
  public function __construct($menuName, $userId, $body) {
    $this->menuName = $menuName;
    $this->body = $body;
    $this->userId = $userId;
  }

  // それぞれプロパティのゲッターを定義
  public function getMenuName() {
    return $this->menuName;
  }

  public function getBody() {
    return $this->body;
  }

  // getUserメソッドを定義してください
  public function getUser($users) {
    foreach ($users as $user) {
      // $userのidプロパティと、インスタンス自身のuserIdプロパティを比べる
      if ($user->getId() == $this->userId) {
        return $user;
      }
    }
  }

}

?>