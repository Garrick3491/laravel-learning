<?php

namespace App\UploadHandler;

use League\Csv\Reader;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;
use Carbon\Carbon;

class CsvHandler {


    public function saveCsvAndConvertToJson(UploadedFile $file, int $userId): string
    {
        $csv = $this->saveCsvAndReturnArrayOfRecords($file, $userId);

        $json = json_encode($csv);

        return $json;
    }

    public function saveCsvAndReturnArrayOfRecords(UploadedFile $file, int $userId)
    {
        $destinationPath = 'uploads';
        $timestamp = Carbon::now();

        Storage::put('uploads/'.$userId .'/' . $file->getClientOriginalName() . '-' . $timestamp->timestamp, file_get_contents($file->getRealPath()));

        $string = Storage::get('uploads/'.$userId .'/' . $file->getClientOriginalName() . '-' . $timestamp->timestamp);

        $csv = Reader::createFromString($string);
        $csv->setHeaderOffset(0);

        return $csv;
    }


}