<?php

define('DM_HOST', 'domainconnect.userdashboard');
define('DM_DOMAIN', 'pixely.com');

// Get these from the github repo of domain connect
// https://github.com/Domain-Connect/Templates/blob/master/userdashboard.pixely.com.arecord.json
// You can submit your own template. Please read the documentation on the above repo link.
define('DM_PROVIDER_ID', 'userdashboard.pixely.com');
define('DM_SERVICE_ID', 'arecord');

// This is whitelist in the file https://github.com/Domain-Connect/Templates/blob/master/userdashboard.pixely.com.arecord.json.
// property: syncRedirectDomain.
// Format: Comma-separated list of domains that are allowed to redirect to after complete the domain connect flow.
// Example: userdashboard.pixely.com, app.pixely.com
// You can submit to make changes to the repo by cloning it, making changes and submitting a PR.
define('DM_REDIRECT_URI', 'https://userdashboard.pixely.com');
