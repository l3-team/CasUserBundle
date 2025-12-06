Cas User Provider for CAS

Allow use attributes (returned by CasBundle or CasGuardBundle) for application Symfony2, Symfony3, Symfony4 and Symfony 5 and Symfony6 and Symfony7
(attributes are returned by apereo cas sso server and by the l3-team/CasBundle (repository github) or l3/cas-bundle (repository packagist) or l3-team/CasGuardBundle (repository github) or l3/cas-guard-bundle (repository packagist))

Installation of the Bundle
---
Install the Bundle with this command :
```
composer require l3/cas-user-bundle:~1.0
```
Launch the command **composer update** to install the package.

For Symfony 2 and 3 : add the Bundle in the AppKernel.php file.
```
<?php
// app/AppKernel.php

// ...
class AppKernel extends Kernel
{
    public function registerBundles()
    {
        $bundles = array(
            // ...

            new L3\Bundle\CasUserBundle\L3CasUserBundle(),
        );

        // ...
    }

    // ...
}
```

For Symfony 4 and Symfony 5 and Symfony 6 :
Verify if the line are present in config/bundles.php file (if not present, just add the line) :
```
# config/bundles.php
...
L3\Bundle\CasUserBundle\L3CasUserBundle::class => ['all' => true],
...
```

Configuration of the bundle
---

For Symfony 2 and 3 : in the firewall of your application, use the Bundle :
```
# app/config/security.yml
security:
    providers:
        cas:
            id: cas_user_provider
```

For Symfony 4 and Symfony 5 and Symfony 6 : in the firewall of your application, use the Bundle :
```
# config/packages/security.yaml
security:
    providers:
        cas:
            id: cas_user_provider
```

For Symfony 6, Symfony 7:
```
# config/packages/security.yaml
security:
    providers:
        cas_user_provider:
            id: cas_user_provider
```

and specify ***cas_user_provider*** for the keys ***provider*** for your firewalls in security.yaml file
