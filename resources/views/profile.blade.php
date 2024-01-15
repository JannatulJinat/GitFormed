@extends('layout.app', ['hide_header' =>false, 'hide_footer' =>false])
@section('content')
    <div class="p-10">
        <p class="mb-5">My Profile</p>
        <p class="mb-5">User Name: {{ auth()->user()->user_name }}</p>
        <p class="mb-5">Email: {{ auth()->user()->email }}</p>
    </div>
@endsection
