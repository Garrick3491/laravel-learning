<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Device;
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
            'note' => $this->faker->paragraph,
            'eui' => $this->faker->uuid,
            'serial_number' => $this->faker->uuid
        ];
    }

    public function createFromArray(array $devicesArray)
    {
        $device = Device::create();
        $device->name = $deviceArray['name'];
        $device->address = $deviceArray['address'];
        $device->longitude = $deviceArray['logitude'];
        $device->latitude = $deviceArray['latitude'];
        $device->device_type = $deviceArray['device_type'];
        $device->manufacturer = $deviceArray['manugacturer'];
        $device->model = $deviceArray['model'];
        $device->install_date = new \DateTime($deviceArray['install_date']);
        $device->notes = $deviceArray['notes'];
        $device->eui = $deviceArray['eui'];
        $device->serial_number = $device['serial_number'];
        $device->save();

        return $device;
    }
}
