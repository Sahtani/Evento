@extends('layouts.nav')

@section('content')
    @if (session('success'))
        <div class="w-full">
            <div class="flex items-center p-4  w-1/2 p-4 ml-12 mt-4 text-xl text-blue-800 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400"
                role="alert">
                <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="currentColor" viewBox="0 0 20 20">
                    <path
                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                </svg>
                <div>
                    <span class="font-medium">{{ session('success') }}</span>
                </div>
            </div>
        </div>
    @endif
    @if (session('error'))
        <div>
            <div class="flex items-center p-4 w-full  p-4 ml-12 mt-4 text-xl text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-blue-400"
                role="alert">
                <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="currentColor" viewBox="0 0 20 20">
                    <path
                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                </svg>
                <div>
                    <span class="font-medium"> {{ session('error') }}</span>
                </div>
            </div>
        </div>
    @endif
    <div class=" m-14 grid md:grid-cols-2 grid-cols-1 gap-4">
        @foreach ($events as $event)
            <div
                class="relative flex flex-col md:flex-row md:space-x-5 space-y-3 md:space-y-0 rounded-xl shadow-lg p-3 max-w-xs md:max-w-2xl mx-auto border border-white bg-white">
                <div class="w-full md:h-full md:w-1/2 bg-white grid place-items-center">
                    <img src="{{ asset('storage/uploads/' . $event->image) }}" alt="tailwind logo"
                        class="rounded-xl md:h-full" />
                </div>
                <div class="w-full md:w-2/3 bg-white flex flex-col space-y-2 p-3">
                    <div class="flex justify-between item-center">
                        <div class="flex gap-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="20" viewBox="0 0 24 24"
                                style="fill: rgb(250, 28, 187);transform: ;msFilter:;">
                                <path
                                    d="M11.42 21.815a1.004 1.004 0 0 0 1.16 0C12.884 21.598 20.029 16.44 20 10c0-4.411-3.589-8-8-8S4 5.589 4 9.996c-.029 6.444 7.116 11.602 7.42 11.819zM12 4c3.309 0 6 2.691 6 6.004.021 4.438-4.388 8.423-6 9.731-1.611-1.308-6.021-5.293-6-9.735 0-3.309 2.691-6 6-6z">
                                </path>
                                <path d="M11 14h2v-3h3V9h-3V6h-2v3H8v2h3z"></path>
                            </svg>
                            <p class="text-gray-500 font-medium hidden md:block">{{ $event->location }}</p>
                        </div>
                        <div class="bg-gray-200 px-3 py-1 rounded-full text-xs font-medium text-gray-800 hidden md:block">
                            {{ $event->category->name }}</div>
                    </div>
                    <h3 class="font-black text-gray-800 md:text-3xl text-xl">{{ $event->title }}</h3>
                    <p class="md:text-lg text-gray-500 text-base">
                        {{ substr($event->description, 0, 100) }}{{ strlen($event->description) > 100 ? '...' : '' }}</p>

                    <p class="text-xl font-black text-red-700">
                        ${{ $event->price }}
                    </p>
                    <div class="flex gap-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            style="fill: rgba(75, 85, 99, 0.5);transform: ;msFilter:;">
                            <path
                                d="M21 20V6c0-1.103-.897-2-2-2h-2V2h-2v2H9V2H7v2H5c-1.103 0-2 .897-2 2v14c0 1.103.897 2 2 2h14c1.103 0 2-.897 2-2zM9 18H7v-2h2v2zm0-4H7v-2h2v2zm4 4h-2v-2h2v2zm0-4h-2v-2h2v2zm4 4h-2v-2h2v2zm0-4h-2v-2h2v2zm2-5H5V7h14v2z">
                            </path>
                        </svg>
                        <span
                            class="font-bold text-gray-400 text-base">{{ \Carbon\Carbon::parse($event->date)->format('m/d/Y') }}</span>
                        </p>
                    </div>
                    <div class="flex items-center justify-between ">
                        <a href="{{ route('user.readEventUser', $event->id) }}" class="text-blue-500 hover:underline">Read
                            more</a>
                        @if ($exist_Reservation)
                            <form action="" method="POST">
                                {{-- {{ route('user.ticket', $event->id) }} --}}
                                @csrf
                                <button type="submit" class="text-blue-600 text-sm hover:underline">Afficher le
                                    ticket</button>
                            </form>
                        @else
                            <form action="{{ route('user.reserve', $event->id) }}" method="POST"
                                class="mt-4 inline-block text-blue-600 text-sm hover:underline">
                                @csrf
                                <button type="submit"
                                    class="text-white bg-red-800 hover:bg-red-900 focus:ring-4  font-medium rounded-lg text-sm px-5 py-2   dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800 font-semibold">
                                    <div class="flex gap-3">
                                        <span>
                                            Reserver
                                        </span>

                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" style="fill: rgba(247, 241, 241, 1);transform: ;msFilter:;">
                                            <path
                                                d="M3 5v14c0 2.201 1.794 3 3 3h15v-2H6.012C5.55 19.988 5 19.806 5 19s.55-.988 1.012-1H21V4c0-1.103-.897-2-2-2H6c-1.206 0-3 .799-3 3z">
                                            </path>
                                        </svg>
                                    </div>
                                </button>
                            </form>
                        @endif
                    </div>

                </div>
            </div>
        @endforeach
    </div>
    {{ $events->links() }}
@endsection
