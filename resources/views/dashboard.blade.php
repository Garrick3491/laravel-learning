<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="max-w-7xl p-6 bg-white border border-gray-200 rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-700">
                            <form action="{{route('device-upload')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                @if ($message = Session::get('success'))
                                    <div class="alert alert-success">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @endif
                                @if ($message = Session::get('error'))
                                <div class="alert alert-error">
                                        <strong>{{ $message }}</strong>
                                </div>
                                @endif
                                @if (count($errors) > 0)
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                @endif
                                <div class="custom-file">
                                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">Upload file</label>
                                    <input name="file" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="file_input" type="file">
                                </div>
                            <br>
                            <button type="submit" name="submit" class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-full text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">
                                Upload File
                            </button>
                        </form>
                    </div>
                    <br>
                    @foreach ($devices as $device)
                    <div class="max-w-7xl p-6 bg-white border border-gray-200 rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-700">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                                {{ $device->name }}
                        </h5>
                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Address: {{$device->address}}</p>
                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Lat Long: {{$device->latitude}}, {{$device->longitude}}</p>
                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Device: {{ $device->model}} - {{ $device->device_type }} - {{$device->manufacturer}}</p>
                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Install Date: {{$device->install_date}}</p>
                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Notes: {{$device->notes}}</p>
                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">EUI: {{$device->eui}}</p>
                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Serial Number: {{$device->serial_number}}</p>
                        <br><br>
                        <a class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-full text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700"  href="{{route('update-device-form', $device->id)}}">Edit device</a>
                        <a class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-full text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700" href="{{route('delete-device', $device->id)}}" onclick="return confirm('Are you sure?')">Delete device</a>
                    </div>
                    <br>
                    @endforeach
                    <ul class="inline-flex -space-x-px">
                        @foreach ($links as $link)
                            <li>
                                @if($link->active == true)
                                    <a href="{{$link->url}}" aria-current="page" class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-full text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">{{ $link->label }}</a>
                                @else
                                    <a href="{{$link->url}}" class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-full text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">{!!$link->label!!}</a>
                                @endif
                            </li>
                        @endforeach
                    </ul>
                </div>
                
            </div>
        </div>
    </div>
</div>
</x-app-layout>
