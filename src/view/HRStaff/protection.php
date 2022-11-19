<?php

function RSA_encryption($data,$pk){
    openssl_public_encrypt($data,$ciphertext ,$pk);
 
    return base64_encode($ciphertext);
}

function RSA_decryption($ciphertext ,$sk){
    openssl_private_decrypt(base64_decode($ciphertext),$plaintext ,$sk);
    return  $plaintext;
}
?>