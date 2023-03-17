@section('title', 'People')

<div class="flex flex-col justify-center min-h-screen py-12 bg-gray-50 sm:px-6 lg:px-8">
    <div class="absolute top-0 right-0 mt-4 mr-4">
        @if (Route::has('login'))

            <div class="space-x-4">
                @auth
                    <a
                            href="{{ route('home') }}"
                            class="font-medium text-indigo-600 hover:text-indigo-500 focus:outline-none focus:underline transition ease-in-out duration-150"
                    >
                        Home
                    </a>

                    <a
                            href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                            class="font-medium text-indigo-600 hover:text-indigo-500 focus:outline-none focus:underline transition ease-in-out duration-150"
                    >
                        Log out
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                @endauth
            </div>
        @endif
    </div>

    <div class="sm:mx-auto sm:w-full sm:max-w-md">
        <h2 class="mt-6 text-3xl font-extrabold text-center text-gray-900 leading-9">
            {{$title}}
        </h2>
    </div>

    <div class="mt-8 lg:mx-auto lg:w-full">
        <div class="px-4 py-8 bg-white shadow lg:rounded-lg lg:px-10">
            <table class="table-auto m-auto">
                <thead>
                <tr x-data="{ headers: {{json_encode($headers)}} }">
                    <template x-for="header in headers" :key="header.name">
                        <th x-text="header.name"
                            class="font-bold w-[300px] p-4 border-b border-l text-left border-indigo-700 bg-indigo-700 text-white">
                            Artist
                        </th>
                    </template>
                </tr>
                </thead>
                <tbody x-data="{ rows: {{json_encode($rows)}} }">
                <template x-for="row in rows" :key="row.id">
                    <tr>
                        <td x-text="row.id" class="text-left p-4"></td>
                        <td x-text="row.fname" class="text-left p-4"></td>
                        <td x-text="row.lname" class="text-left p-4"></td>
                        <td x-text="row.email" class="text-left p-4"></td>
                        <td x-text="new Date(row.date).toDateString()" class="text-left p-4"></td>
                    </tr>
                </template>
                </tbody>
            </table>
        </div>
    </div>
    <div class="sm:mx-auto sm:w-full sm:mid-w-md">
        <h2 class="mt-6 text-2xl text-right text-gray-500 leading-9">
            <button wire:click="$refresh">Refresh</button>
        </h2>
    </div>
</div>