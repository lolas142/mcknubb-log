## Clog 
### - a simple logger class based on [lydia/Clog](https://github.com/mosbth/lydia/blob/master/src/CLog/CLog.php)


This class has no dependencies and can easily be implemented in any project. It saves timestamps in memory and renders a table at the end of the page.

## Code Example

Create the $Clog object in the top of your script

```php
$Clog = new Toeswade\Log\Clog();
```

Later use it in the classes you want to log . Note that the logger has to be accessible from your class

```php
class Test 
{
    private $logger;

    public function __construct( \Toeswade\Log\Clog $Clog) {
        $this->logger = $Clog;
    }

    /*
     * Some method
     */
    public function test() {
        $this->logger->stamp(__CLASS__, __METHOD__, 'Method starts');
        // Some code
        $this->logger->stamp(__CLASS__, __METHOD__, 'Method ends');
    }
}
```

When you have logged all the timestamps of interest echo out the log table at the end of your script

```php
echo $Clog->renderLog();
```


## Motivation

This class is part of a task in the course phpmvc at BTH, Sweden.
