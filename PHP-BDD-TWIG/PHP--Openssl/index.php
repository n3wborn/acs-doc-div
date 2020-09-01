<?php
require "vendor/autoload.php";

echo "<pre>";
// print_r(openssl_get_cipher_methods());

$email =  "toto@gmail.com";
$id = "51";
$email_crypt = \Exemple\Crypt::encryptSimple($email);
$id_crypt = \Exemple\Crypt::encryptSimple($id);

print_r($email_crypt);
$email_crypt_url = urlencode($email_crypt);

// print_r($email_crypt_url);

// $text_decrypt = \Exemple\Crypt::decryptSimple($email_crypt);


// echo "<br/>";

// print_r($text_decrypt);

//On montre les différents types de Hash
// print_r(hash_algos());


//On crée une nouvelle chaine de caractère (qui regroupe email & id)
$hash_text = $email_crypt.$id_crypt;
$hash_raw = hash('sha1',$hash_text);
$email_crypt_url = urlencode($email_crypt);
echo"<br/>";
print_r($hash_raw);

$email_decrypt_url = urldecode($email_crypt_url);

print_r($email_decrypt_url);
print_r($email_crypt);

//Boucle qui permet pour chaque algo de hash, de définir la valeur hash

foreach(hash_algos() as $value){
    $result = hash($value, $email);
    echo $value . " - " .strlen($result) . " - " . $result . "\n";
}

echo "</pre>";

