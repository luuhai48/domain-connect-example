# How to implement domain connect flow in PHP

## Prepare

- Make sure you have PHP installed. Mine is version `8`.
- Make sure you have `composer` installed.
- Then install dependenties using composer:

```bash
composer install
```

## Config

**First**, you will need to have first submit your template for the domain connect onto this github repo.
https://github.com/Domain-Connect/Templates.
Please read the instruction on github.

For pixely, we already have a file on there https://github.com/Domain-Connect/Templates/blob/master/userdashboard.pixely.com.arecord.json.

You can submit your own or make changes by cloning the repo, commit and submit the Pull Request.

**Then**, you need to contact the DNS providers to onboard your template.

For example, for `Cloudflare`, you need to read this developer document and follow the steps: https://developers.cloudflare.com/dns/reference/domain-connect/#2-contact-cloudflare-to-onboard-your-template.

**Lastly**, update the configs in `src/config.php` file to match the template file.

## Run

**Step 1**: Generate secrets keys needed to configure domain connect. Run this command in the terminal to create 2 files: `private_key.pem` and `public_key.pem`. Save the `private_key.pem` file somewhere safe.

```bash
php src/step-1-generate-secret-keys.php
```

**Step 2**: Generate DNS and config DNS records for your domain. Run this command in the terminal.

```bash
php src/step-2-generate-dns-records.php
```

**Step 3**: Integrate the code in file `src/step-3-create-link-to-connect-your-domain.php` to generate a link that customer can open and start the domain connect flow.
Or run it in the terminal to see how it works.

```bash
php src/step-3-create-link-to-connect-your-domain.php
```

## Related links

https://www.domainconnect.org/getting-started/

https://exampleservice.domainconnect.org/sig

https://github.com/gaalferov/ext-domain-connect

https://github.com/Domain-Connect/Templates
