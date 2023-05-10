<!doctype html>
<html lang="en" class="h-full bg-gray-50">

@include('templates.global.head')

<body class="login h-full">
<div class="flex min-h-full flex-col justify-center py-12 sm:px-6 lg:px-8">
    <div class="sm:mx-auto sm:w-full sm:max-w-md">
        <img class="mx-auto h-12 w-auto" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=600" alt="Your Company">
        <h2 class="mt-6 text-center text-3xl font-bold tracking-tight text-gray-900">Login</h2>
        <p class="mt-2 text-center text-sm text-gray-600">
            Don't have an account? <a href="{{ route('register') }}" class="font-medium text-indigo-600 hover:text-indigo-500">Register</a>
        </p>
    </div>

    <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
        <div class="bg-white py-8 px-4 shadow sm:rounded-lg sm:px-10">
            <form class="space-y-6" action="{{ route('login') }}" method="POST">
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <div class="mt-1">
                        <input id="email" name="email" type="email" autocomplete="email" required class="block w-full appearance-none rounded-md border border-gray-300 px-3 py-2 placeholder-gray-400 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">
                    </div>
                </div>

                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <div class="mt-1">
                        <input id="password" name="password" type="password" autocomplete="current-password" required class="block w-full appearance-none rounded-md border border-gray-300 px-3 py-2 placeholder-gray-400 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">
                    </div>
                </div>

                <div class="flex items-center justify-between">
                    <div class="flex items-center group">
                        <input id="remember-me" name="remember-me" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-transparent group-hover:cursor-pointer">
                        <label for="remember-me" class="ml-2 block text-sm text-gray-900 group-hover:cursor-pointer">Remember me</label>
                    </div>

                    <div class="text-sm">
                        <a href="#" class="font-medium text-indigo-600 hover:text-indigo-500">Forgot your password?</a>
                    </div>
                </div>

                <div>
                    <button x-data x-ripple type="submit" class="relative w-full justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700">Login</button>
                </div>
            </form>
        </div>
    </div>
</div>
</body>

</html>
