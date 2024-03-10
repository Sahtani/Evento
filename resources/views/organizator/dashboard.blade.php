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
    <div class="flex items-center justify-center mt-6">
        <a href="{{ route('organizator.createvent') }}"
            class="text-xl font-semibold text-white hover:bg-red-600 hover:text-white inline-block border border-bleu bg-red-800 py-2 rounded   px-4">Create
            New
            Event</a>
    </div>
    <div class="m-14 grid md:grid-cols-2 grid-cols-1 gap-8">
        @forelse  ($events as $event)
            <div
                class=" bg-white group mx-2 mt-10 grid max-w-screen-lg grid-cols-2 space-x-8 overflow-hidden rounded-lg border text-gray-700 shadow transition hover:shadow-lg sm:mx-auto sm:grid-cols-5">
                <a href="#" class="col-span-2 text-left text-gray-600 hover:text-gray-700">
                    <div class="group relative h-full w-full overflow-hidden"><img
                            src="{{ asset('storage/uploads/' . $event->image) }}" alt=""
                            class="h-full w-full border-none object-cover text-gray-700 transition group-hover:scale-125" />

                        <span
                            class="absolute top-2 left-2 rounded-full bg-yellow-200 px-2 text-xs font-semibold text-yellow-600">{{ $event->category->name }}</span>
                        <img src="/images/AnbWyIjnwNbW9Wz6c_cja.svg"
                            class="absolute inset-1/2 w-10 max-w-full -translate-x-1/2 -translate-y-1/2 transition group-hover:scale-125"
                            alt="" />
                    </div>
                </a>
                <div class="col-span-3 flex flex-col space-y-3 pr-8 text-left">
                    <a href="#" class="mt-3 overflow-hidden text-2xl font-semibold"> {{ $event->title }} </a>
                    <p class="overflow-hidden text-sm">
                        {{ substr($event->description, 0, 100) }}{{ strlen($event->description) > 100 ? '...' : '' }}</p>
                    <a href="#"
                        class="text-sm font-semibold text-gray-500 hover:text-gray-700">{{ \Carbon\Carbon::parse($event->date)->format('m/d/Y') }}</a>

                    <div class="flex flex-col text-gray-700 sm:flex-row">
                        <div class="flex h-fit space-x-2 text-sm font-medium">
                            <div class="rounded-full bg-green-100 px-2 py-0.5 text-green-700">{{ $event->status }}</div>

                            <div class="rounded-full bg-red-100 px-2 py-0.5 text-red-700">Tickets from
                                $<span>{{ $event->price }}</div>

                        </div>
                    </div>
                    <div class="flex items-center justify-between ">
                        <a href="{{ route('organizator.readevent', $event->id) }}"
                            class="text-blue-500 hover:underline">Read
                            more</a>
                        <form action="{{ route('organizator.eventdestroy', $event->id) }}" method="POST"
                            class="mt-4 inline-block text-blue-600 text-sm hover:underline">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="focus:outline-none">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    style="fill: rgb(240, 13, 13);transform: ;msFilter:;">
                                    <path
                                        d="M8.586 18 12 21.414 15.414 18H19c1.103 0 2-.897 2-2V4c0-1.103-.897-2-2-2H5c-1.103 0-2 .897-2 2v12c0 1.103.897 2 2 2h3.586zM5 4h14v12h-4.414L12 18.586 9.414 16H5V4z">
                                    </path>
                                    <path
                                        d="M9.707 13.707 12 11.414l2.293 2.293 1.414-1.414L13.414 10l2.293-2.293-1.414-1.414L12 8.586 9.707 6.293 8.293 7.707 10.586 10l-2.293 2.293z">
                                    </path>
                                </svg>
                            </button>
                        </form>

                        <a href="{{ route('organizator.editevent', $event->id) }}"
                            class="mt-4 inline-block text-blue-600 text-sm hover:underline">

                            <button type="button" class="focus:outline-none">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    style="fill: rgba(36, 196, 36, 1);transform: ;msFilter:;">
                                    <path d="m18.988 2.012 3 3L19.701 7.3l-3-3zM8 16h3l7.287-7.287-3-3L8 13z">
                                    </path>
                                    <path
                                        d="M19 19H8.158c-.026 0-.053.01-.079.01-.033 0-.066-.009-.1-.01H5V5h6.847l2-2H5c-1.103 0-2 .896-2 2v14c0 1.104.897 2 2 2h14a2 2 0 0 0 2-2v-8.668l-2 2V19z">
                                    </path>
                                </svg>
                            </button>
                        </a>
                    </div>
                
            </div>
    </div>
@empty
    <div class="p-6">
        <p class="text-gray-600">No events available.</p>
    </div>
    @endforelse

    </div>
@endsection
