<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            View Device - {{$device->name}}
            <a class="text-white bg-gradient-to-r from-purple-500 to-pink-500 hover:bg-gradient-to-l focus:ring-4 focus:outline-none focus:ring-purple-200 dark:focus:ring-purple-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2"  href="{{route('update-device-form', $device->id)}}">Edit device</a>
            <a class="text-white bg-gradient-to-r from-purple-500 to-pink-500 hover:bg-gradient-to-l focus:ring-4 focus:outline-none focus:ring-purple-200 dark:focus:ring-purple-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2" href="{{route('delete-device', $device->id)}}" onclick="return confirm('Are you sure?')">Delete device</a>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="p-6">
                    <div class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-700">
                        <a href="#">
                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white"><a href="{{route('view-device', $device->id)}}">{{ $device->name }}</a></h5>
                        </a>
                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Address: {{$device->address}}</p>
                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Lat Long: {{$device->latitude}}, {{$device->longitude}}</p>
                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Device: {{ $device->model}} - {{ $device->device_type }} - {{$device->manufacturer}}</p>
                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Install Date: {{$device->install_date}}</p>
                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Notes: {{$device->notes}}</p>
                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">EUI: {{$device->eui}}</p>
                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Serial Number: {{$device->serial_number}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
