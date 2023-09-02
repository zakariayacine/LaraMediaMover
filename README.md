# LaraMediaMover
![Logo](https://i.ibb.co/59tF5Sw/lara-Media-Mover.png)
LaraMediaMover is a versatile Laravel package that simplifies the movement and management of multimedia files of all types, including images, videos, and documents. It provides a comprehensive solution for uploading, storage, renaming, and handling files, ensuring a seamless development experience for Laravel projects.

[![License](https://img.shields.io/badge/license-MIT-blue.svg)](https://github.com/zakariayacine/laramediamover/blob/main/LICENSE)
[![Latest Version on Packagist](https://img.shields.io/packagist/v/zakariayacine/laramediamover.svg)](https://packagist.org/packages/zakariayacine/laramediamover)
[![Total Downloads](https://img.shields.io/packagist/dt/zakariayacine/laramediamover.svg)](https://packagist.org/packages/zakariayacine/laramediamover)

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

This will create a `laramediamover.php` configuration file in your `config` directory. You can customize the configuration according to your needs.

## Usage

To use LaraMediaMover, you need to create an instance of the `LaraMediaMover` class and call the `moveFile` method. Here's an example of how to use it:

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

- `$fileContent` is the content of the media file you want to move.
- `'jpg'` is the file extension.
- `'my_image.jpg'` is the desired file name.
- `'public'` is the storage disk you want to use.

You can customize these parameters according to your requirements.

## Configuration

You can customize the package's behavior by modifying the `laramediamover.php` configuration file located in your `config` directory. This file allows you to define default settings for the package.

## Exceptions

The package may throw a `MediaMoveException` in case of an error during the media move process. You can catch this exception to handle errors gracefully.

```php
use Zakariayacine\LaraMediaMover\Exceptions\MediaMoveException;

try {
    // Attempt to move the media file here
} catch (MediaMoveException $e) {
    // Handle the error, log it, or return an error response
}
```

## Example URLs with Hashed File Names

To illustrate how the LaraMediaMover package generates URLs with hashed file names, here are some examples using hashed names:

### PDF Files

- Original File Name: `document.pdf`
- Hashed File Name: `4e76275d9d4b3b51c1ab9a44d5c0c15399d02889163361749e1645aa27b5eaffed001.pdf`
- Storage Path: `PDF/4e76275d9d4b3b51c1ab9a44d5c0c15399d02889163361749e1645aa27b5eaffed001.pdf`
- Generated URL: `https://example.com/storage/PDF/4e76275d9d4b3b51c1ab9a44d5c0c15399d02889163361749e1645aa27b5eaffed001.pdf`

### Images

- Original File Name: `picture.jpg`
- Hashed File Name: `7b5eaffed0014e76275d9d4b3b51c1ab9a44d5c0c15399d02889163361749e1645aa27b5ea.jpg`
- Storage Path: `IMAGES/7b5eaffed0014e76275d9d4b3b51c1ab9a44d5c0c15399d02889163361749e1645aa27b5ea.jpg`
- Generated URL: `https://example.com/storage/IMAGES/7b5eaffed0014e76275d9d4b3b51c1ab9a44d5c0c15399d02889163361749e1645aa27b5ea.jpg`

### Videos

- Original File Name: `video.mp4`
- Hashed File Name: `5d9d4b3b51c1ab9a44d5c0c15399d02889163361749e1645aa27b5ea5d9d4b3b51.mp4`
- Storage Path: `VIDEOS/5d9d4b3b51c1ab9a44d5c0c15399d02889163361749e1645aa27b5ea5d9d4b3b51.mp4`
- Generated URL: `https://example.com/storage/VIDEOS/5d9d4b3b51c1ab9a44d5c0c15399d02889163361749e1645aa27b5ea5d9d4b3b51.mp4`

### Audio

- Original File Name: `audio.mp3`
- Hashed File Name: `ea5d9d4b3b51c1ab9a44d5c0c15399d02889163361749e1645aa27b5eaaudio.mp3`
- Storage Path: `AUDIO/ea5d9d4b3b51c1ab9a44d5c0c15399d02889163361749e1645aa27b5eaaudio.mp3`
- Generated URL: `https://example.com/storage/AUDIO/ea5d9d4b3b51c1ab9a44d5c0c15399d02889163361749e1645aa27b5eaaudio.mp3`

### Other Files

- Original File Name: `other.docx`
- Hashed File Name: `1c1ab9a44d5c0c15399d02889163361749e1645aa27b5eaaother.docx`
- Storage Path: `OTHER/1c1ab9a44d5c0c15399d02889163361749e1645aa27b5eaaother.docx`
- Generated URL: `https://example.com/storage/OTHER/1c1ab9a44d5c0c15399d02889163361749e1645aa27b5eaaother.docx`

These examples showcase how the LaraMediaMover package generates URLs with hashed file names for different types of media files based on their extensions and storage paths. The hashed file names provide security and uniqueness to each file.

## License

This package is open-sourced software licensed under the MIT license.

Please customize this README to include specific instructions, details, or additional information related to your package. Replace the placeholder content with actual package details, usage instructions, and license information.

For more information and updates, visit the [LaraMediaMover GitHub repository](https://github.com/zakariayacine/laramediamover).
