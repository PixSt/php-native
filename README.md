Pix Street API native PHP library
=================================

This is the native PHP implementation of Pix Street API. [Pix Street](https://pix.st) is a cloud-based image hosting with advanced features.

Installation
------------

The preferred way to install the library is through [composer](http://getcomposer.org/download/).

Run
```
composer.phar require pixst/pixst
```
or add
```json
"pixst/pixst": "~1.0.0",
```
to the require section of composer.json.

Usage
-----

Create album and store images

```php
use pixst\ClientJson;

// Pix Street API ID
$apiID = 'example@domain.com';

// Pix Street API key
$apiKey = 'abcdef0123456789';

// Create API client
$pix = new ClientRest($apiID, $apiKey);

// Create public image with ID "testImage-1" from remote URL "https://cdn.pix.st/a.jpg"
// and put it in album "Test album"
$pix->imageCreate()
    ->setId('testImage-1')
    ->setSourceUrl('https://cdn.pix.st/a.jpg'])
    ->setPublic(true)
    ->execute();

// Create public image with ID "testImage-2" from local file, rotate clockwise by 90°,
// resize to 640 x 480 and create short URL for it
$pix->imageCreate()
    ->setId('testImage-2')
    ->setSourceFile('local-image-file.jpg')
    ->setPublic(true)
    ->setShorthen(true)
    ->setTags(['test', 'image'])
    ->setRotate(90, true)
    ->setResize(640, 480)
    ->setJpegQuality(98)
    ->execute();
```

Download image

```php
use pixst\ClientJson;

// Pix Street API ID
$apiID = 'example@domain.com';

// Pix Street API key
$apiKey = 'abcdef0123456789';

// Create API client
$pix = new ClientRest($apiID, $apiKey);

// Download image
$binary = $pix->imageDownload()->setId('testImage-1')->execute();
file_put_contents('test-image.jpg', $binary);
```

Delete image

```php
use pixst\ClientJson;

// Pix Street API ID
$apiID = 'example@domain.com';

// Pix Street API key
$apiKey = 'abcdef0123456789';

// Create API client
$pix = new ClientRest($apiID, $apiKey);

// Delete image
$pix->imageDelete()
    ->setId('testImage-1')
    ->execute();
```
