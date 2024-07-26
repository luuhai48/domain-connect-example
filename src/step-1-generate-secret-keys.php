<?php

if (file_exists(__DIR__ . '/private_key.pem')) {
    echo 'private_key.pem already exist. Delete the file to regenerate new.' . PHP_EOL;
    exit(1);
}

if (file_exists(__DIR__ . '/public_key.pem')) {
    echo 'public_key.pem already exist. Delete the file to regenerate new.' . PHP_EOL;
    exit(1);
}

$res = openssl_pkey_new([
    'private_key_bits' => 2048,
    'private_key_type' => OPENSSL_KEYTYPE_RSA,
]);
$privateKeyPem = '';
openssl_pkey_export($res, $privateKeyPem);
file_put_contents(__DIR__ . '/private_key.pem', $privateKeyPem);
$publicKeyPem = openssl_pkey_get_details($res)['key'];
file_put_contents(__DIR__ . '/public_key.pem', $publicKeyPem);
