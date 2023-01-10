<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-purple-200">
                    <div class="max-w-7xl p-6 bg-white border border-purple-200 rounded-lg">
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
                                    <label class="block mb-2 text-sm font-medium" for="file_input">Upload file</label>
                                    <input name="file" class="block w-full text-sm border border-purple-300 rounded-lg cursor-pointer focus:outline-none" id="file_input" type="file">
                                </div>
                            <br>
                            <button type="submit" name="submit" class="px-3 py-2 text-xs font-medium text-center text-white bg-gradient-to-br from-purple-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">
                                Upload File
                            </button>
                        </form>
                    </div>
                    <br>
                    @foreach ($devices as $device)
                    <div class="max-w-7xl p-6 bg-white border border-purple-200 rounded-lg">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight">
                                {{ $device->name }}
                        </h5>
                        <br>
                        <a class="px-3 py-2 text-xs font-medium text-center text-white bg-gradient-to-br from-purple-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2" href="{{route('view-device', $device->id)}}">View Device</a>
                        <a class="px-3 py-2 text-xs font-medium text-center text-white bg-gradient-to-br from-purple-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2"  href="{{route('update-device-form', $device->id)}}">Edit device</a>
                        <a class="px-3 py-2 text-xs font-medium text-center text-white bg-gradient-to-br from-purple-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2" href="{{route('delete-device', $device->id)}}" onclick="return confirm('Are you sure?')">Delete device</a>
                    </div>
                    <br>
                    @endforeach
                    <ul class="inline-flex -space-x-px">
                        @foreach ($links as $link)
                            <li>
                                @if($link->active == true)
                                    <a href="{{$link->url}}" aria-current="page" class="px-3 py-2 text-xs font-medium text-center text-white bg-gradient-to-br from-purple-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">{{ $link->label }}</a>
                                @else
                                    <a href="{{$link->url}}" class="px-3 py-2 text-xs font-medium text-center text-white bg-gradient-to-br from-purple-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">{!!$link->label!!}</a>
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
