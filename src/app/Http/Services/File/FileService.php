<?php

namespace App\Http\Services\File;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

/**
 * Class FileService
 *
 * @author Mahmmad Mammadov <<muhammed.mammadov.89@gmail.com>>
 */
class FileService
{
    /**
     * @var string
     */
    protected string $directory = 'files';

    /**
     * Upload file to server
     *
     * @param array $data
     * @return string
     */
    public function uploadFile(array $data): string
    {
        $fileName = date('Y-m-d') . '/' .Str::random(32) . '.' . $data['file']->getClientOriginalExtension();
        $fullPath = $this->directory . '/' . $fileName;

        Storage::disk('public')->put($fullPath, @file_get_contents($data['file']));

        return $fullPath;
    }

}
