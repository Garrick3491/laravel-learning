<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Upload History
        </h2>
    </x-slot>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-purple-200">
                @foreach ($files as $file)
                <div class="max-w-7xl p-6 bg-white border border-purple-200 rounded-lg">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight">
                            {{ $file->name }}
                    </h5>
                    <br>
                    <a class="px-3 py-2 text-xs font-medium text-center text-white bg-gradient-to-br from-purple-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2" href="{{route('delete-file', $file->id)}}" onclick="return confirm('Are you sure?')">Delete file from storage</a>
                </div>
                <br>
                @endforeach
                <ul class="inline-flex -space-x-px">
                    @foreach ($links as $link)
                        <li>
                            @if($link['url'] == null)
                                <a aria-current="page" class="px-3 py-2 text-xs font-medium text-center text-white bg-gradient-to-br from-purple-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">{!!$link['label']!!}</a>
                            @else
                                <a href="{{$link['url']}}" class="px-3 py-2 text-xs font-medium text-center text-white bg-gradient-to-br from-purple-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">{!!$link['label']!!}</a>
                            @endif
                        </li>
                    @endforeach
                </ul>
            </div>
            
        </div>
    </div>
</div>
</x-app-layout>
