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
                    <p class="mb-3 font-normal">The file {{$filename}} contains {{$recordCount}} records.
                </div>
                <br>
                <form action="{{route('device-upload-approve')}}" method="post" enctype="multipart/form-data">
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
                                <input name="csv" class="block w-full text-sm border border-purple-300 rounded-lg cursor-pointer focus:outline-none" id="file_input" type="hidden" value="{{$csvJson}}">
                            </div>
                        <br>
                        <button type="submit" name="submit" class="px-3 py-2 text-xs font-medium text-center text-white bg-gradient-to-br from-purple-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">
                            Approve File
                        </button>
                        <a class="px-3 py-2 text-xs font-medium text-center text-white bg-gradient-to-br from-purple-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2" href="{{route('dashboard')}}" onclick="return confirm('Are you sure?')">Cancel Upload</a>
                    </form>
            </div>
        </div>
    </div>
</div>
</x-app-layout>
