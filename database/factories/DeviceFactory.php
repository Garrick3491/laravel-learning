<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Device;
use App\Exceptions\Api\MissingDataException;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Device>
 */
class DeviceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->sentence,
            'address' => $this->faker->address,
            'longitude' => "53.792530",
            'latitude' => '-1.672400',
            'device_type' => $this->faker->sentence,
            'manufacturer' => $this->faker->sentence,
            'model' => $this->faker->sentence,
            'install_date' => $this->faker->dateTime,
            'notes' => $this->faker->paragraph,
            'eui' => $this->faker->uuid,
            'serial_number' => $this->faker->uuid
        ];
    }

    public function createFromArray(array $deviceArray)
    {
        $keys = [
           'name',
           'address',
           'longitude',
           'latitude',
           'device_type',
           'manufacturer',
           'model',
           'install_date',
           'notes',
           'eui',
           'serial_number',
           'file_id'
        ];

        foreach ($keys as $key)
        {
            if (!array_key_exists($key, $deviceArray))
            {
                throw new MissingDataException($key);
            }
        }

        $device = Device::create($deviceArray);

        $device->save();

        return $device;
    }
}
