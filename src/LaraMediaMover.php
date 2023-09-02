<?php

namespace Zakariayacine\LaraMediaMover;

use Illuminate\Support\Facades\Storage;
use Zakariayacine\LaraMediaMover\Services\FileNameGenerator;
use Zakariayacine\LaraMediaMover\Services\PathExtensionMatcher;
use Zakariayacine\LaraMediaMover\Exceptions\MediaMoveException;
use Illuminate\Support\Facades\Config;

class LaraMediaMover
{
    /**
     * Create a new LaraMediaMover instance.
     *
     * @param mixed $file The file content or path.
     * @param string $extension The file extension.
     * @param string $fileName The desired file name (default: "no_name_provided").
     * @param string $disk The storage disk to use (default: "local").
     */
    public function __construct(
        public $file,
        public string $extension,
        public $fileName = null,
        public $disk = null,
    ) {
        // Use Config::get to retrieve default configuration values
        $this->fileName = $fileName ?? Config::get('laramediamover.defaultFileName');
        $this->disk = $disk ?? Config::get('laramediamover.defaultDisk');
    }

    /**
     * Move the file to the specified storage disk and return its URL.
     *
     * @return string|null The URL of the moved file or null on failure.
     */
    public function moveFile(): ?string
    {
        try {
            // Get the folder path based on the file extension
            $path = PathExtensionMatcher::getFolderPathByExtension($this->extension);
            
            // Use the original file name or the provided file name
            $fileName = $this->file->getClientOriginalName() ?? $this->fileName;
            
            // Use Laravel's Storage facade to put the file on the specified disk
            $value = Storage::disk($this->disk)->putFileAs(
                $path, 
                $this->file,
                FileNameGenerator::nameHasher($fileName) . '.' . $this->extension,
            );
            
            // Return the URL of the moved file
            return Storage::disk($this->disk)->url($value);
        } catch (\Throwable $th) {
            throw new MediaMoveException("Failed to move the media file: " . $th->getMessage());
        }
    }
}
