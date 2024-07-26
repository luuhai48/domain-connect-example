<?php

require __DIR__ . '/config.php';

/**
 * 
 * Generate DNS records from a public key
 * 
 * Input is the path to public_key.pem file.
 */
function generateDNSRecordsFromPublicKey(string $publicKey) {
    // load the public key file
    $publicKey = file_get_contents($publicKey);
    if ($publicKey === false) {
        echo 'Failed to load key file at ' . $publicKey  . PHP_EOL;
        return;
    }

    // remove trailing and leading -----BEGIN PUBLIC KEY-----
    $publicKey = str_replace('-----BEGIN PUBLIC KEY-----', '', $publicKey);
    $publicKey = str_replace('-----END PUBLIC KEY-----', '', $publicKey);
    // remove any spaces
    $publicKey = str_replace(' ', '', $publicKey);
    // remove any new lines
    $publicKey = str_replace("\n", '', $publicKey);

    echo "Please go to your domain '" . DM_DOMAIN . "' DNS provider and add the following TXT records:" . PHP_EOL . PHP_EOL;
    $chunkSize = 200;
    $chunks = str_split($publicKey, $chunkSize);
    foreach ($chunks as $index => $chunk) {
        echo "Record Name: " . DM_KEY . "." . DM_DOMAIN . PHP_EOL;
        echo "Record Content: p=" . ($index + 1) . ",a=RS256,d=$chunk" . PHP_EOL . PHP_EOL;
    }
}

generateDNSRecordsFromPublicKey(__DIR__ . '/public_key.pem');
