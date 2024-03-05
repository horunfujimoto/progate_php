<?php 
// menu.phpを読み込む
require_once('menu.php');
  // Menuクラスを継承したFoodクラスを作成
  class Food extends Menu{
    // $spicinessというprivateなプロパティを定義
    private $spiciness;
    
    // getSpicinessメソッドを定義
    public function getSpiciness() {
      return $this->spiciness;
    }
    
    // setSpicinessメソッドを定義
    public function setSpiciness($spiciness) {
      $this->spiciness = $spiciness;
    }

    // 引数に$spicinessを追加しdata.phpのnewの引数にタイプ追加
    public function __construct($name, $price, $image, $spiciness) {
      parent::__construct($name, $price, $image);
      $this->spiciness = $spiciness;
    }
  }
?>