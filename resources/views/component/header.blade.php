<header class="bg-gray-950 text-white p-4 text-center flex items-center justify-between">
    <div>
        <h1 class="text-2xl font-bold"><a href="{{ route('home') }}">GitFormed</a></h1>
    </div>
    @auth
        <div>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <input type="submit" value="Logout"
                    class="w-full bg-green-500 text-white rounded-md cursor-pointer hover:bg-green-700 px-4 py-2 mb-4 mt-3">
            </form>
        </div>
    @endauth
</header>
