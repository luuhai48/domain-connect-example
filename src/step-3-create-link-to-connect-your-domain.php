<?php

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/config.php';

use DomainConnect\Exception\DomainConnectException;
use DomainConnect\Services\TemplateService;

$domain_you_want_to_connect = 'pixely.dev';
$ip_address_of_pixely_server = '132.148.25.185';

try {
  $templateService = new TemplateService();
  $privateKey = file_get_contents(__DIR__ . '/private_key.pem');
  $keyId = DM_KEY;
  
  $applyUrl = $templateService->getTemplateSyncUrl(
      $domain_you_want_to_connect, // domain name
      DM_PROVIDER_ID,  // providerId from the template
      DM_SERVICE_ID, // serviceId from the template
      [
          'ip' => $ip_address_of_pixely_server,
          'redirect_uri' => DM_REDIRECT_URI,
          'state' => 'your_optional_custom_state_string'
      ],
      $privateKey,
      $keyId
  );

  print_r($applyUrl);
} catch (DomainConnectException $e) {
  echo (sprintf('An error has occurred: %s', $e->getMessage()));
}
