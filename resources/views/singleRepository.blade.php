@extends('layout.app', ['hide_header' => false, 'hide_footer' => false])
@section('content')
    <div class="flex items-center justify-center mt-5 p-10">
        <div class="bg-gray-50 rounded-lg shadow-lg p-10">
            <p class="text-lg p-5">Repository Title: {{ $repository_title }}</p>
            <p class="text-lg p-5">Owner of this repository: {{ $owner_name }}</p>
            @if (Auth::user()->user_name === $owner_name)
                <a href="{{ url(auth()->user()->user_name . '/' . $repository_title . '/create-pull-request') }}"><button
                        class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded mb-10">Create a Pull
                        Request</button></a>
            @endif
            <table class="border-separate border border-slate-400 mb-10">
                <thead class="text-center">
                    <tr class="bg-gray-500 text-white">
                        <th class="py-2 px-3">Pull Request Title</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($pull_requests as $item)
                        <tr>
                            <td class="border border-slate-400 px-2 py-2">{{ $item->pull_request_title }}</td>
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
