@extends('layout.app', ['hide_header' =>false, 'hide_footer' =>false])
@section('content')
    <div class="p-10">
        <p class="mb-5">My Profile</p>
        <p class="mb-5">User Name: {{ auth()->user()->user_name }}</p>
        <p class="mb-5">Email: {{ auth()->user()->email }}</p>
        <a href="{{route('create-repository')}}">
            <button class="bg-green-500 text-white rounded-md cursor-pointer hover:bg-green-700 px-4 py-2 mb-4 mt-3">Create New Repository</button>
        </a>
    </div>
@endsection
