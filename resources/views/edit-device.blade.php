<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Device - {{$device->name}}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div>
                        <h1>Device</h1>
                        <ul class="pl-3">
                                <form class="panel-body" action="/device/{{$device->id}}/update" method="POST">
                                    @csrf
                                    <input name="id" type="hidden" value="{{$device->id}}">
                                    <fieldset class="form-group">
                                    <label for="form-group-input-1">Name</label>
                                        <input type="text" name="name" class="form-control" id="form-group-input-1" value="{{$device->name}}">
                                    </fieldset>
                                    <fieldset class="form-group">
                                        <label for="form-group-input-1">Address</label>
                                        <input type="text" name="address" class="form-control" id="form-group-input-1" value="{{$device->address}}">
                                    </fieldset>
                                    <fieldset class="form-group">
                                        <label for="form-group-input-1">Latitude</label>
                                        <input type="text" name="latitude" class="form-control" id="form-group-input-1" value="{{$device->latitude}}">
                                    </fieldset>
                                    <fieldset class="form-group">
                                        <label for="form-group-input-1">Longitude</label>
                                        <input type="text" name="longitude" class="form-control" id="form-group-input-1" value="{{$device->longitude}}">
                                    </fieldset>
                                    <fieldset class="form-group">
                                        <label for="form-group-input-1">Model</label>
                                        <input type="text" name="model" class="form-control" id="form-group-input-1" value="{{$device->model}}">
                                    </fieldset>
                                    <fieldset class="form-group">
                                        <label for="form-group-input-1">Device Type</label>
                                        <input type="text" name="device_type" class="form-control" id="form-group-input-1" value="{{$device->device_type}}">
                                    </fieldset>
                                    <fieldset class="form-group">
                                        <label for="form-group-input-1">Manufacturer</label>
                                        <input type="text" name="manufacturer" class="form-control" id="form-group-input-1" value="{{$device->manufacturer}}">
                                    </fieldset>
                                    <fieldset class="form-group">
                                        <label for="form-group-input-1">Install Date</label>
                                        <input type="date" name="install_date" class="form-control" id="form-group-input-1" value="{{$device->install_date}}">
                                    </fieldset>
                                    <fieldset class="form-group">
                                        <label for="form-group-input-1">Notes</label>
                                        <input type="text" name="notes" class="form-control" id="form-group-input-1" value="{{$device->notes}}">
                                    </fieldset>
                                    <fieldset class="form-group">
                                        <label for="form-group-input-1">EUI</label>
                                        <input type="text" name="eui" class="form-control" id="form-group-input-1" value="{{$device->eui}}">
                                    </fieldset>
                                    <fieldset class="form-group">
                                        <label for="form-group-input-1">Serial Number</label>
                                        <input type="text" name="serial_number" class="form-control" id="form-group-input-1" value="{{$device->serial_number}}">
                                    </fieldset>
                                    <button type="submit" class="btn btn-primary pull-right">Submit</button>
                                </form>
                        <ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
