<?php

namespace Zakariayacine\LaraMediaMover\Services;

class PathExtensionMatcher
{
    /*
     * Constants representing major existing paths.
     */
    private const P_PDF = 'public/PDF/';
    private const P_DOC = 'public/DOCUMENTS/';
    private const P_IMAGE = 'public/IMAGES/';
    private const P_VIDEO = 'public/VIDEOS/';
    private const P_AUDIO = 'public/AUDIO/';
    private const P_ARCHIVE = 'public/ARCHIVES/';
    private const P_SPREADSHEET = 'public/SPREADSHEETS/';
    private const P_PRESENTATION = 'public/PRESENTATIONS/';

    /*
     * Static array mapping file extensions to major existing paths.
     */
    private static $fileTypeMapping = [
        'pdf' => self::P_PDF,
        'doc' => self::P_DOC,
        'docx' => self::P_DOC,
        'txt' => self::P_DOC,
        'jpeg' => self::P_IMAGE,
        'jpg' => self::P_IMAGE,
        'png' => self::P_IMAGE,
        'gif' => self::P_IMAGE,
        'bmp' => self::P_IMAGE,
        'mp4' => self::P_VIDEO,
        'avi' => self::P_VIDEO,
        'mkv' => self::P_VIDEO,
        'mov' => self::P_VIDEO,
        'mp3' => self::P_AUDIO,
        'wav' => self::P_AUDIO,
        'flac' => self::P_AUDIO,
        'aac' => self::P_AUDIO,
        'zip' => self::P_ARCHIVE,
        'rar' => self::P_ARCHIVE,
        '7z' => self::P_ARCHIVE,
        'tar' => self::P_ARCHIVE,
        'xls' => self::P_SPREADSHEET,
        'xlsx' => self::P_SPREADSHEET,
        'csv' => self::P_SPREADSHEET,
        'ppt' => self::P_PRESENTATION,
        'pptx' => self::P_PRESENTATION,
    ];

    /**
     * Get the folder by extension.
     *
     * @param string $extension The file extension.
     * @return string The corresponding folder or 'OTHER' if not found.
     */
    
    public static function getFolderPathByExtension($extension)
    {
        // Convert the extension to lowercase to avoid case sensitivity issues
        $extension = strtolower($extension);

        // Check if the extension exists in the mapping array
        if (array_key_exists($extension, self::$fileTypeMapping)) {
            return self::$fileTypeMapping[$extension] . $extension . '/';
        } else {
            return 'public/OTHER/'; // If the extension is not listed, return 'OTHER' by default or another appropriate value.
        }
    }

}
