<?php 
// menu.phpを読み込む
require_once('menu.php');
  // Menuクラスを継承したDrinkクラスを作成
  class Drink extends Menu {
    // $typeというprivateなプロパティを定義
    private $type;
    
    // getTypeメソッドを定義
    public function getType() {
      return $this->type;
    }
    
    // setTypeメソッドを定義
    public function setType($type) {
      $this->type = $type;
    }

    // 引数に$typeを追加しdata.phpのnewの引数にタイプ追加
    public function __construct($name, $price, $image, $type) {
      parent::__construct($name, $price, $image);
      $this->type = $type;
    }
  }

?>
