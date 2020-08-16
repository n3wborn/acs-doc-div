<?php require_once "class/MyClass.php" ?>

<?php

// MyClass Instantiations
// Object Class1
$Class1 = new MyClass();
$Class1->name = 'Class1';
$Class1->langage = 'PHP';
$Class1->getInfos();

// Object Class2
$Class2 = new MyClass();
$Class2->name = 'Class2';
$Class2->langage = 'PHP again !';
$Class2->getInfos();
