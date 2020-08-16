<?php

/**
  * MyClass is a php OOP class example
  */

// (StudlyCaps) class declaration
// Each class muust be in it's own php file.
// So, for this one : MyClass.php
class MyClass
{
  // (camelCase) Properties
  public $name;
  public $langage;


  // (camelCase) Methods
  public function getName() : string
  {
    // $this references MyClass $className variable
    return $this->name;
  }


  public function getLangage() : string
  {
    return $this->langage;
  }


  public function getInfos() : void
  {
    echo "MyClass's name is : " . $this->getName() . "<br>";
    echo "MyClass's langage is : " . $this->getLangage() . "<br>";
    return;
  }
}
