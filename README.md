# PHP Composer sample on Azure
This sample installs monolog & php-timer with composer.

## App Service Linux Deployment
If you deploy your app using Git or zip deploy, the Oryx build automation steps through the following sequence:
Run custom script if specified by PRE_BUILD_SCRIPT_PATH.
Run php composer.phar install.
Run custom script if specified by POST_BUILD_SCRIPT_PATH.

https://github.com/microsoft/Oryx/blob/master/doc/runtimes/php.md

## App Service Windows Deployment
Running composer & on Windows requires the additional files in your repository. 
- .deployment
- deploy.sh
- composer.phar

 Set the App Setting "SCM_DO_BUILD_DURING_DEPLOYMENT" to "true" to build the composer dependencies during deployment

Enable SCM_DO_BUILD_DURING_DEPLOYMENT with Azure CLI
```
az webapp config appsettings set --resource-group <group-name> --name <app-name> --settings SCM_DO_BUILD_DURING_DEPLOYMENT=true
```
Zip Deploy with Azure CLI
```
az webapp deployment source config-zip --resource-group <group-name> --name <app-name> --src clouddrive/<filename>.zip
```

Reference: https://docs.microsoft.com/en-us/azure/app-service/configure-language-php?pivots=platform-windows#run-composer
