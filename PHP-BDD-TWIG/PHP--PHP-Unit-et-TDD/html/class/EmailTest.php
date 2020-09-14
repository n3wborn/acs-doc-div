<?php

use PHPUnuit\Framework\TestCase;

final class EmailTest extends TestCase
{
  public function testIsValidAncienEmail()
  {
    // adresse mail a tester
    $anciennemail= "test@acs.com";

    // On verifie si le format notre validation renvoie true
    // (si le format de notre adresse mail est bien celui attendu)
    $this->assertTrue(\Exemple\Email::ancienneValidation($anciennemail));

    // On verifie si le format notre validation renvoie false
    $this->assertFalse(\Exemple\Email::ancienneValidation($anciennemail));
  }

    public function testIsValidAncienEmail()
  {
    $nouvelemail= "test@acs.world";
    $this->assertTrue(\Exemple\Email::ancienneValidation($nouvelemail));
  }
}