@extends('v_layouts.app')


<body class="bg-gray-900">


    <div class="flex justify-center items-center py-40">
        <div class="block w-80 md:w-[40rem] border rounded-lg shadow bg-gray-800 border-gray-700">
            <form action="/login" method="post" class="max-w-full mx-7 my-7">
                @csrf

                <div class="mb-5">
                    <label for="username" class="block mb-2 text-sm font-medium text-white">Username</label>
                    <input type="username" id="username" name="username"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="name@gmail.com" required />
                </div>
                <div class="mb-5">
                    <label for="password" class="block mb-2 text-sm font-medium text-white">Password</label>
                    <input type="password" id="password" name="password"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        required />
                </div>
                <button type="submit"
                    class="text-white bg-indigo-600 hover:bg-indigo-700 focus:ring-4 focus:outline-none focus:ring-indigo-600 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Submit</button>
            </form>
        </div>
    </div>


</body>
