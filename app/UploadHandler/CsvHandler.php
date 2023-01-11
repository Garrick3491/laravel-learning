<?php

namespace App\UploadHandler;

use League\Csv\Reader;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;
use Carbon\Carbon;

class CsvHandler {


    public function saveCsvAndReturnFileName(UploadedFile $file, int $userId): string
    {
        $destinationPath = 'uploads';
        $timestamp = Carbon::now();

        $fileName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);

        $extension = pathinfo($file->getClientOriginalName(), PATHINFO_EXTENSION);

        Storage::put("uploads/$userId/$fileName - $timestamp->timestamp.$extension", file_get_contents($file->getRealPath()));

        return "uploads/$userId/$fileName - $timestamp->timestamp.$extension";
    }

    public function saveCsvAndReturnArrayOfRecords(UploadedFile $file, int $userId)
    {
        $fileName = $this->saveCsvAndReturnFileName($file, $userId);

        return $this->getFileForFileName($fileName);
    }

    public function getFileForFileName(string $fileName)
    {
        $string = Storage::get($fileName);

        $csv = Reader::createFromString($string);
        $csv->setHeaderOffset(0);

        return $csv;
    }
}