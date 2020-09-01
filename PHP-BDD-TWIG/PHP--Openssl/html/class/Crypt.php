<?php

namespace Exemple;

class Crypt
{

    public static $encryption_key = "ADs-2525";
    public static $cipher = "aes-128-cbc";

    // Fonction de chiffrement (prend uniquement la chaine à chiffrer en argument)
    public static function encryptSimple($string) {

        $cipher = "aes-128-cbc";                // methode de chiffrement utilisée
        $options = 0;                           // options propres à openssl
        $ivlen = openssl_cipher_iv_length(self::$cipher);                       // taille du vecteur
        $characters= "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";    // notre alphabet
        $iv="";                                 // Notre vecteur d'initialisation

        // On créé une chaine aléatoire de longueur = $characters.length
        for($i = 0; $i<$ivlen; $i++){
            $iv .= $characters[random_int(0,51)];
        }

        // on chiffre avec les options :
        //  $string = chaine a chiffrer
        //  $chipher = chiffrement utilisé
        //  $self::$encryption_key = notre clé
        //  $options = les options fournies à openssl
        //  $iv =  notre vecteur d'initialisation
        $cipher_text = openssl_encrypt($string, $cipher, self::$encryption_key, $options, $iv);

        //On retourne l'iv et le texte chiffré
        return $iv.$cipher_text;
    }


    // fonction de dechiffrement
    public static function decryptSimple($cipher_string){

        $options = 0;
        $ivlen = openssl_cipher_iv_length(self::$cipher);
        $iv = substr($cipher_string, 0, $ivlen);
        //On va chercher le cipher text
        $cipher_raw = substr($cipher_string, $ivlen);
        $text = openssl_decrypt($cipher_raw, self::$cipher, self::$encryption_key, $options, $iv);

        // retourne la chaine déchiffrée
        return $text;
    }
}