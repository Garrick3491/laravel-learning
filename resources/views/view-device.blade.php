<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            View Device
        </h2>
    </x-slot>

    <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-purple-200">
                        <div class="max-w-7xl p-6 bg-white border border-purple-200 rounded-lg shadow-md">
                        <p class="mb-3 font-normal">Address: {{$device->address}}</p>
                        <p class="mb-3 font-normal">Geographic Coordinates: {{$device->latitude}}, {{$device->longitude}}</p>
                        <p class="mb-3 font-normal">Device: {{ $device->model}} - {{ $device->device_type }} - {{$device->manufacturer}}</p>
                        <p class="mb-3 font-normal">Install Date: {{$device->install_date}}</p>
                        <p class="mb-3 font-normal">Notes: {{$device->notes}}</p>
                        <p class="mb-3 font-normal">EUI: {{$device->eui}}</p>
                        <p class="mb-3 font-normal">Serial Number: {{$device->serial_number}}</p>
                            <br><br>
                            <a class="px-3 py-2 text-xs font-medium text-center text-white bg-gradient-to-br from-purple-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2"  href="{{route('update-device-form', $device->id)}}">Edit device</a>
                            <a class="px-3 py-2 text-xs font-medium text-center text-white bg-gradient-to-br from-purple-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2" href="{{route('delete-device', $device->id)}}" onclick="return confirm('Are you sure?')">Delete device</a>
                        </div>
                    </div>    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>