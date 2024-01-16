@extends('layout.app', ['hide_header' => true, 'hide_footer' => true])
@section('content')
    <div class="mt-5 flex items-center justify-center">
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
    <div class="border border-gray-800 m-5">

        <table class="border-separate border border-slate-400 w-full text-center">
            <thead class="text-center">
                <tr class="bg-gray-500 text-white">
                    <th class="py-2 px-3">List of existing repositories</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($repositories as $repository)
                    <tr>
                        <td class="border border-slate-400 px-2 py-2">{{ $repository->repository_name }}</td>
                        @auth
                            <td class="border border-slate-400 px-5 py-5">
                                <a href="{{ route('store-watcher', ['repository_id' => $repository->id]) }}"  class="bg-gray-200 rounded-md hover:bg-green-500 px-5 py-3 mr-5">
                                    Add me as
                                    watcher</a>
                            </td>
                        @endauth

                    </tr>
                @empty
                    <tr>
                        <td class="border border-slate-400">------------------No records------------------</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
