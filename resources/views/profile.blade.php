@extends('layout.app', ['hide_header' =>false, 'hide_footer' =>false])
@section('content')
    <div class="p-10">
        <p class="mb-5">My Profile</p>
        <p class="mb-5">User Name: {{ auth()->user()->user_name }}</p>
        <p class="mb-5">Email: {{ auth()->user()->email }}</p>
        <a href="{{route('create-repository')}}">
            <button class="bg-green-500 text-white rounded-md cursor-pointer hover:bg-green-700 px-4 py-2 mb-4 mt-3">Create New Repository</button>
        </a>
        <div class="border border-gray-800 m-5">

        <table class="border-separate border border-slate-400 w-full text-center">
            <thead class="text-center">
                <tr class="bg-gray-500 text-white">
                    <th class="py-2 px-3">List of my repositories</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($repositories as $repository)
                    <tr>
                        <td class="border border-slate-400 px-2 py-2">{{ $repository->repository_name }}</td>
                    </tr>
                @empty
                    <tr>
                        <td class="border border-slate-400">------------------No records------------------</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        <table class="border-separate border border-slate-400 w-full text-center">
            <thead class="text-center">
                <tr class="bg-gray-500 text-white">
                    <th class="py-2 px-3">List of repositories I am watching.</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($watchedrepositories as $watchedrepository)
                    <tr>
                        <td class="border border-slate-400 px-2 py-2">{{ $watchedrepository->repository_name }}</td>
                    </tr>
                @empty
                    <tr>
                        <td class="border border-slate-400">------------------No records------------------</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    </div>
@endsection
