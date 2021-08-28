<?php

namespace App\Utils;

class Message
{

  public static function setError($msg)
  {

    $_SESSION['message'] = ['danger' => $msg];
  }

  public static function setSuccess($msg)
  {

    $_SESSION['message'] = ['success' => $msg];
  }

  public static function getMessage()
  {
    $msg = $_SESSION['message'];
    unset($_SESSION['message']);

    return $msg ? $msg : '';
  }
}
