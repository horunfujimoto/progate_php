<?php
class Menu {
  // name, price, imageプロパティのアクセス権をprivate
   
  private $name;
  private $price;
  private $image;
  //注文数初期値は0で登録
  private $orderCount=0;
  
  public function __construct($name, $price, $image) {
    $this->name = $name;
    $this->price = $price;
    $this->image = $image;
  }
  
  // getNameメソッドを定義
  public function getName() {
    return $this->name;
  }
  
  // getImageメソッドを定義
  public function getImage() {
    return $this->image;
  }

  // getOrderCountメソッドを定義
  public function getOrderCount() {
    return $this->orderCount;
  }
  
  // setOrderCountメソッドを定義(セッター)
  public function setOrderCount($orderCount) {
    $this->orderCount = $orderCount;
  }
  
  public function getTaxIncludedPrice() {
    return floor($this->price * 1.08);
  }
  
  // getTotalPriceメソッドを定義
  public function getTotalPrice() {
    return $this->getTaxIncludedPrice()*$this->orderCount;
  }
  
}
?>