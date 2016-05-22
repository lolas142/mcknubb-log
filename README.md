## CLog 
#### a logging class based on [lydia/Clog](https://github.com/mosbth/lydia/blob/master/src/CLog/CLog.php)

This class has no dependencies and can easily be implemented in any ANAX-baed framework. 

##Usage together with Anax-MVC   
###Installation   
The first thing you have to do to use CLog is to add `"mcknubb/log": "dev-master"`to your composer.json file and then run composer to update and install.
Once the package has been installed you have to add the logger to DI. This is done by adding this code to your `"config_with_app.php"`. 
```php
    $di->setShared('logger', function () {
        $logger = new \Mcknubb\Log\Clog();
        return $logger;
    });
```
Then all you have to do is add a timestamp whereever you want to see what happens. This example is from where we add the routes.
```php
    public function add($rule, $action = null)
    {
        $this->di->logger->Timestamp(__CLASS__, __METHOD__, 'Adding route');
        //..
    }
```
Then to show the generated log you add `"echo $app->logger->renderLog();"` to the end of your file like so.
```php
    // Render the response using theme engine.
    $app->theme->render();    
    echo $app->logger->renderLog();
```

[![Build Status](https://travis-ci.org/lolas142/mcknubb-log.svg?branch=master)](https://travis-ci.org/lolas142/mcknubb-log)