<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            View Device
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="max-w-7xl p-6 bg-white border border-gray-200 rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-700">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                                {{ $device->name }}
                        </h5>
                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Address: {{$device->address}}</p>
                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Geographic Coordinates: {{$device->latitude}}, {{$device->longitude}}</p>
                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Device: {{ $device->model}} - {{ $device->device_type }} - {{$device->manufacturer}}</p>
                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Install Date: {{$device->install_date}}</p>
                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Notes: {{$device->notes}}</p>
                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">EUI: {{$device->eui}}</p>
                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Serial Number: {{$device->serial_number}}</p>
                        <br><br>
                        <a class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-full text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700"  href="{{route('update-device-form', $device->id)}}">Edit device</a>
                        <a class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-full text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700" href="{{route('delete-device', $device->id)}}" onclick="return confirm('Are you sure?')">Delete device</a>
                    </div>
                </div>    
            </div>
        </div>
    </div>
</div>
</x-app-layout>