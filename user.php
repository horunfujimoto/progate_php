<?php 
  class User{
    private $id;
    private static $count=0;
    private $name;
    private $gender;

    // 引数を$name, $genderとするコンストラクタを定義
    public function __construct($name, $gender){
      self::$count++;
      $this->id=self::$count;
      $this->name = $name;
      $this->gender = $gender;
    }
    
    // それぞれプロパティのゲッターを定義
    public function getId() {
      return $this->id;
    }

    public function getName() {
      return $this->name;
    }

    public function getGender() {
      return $this->gender;
    }

  }


?>