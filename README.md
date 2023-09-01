# LaraMediaMover

LaraMediaMover is a Laravel package that simplifies the process of moving media files to a specified storage disk using Laravel's Storage system.

## Installation

You can install this package via Composer by running the following command:

```bash
composer require zakariayacine/laramediamover
```
The package will automatically register itself.

Next, you should publish the package configuration file using the following command:

```bash
php artisan vendor:publish --tag=laramediamover-config
```
This will create a laramediamover.php configuration file in your config directory. You can customize the configuration according to your needs.

Usage
To use LaraMediaMover, you need to create an instance of the LaraMediaMover class and call the moveFile method. Here's an example of how to use it:

 ```php
 use Zakariayacine\LaraMediaMover\LaraMediaMover;

// Instantiate LaraMediaMover with the file content, extension, and optional parameters
$mediaMover = new LaraMediaMover($fileContent, 'jpg', 'my_image.jpg', 'public');

// Move the file and get its URL
$mediaUrl = $mediaMover->moveFile();

if ($mediaUrl) {
    // The file has been successfully moved, and $mediaUrl contains its URL
    // You can use $mediaUrl as needed in your application
} else {
    // An error occurred during the file move process
    // Handle the error appropriately
}
```

In the above example:

$fileContent is the content of the media file you want to move.
'jpg' is the file extension.
'my_image.jpg' is the desired file name.
'public' is the storage disk you want to use.
You can customize these parameters according to your requirements.

Configuration
You can customize the package's behavior by modifying the laramediamover.php configuration file located in your config directory. This file allows you to define default settings for the package.

Exceptions
The package may throw a MediaMoveException in case of an error during the media move process. You can catch this exception to handle errors gracefully.

```php
use Zakariayacine\LaraMediaMover\Exceptions\MediaMoveException;

try {
    // Attempt to move the media file here
} catch (MediaMoveException $e) {
    // Handle the error, log it, or return an error response
}
```

License
This package is open-sourced software licensed under the MIT license.

```css
Please note that you should customize this README to include any specific instructions or details related to your package. Additionally, make sure to replace the placeholder content with actual package details, usage instructions, and license information.
```

