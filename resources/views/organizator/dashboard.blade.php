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
    <div class="m-14 grid md:grid-cols-2 grid-cols-1">
        @forelse  ($events as $event)
            <div class="max-w-sm w-full lg:max-w-full lg:flex">
                <div class="h-48 lg:h-auto lg:w-48 flex-none bg-cover rounded-t lg:rounded-t-none lg:rounded-l text-center overflow-hidden"
                    style="background-image: url('{{ asset('storage/uploads/' . $event->image) }}')" title="Event Image">
                </div>
                <div
                    class="border-r border-b border-l border-gray-400 lg:border-l-0 lg:border-t lg:border-gray-400 bg-white rounded-b lg:rounded-b-none lg:rounded-r p-4 flex flex-col justify-between leading-normal">
                    <div class="mb-8">


                        <div class="text-gray-900 font-bold text-xl mb-2">{{ $event->title }}</div>
                        <div class="flex gap-2 text-gray-500 font-semibold">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                style="fill: rgba(107, 114, 128, 1)
                                ;transform: ;msFilter:;">
                                <path
                                    d="M21 20V6c0-1.103-.897-2-2-2h-2V2h-2v2H9V2H7v2H5c-1.103 0-2 .897-2 2v14c0 1.103.897 2 2 2h14c1.103 0 2-.897 2-2zM9 18H7v-2h2v2zm0-4H7v-2h2v2zm4 4h-2v-2h2v2zm0-4h-2v-2h2v2zm4 4h-2v-2h2v2zm0-4h-2v-2h2v2zm2-5H5V7h14v2z">
                                </path>
                            </svg>
                            <span class="pb-1">{{ \Carbon\Carbon::parse($event->date)->format('m/d/Y') }}</span>

                        </div>
                        <div>
                            <span class="text-red-600 font-bold">Tickets from $<span>{{ $event->price }}</span></span>
                        </div>
                        <p class="text-gray-700 text-base">{{ $event->description }}</p>
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
