<?php

namespace Exemple;

class Email {
  public static function ancienneValidation($email)
  {
    $old_domain_format = "/^[a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\@[a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\.[a-zA-Z]{2,4}$/";
    if (preg_match(/^[a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\@[a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\.[a-zA-Z]{2,4}$/), $email) {
      return true;
    } else {
      return false;
    }
  }


    public static function nouvelleValidation($email)
  {
    $new_domain_format = "";
    if (preg_match(/^[a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\@[a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\.[a-zA-Z]{2,}$/), $email) {
      return true;
    } else {
      return false;
    }
  }
}