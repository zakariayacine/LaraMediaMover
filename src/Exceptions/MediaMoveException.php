<?php

namespace Zakariayacine\LaraMediaMover\Exceptions;

use Exception;

class MediaMoveException extends Exception
{
    protected $mediaFilePath; // Une propriété pour stocker le chemin du fichier de média concerné

    public function __construct($message, $mediaFilePath = null)
    {
        parent::__construct($message);
        $this->mediaFilePath = $mediaFilePath;
    }

    public function getMediaFilePath()
    {
        return $this->mediaFilePath;
    }
}
