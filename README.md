# PHP SDK for Dialog Ideamart

* Requires PHP 7.0+ to function
* Can be said as a best PHP library for Ideamart
* Simplifies the process of Getting IdeaPro apps running in a blaze. 

## Installation

Use Composer to install.  Does not require composer for functioning.
```
$ composer require joomtriggers\ideamart-php
```

Sample PHP Code
```php
use Joomtriggers\Ideamart\Handler;

$handler = new Handler();
//sending SMS
$handler->sms()
    ->setApplication("APP_000000")
    ->setSecret("SECRET FROM DIALOG")
    ->setMessage("Message")
    ->addSubscriber('tel:077xxxxxxx')
    ->send());

//receiving SMS
$handler->sms()
    ->receive() //receive will be automatically handled if not passed, should be passed as a StdClass Object
    ->getApplication();
$handler->sms()
    ->receive() //receive will be automatically handled if not passed, should be passed as a StdClass Object
    ->getSender();
```
