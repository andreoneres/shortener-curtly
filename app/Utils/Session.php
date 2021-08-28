<?php 

namespace App\Utils;

class Session{

  public static function setUser($user){
    $_SESSION['USER'] = $user;
  }

  public static function getUser(){
    return $_SESSION['USER'];
  }
  
  public static function reset(){

    $vendedor = self::getUser();
    session_destroy();
    session_start();
    self::setUser($vendedor);

  }

}