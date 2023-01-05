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
                    <div>
                        <h1>Devices</h1> <form action="{{route('device-upload')}}" method="post" enctype="multipart/form-data">
          <h3 class="text-center mb-5">Upload File in Laravel</h3>
            @csrf
            @if ($message = Session::get('success'))
            <div class="alert alert-success">
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
                <input type="file" name="file" class="custom-file-input" id="chooseFile">
                <label class="custom-file-label" for="chooseFile">Select file</label>
            </div>
            <button type="submit" name="submit" class="btn btn-primary btn-block mt-4">
                Upload Files
            </button>
        </form>
                        <br>
                        <ul class="pl-3">
                        @foreach ($devices as $device)
                                <li>
                                    Name: {{ $device->name }} 
                                </li>
                                <li>
                                    Address: {{$device->address}}
                                </li>
                                <li>
                                    Lat Long: {{$device->latitude}}, {{$device->longitude}}
                                </li>
                                <li>
                                    Device: {{ $device->model}} - {{ $device->device_type }} - {{$device->manufacturer}}
                                </li>
                                <li>
                                    Install Date: {{$device->install_date}}
                                </li>
                                <li>
                                    Note: {{$device->note}}
                                </li>
                                <li>
                                    EUI: {{$device->eui}}
                                </li>
                                <li>{{$device->serial_number}}</li>
                                <br>
                        @endforeach
                        <ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
