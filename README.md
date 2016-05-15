## Clog 
a logger class based on [lydia/Clog](https://github.com/mosbth/lydia/blob/master/src/CLog/CLog.php)

This class has no dependencies and can easily be implemented in any project. It saves timestamps in memory and renders a table at the end of the page.

##Usage together with Anax-MVC

###Installation

To start using toeswade/log together with Anax-MVC start with adding it to your composer.json "toeswade/log": "dev-master" and then run composer update to install the package.

Add the logger to DI and test it

Once you have downloaded that package add the logger to your DI-container
```php
        $di->setShared('logger', function () {
            $logger = new \Mcknubb\Log\Clog();
            return $logger;
        });
```

Then you can use it to set timestamps where ever you need in your code. For example in src/ThemeEngine/CThemeBasic

```php
    public function add($rule, $action = null)
    {
        $this->di->logger->Timestamp(__CLASS__, __METHOD__, 'Adding route');
        //..
    }
```
To see your log just echo it at the end of your script

// Render the response using theme engine.
$app->theme->render();
echo $app->logger->renderLog();