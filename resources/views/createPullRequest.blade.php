@extends('layout.app', ['hide_header' => false, 'hide_footer' => false])
@section('content')
    <div class="flex items-center justify-center mt-5 p-10">
        <div class="bg-gray-50 rounded-lg shadow-lg p-10">
            <p class="text-xxl p-5">Create a new pull request</p>
            <form method="POST"
                action="{{ route('store-pull-request', ['user_name' => $user_name, 'repository_title' => $repository_title]) }}"
                class="bg-gray-200 shadow-lg rounded-md p-5">
                @csrf
                <label class="text-lg ">Pull Request Title</label>
                <input type= "text" name="pull_request_title"
                    class="border border-gray-900 rounded-md focus:outline-none focus:border-gray-500 w-full p-5 mt-2 @error('pull_request_title') !border-red-500 @enderror">
                @error('pull_request_title')
                    <p class="text-red-600 text-sm">{{ $message }}</p>
                @enderror
                <br>
                <input type="submit" value="Create"
                    class="bg-green-500 text-white rounded-md cursor-pointer hover:bg-green-700 w-full mt-2 py-1 mt-3">
            </form>
        </div>
    </div>
@endsection
