@extends('layout.app', ['hide_header' => true, 'hide_footer' => true])
@section('content')
    <div class="min-h-screen flex items-center justify-center mt-5">
        <div class="bg-black rounded-lg shadow-lg p-10">
            <div class="text-center">
                <h1 class="text-4xl text-white font-bold mb-5">
                    <a href="{{ route('home') }}">RunMeQuick</a>
                </h1>
            </div>
            <div>
                <form method="POST" action="{{ route('login') }}" class="bg-white shadow-md rounded-md p-10 w-96">
                    @csrf
                    <label class="text-sm mb-2">Email</label>
                    <input type= "email" name="email" value="{{ old('email') }}" required
                        class="border px-3 py-2 mb-4 w-full @error('email') !border-red-500 @enderror">
                    @error('email')
                        <p class="text-red-600 text-sm">{{ $message }}</p>
                    @enderror
                    <br>
                    <label class="text-sm mb-2">Password</label>
                    <input type= "password" name="password" required
                        class="border px-3 py-2 mb-4 w-full @error('password') !border-red-500 @enderror">
                    @error('password')
                        <p class="text-red-600 text-sm">{{ $message }}</p>
                    @enderror
                    <br>
                    <input type="submit" value="Login"
                        class="w-full bg-green-500 text-white rounded-md cursor-pointer hover:bg-green-700 px-4 py-2 mb-4 mt-3">
                    <p class="text-center text-sm">Don't have an account? <a href="{{ route('register') }}"
                            class="text-green-500 hover:underline">Sign up</a></p>
                </form>
            </div>
        </div>
    </div>
@endsection
