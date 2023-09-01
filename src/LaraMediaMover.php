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
        public string $fileName = null,
        public string $disk = null
    ) {
        // Utilisez Config::get pour obtenir les valeurs de configuration par défaut
        $this->fileName = $fileName ?? Config::get('laramediamover.defaultFileName', 'no_name_provided');
        $this->disk = $disk ?? Config::get('laramediamover.defaultDisk', 'local');
    }

    /**
     * Move the file to the specified storage disk and return its URL.
     *
     * @return string|null The URL of the moved file or null on failure.
     */
    public function moveFile(): ?string
    {
        try {
            $path = $this->pathConstructor();

            // Use Laravel's Storage facade to put the file on the specified disk
            $value = Storage::disk($this->disk)->put($path, $this->file, [
                'visibility' => 'public',
            ]);

            // Return the URL of the moved file
            return Storage::disk($this->disk)->url($value);
        } catch (\Throwable $th) {
            throw new MediaMoveException("Failed to move the media file: " . $th->getMessage());
        }
    }

    /**
     * Construct the storage path for the file based on its extension and filename.
     *
     * @return string The constructed storage path.
     */
    private function pathConstructor(): string
    {
        $fileName = $this->file['name'] ?? $this->fileName;

        // Combine the extension and filename and get the storage folder path
        return PathExtensionMatcher::getFolderPathByExtension($this->extension) .
            FileNameGenerator::nameHasher($fileName, $this->extension);
    }
}
