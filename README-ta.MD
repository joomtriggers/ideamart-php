# PHP SDK for Dialog Ideamart

இந்த களஞ்சியம் கட்டாயமாக PHP 7.0.0 ஐ கொண்டு மட்டுமே தொழில்படும். இது கட்டாயமாக்கப்பட்டுள்ளது. அல்லாதுவிடில் இந்த களஞ்சியம் சரியாக வேலைசெய்யாமல் போகலாம்.

இது Ideamart க்கான ஒரு PHP கோப்புக்களை கொண்ட களஞ்சியமாக அமையும். ஏற்கனவே உள்ள PHP கோப்புகளை விட சிறப்பாக வடிவமைக்கப்படும்.

ஏற்கனவே உள்ள Ideamart PHP கோப்புக்களிலிருந்து இந்த களஞ்சியம் பெரும்பாலான கருத்துக்களில் ஒத்து போகும்.

அத்துடன் இது ஏற்கனவே உள்ள Ideamart IdeaApp வார்ப்புரு சார்ந்த பயன்பாடுகளுக்கும் Ideamart REST API களுக்கும் இடையிலான இடைவெளியை நிறைக்கும் என எதிர்பார்க்கப்படுகிறது.


##Installation நிறுவுதல்

https://getcomposer.org/ பயன்படுத்தவும்
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
