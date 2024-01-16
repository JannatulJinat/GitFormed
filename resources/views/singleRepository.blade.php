@extends('layout.app', ['hide_header' => false, 'hide_footer' => false])
@section('content')
    <div class="flex items-center justify-center mt-5 p-10">
        <div class="bg-gray-50 rounded-lg shadow-lg p-10">
            <p class="text-lg p-5">Repository Title: {{ $repository_title }}</p>
            <p class="text-lg p-5">Owner of this repository: {{ $owner_name }}</p>
            @if (Auth::user()->user_name === $owner_name)
            <a href="/create-pull-request"><button
                class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Create a Pull
                Request</button></a>
            </div>
            @endif
    </div>
@endsection
