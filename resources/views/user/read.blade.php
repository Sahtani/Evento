
@extends('layouts.nav')

@section('content')

<div class="bg-gray-100 px-10 py-12 font-[sans-serif] overflow-hidden">
    <div class="container mx-auto p-6 bg-white rounded-lg shadow-md">
        <a href="{{ route('user.userdash') }}" title="Back to home page">
            <svg xmlns="http://www.w3.org/2000/svg" height="30" width="30" viewBox="0 0 448 512">
                <path fill="#2d2522" d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l160 160c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.2 288 416 288c17.7 0 32-14.3 32-32s-14.3-32-32-32l-306.7 0L214.6 118.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-160 160z" />
            </svg>
        </a>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
            <div>
                <img src="{{ asset('storage/uploads/'.$event->image) }}" alt="Image" class="rounded-md object-cover w-full h-full" />
            </div>
            <div class="w-full">
                <h2 class="text-3xl font-extrabold text-mr mb-4">{{ $event->title }}</h2>
                <p class="text-gray-700 text-sm   ">
                 {{ $event->description}}
                </p>

                <div class="flex items-center justify-between">
                    <div class="mt-6 flex  items-end justify-end ">
                        <div class="text-moinmaron text-sm  underline">Categorie:</div>
                        <p class="ml-2">{{ $event->category->name }}</p>
                    </div>

                    <div class="mt-6 flex   items-end justify-end ">
                        <div class="text-moinmaron text-sm  underline">Created by:</div>
                        <p class="ml-2">{{ $event->user->name }}</p>
                    </div>
                </div>
                <div class="mt-4">
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
                </div>
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
                <div class="mt-2">
                    <p class="underline text-sm mb-2">The number of places available.</p>

                    <span class="bg-gray-200 px-4   py-1 rounded-full text-xs font-medium text-gray-800 ">
                        {{ $event->nbr }}</span>
                </div>
               
            </div>
        </div>
    </div>
</div>
@endsection