<?php

namespace Zakariayacine\LaraMediaMover\Services;

class FileNameGenerator
{

    /**
     * Get the folder by extension.
     *
     * @param string $extension The file extension.
     * @return string The corresponding folder or 'OTHER' if not found.
     */
    
    public static function nameHasher($fileName)
    {
        return hash('ripemd160', $fileName).time();
    }

}
 