@extends('layout.app', ['hide_header' => false, 'hide_footer' => false])
@section('content')
    <div class="flex items-center justify-center mt-5 p-10">
        <div class="bg-gray-50 rounded-lg shadow-lg p-10">
            <p class="text-xxl p-5">Create a new repository</p>
            <form method="POST" action="{{ route('create-repository') }}" class="bg-gray-200 shadow-lg rounded-md p-5">
                @csrf
                <label class="text-lg ">Repository Name</label>
                <input type= "text" name="repository_name" required
                    class="border border-gray-900 rounded-md focus:outline-none focus:border-gray-500 w-full p-5 mt-2 @error('repository_name') !border-red-500 @enderror">
                @error('repository_name')
                    <p class="text-red-600 text-sm">{{ $message }}</p>
                @enderror
                <br>
                <input type="submit" value="Create"
                    class="bg-green-500 text-white rounded-md cursor-pointer hover:bg-green-700 w-full mt-2 py-1 mt-3">
            </form>
        </div>
    </div>
@endsection
