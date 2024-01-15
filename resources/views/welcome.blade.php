@extends('layout.app', ['hide_header' => true, 'hide_footer' => true])
@section('content')
    <div class="min-h-screen flex items-center justify-center">
        <div class="bg-black rounded-lg shadow-lg p-10">
            <div class="text-center">
                <h1 class="text-4xl text-white font-bold">GitFormed</h1>
            </div>
            <div class="mt-10">
                @auth
                    <a href= "{{ route('profile') }}" class="bg-gray-200 rounded-md hover:bg-green-500 px-5 py-3">Profile</a>
                @else
                    <a href="{{ route('register') }}"
                        class="bg-gray-200 rounded-md hover:bg-green-500 px-5 py-3 mr-5">Register</a>
                    <a href="{{ route('login') }}" class="bg-gray-200 rounded-md hover:bg-green-500 px-5 py-3 mr-5">Login</a>
                @endauth
            </div>
        </div>
    </div>
@endsection
