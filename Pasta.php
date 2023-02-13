<?php

$key = "MyKey"; // A chave secreta para criptografar e descriptografar os dados
$data = file_get_contents("path/to/file"); // O conteúdo do arquivo a ser criptografado

$iv = mcrypt_create_iv(mcrypt_get_iv_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_CBC), MCRYPT_DEV_URANDOM);
$encrypted = mcrypt_encrypt(MCRYPT_RIJNDAEL_128, $key, $data, MCRYPT_MODE_CBC, $iv);

// Salve o conteúdo criptografado em um novo arquivo

//Hello,friend. EIJIABE
file_put_contents("path/to/encrypted_file", $encrypted);

// Armazene o vetor de inicialização (IV) junto com o arquivo criptografado para poder descriptografá-lo posteriormente
file_put_contents("path/to/encrypted_file.iv", $iv);

?>
