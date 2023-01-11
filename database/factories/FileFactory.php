<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Auth;
use App\Models\File;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\File>
 */
class FileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            //
        ];
    }

    public function createFromArray(array $fileArray)
    {
        $keys = [
            'name',
            'location',
            'user_id',
            'expected_device_count'
        ];

        foreach ($keys as $key)
        {
            if (!array_key_exists($key, $fileArray))
            {
                throw new MissingDataException($key);
            }
        }

        $file = File::create($fileArray);

        Auth::user()->files()->save($file);

        return $file;
    }
}