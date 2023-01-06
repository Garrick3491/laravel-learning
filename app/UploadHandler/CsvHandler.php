<?php

namespace App\UploadHandler;

use League\Csv\Reader;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;

class CsvHandler {


    public function saveCsvAndConvertToJson(UploadedFile $file, int $userId): string
    {
        $destinationPath = 'uploads';
        Storage::put('uploads/'.$userId .'/' . $file->getClientOriginalName(), file_get_contents($file->getRealPath()));

        $string = Storage::get('uploads/'.$userId .'/' . $file->getClientOriginalName());

        $csv = Reader::createFromString($string);
        $csv->setHeaderOffset(0);

        $json = json_encode($csv);

        return $json;
    }


}