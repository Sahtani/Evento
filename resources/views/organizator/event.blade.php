@extends('layouts.nav')

@section('content')
    <div class="bg-gray-100  font-[sans-serif]   flex items-center justify-center mt-20">
        <div class="container w-1/2 mb-2  p-8 bg-white rounded-lg shadow-md  ">
            <a href="{{ route('organizator.organdashboard') }}" title="Back to home your offers" class="pb-4">
                <svg xmlns="http://www.w3.org/2000/svg" height="30" width="30" viewBox="0 0 448 512">
                    <path fill="#2d2522"
                        d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l160 160c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.2 288 416 288c17.7 0 32-14.3 32-32s-14.3-32-32-32l-306.7 0L214.6 118.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-160 160z" />
                </svg>
            </a>
            <div class="mx-auto">
                <div class="">
                    <h2 class="text-3xl font-extrabold text-mr mb-4">{{ $event->title }}</h2>
                    <p class="text-gray-700 text-sm   ">
                        {{ $event->description }}
                    </p>


                    <div class="mt-6 ">
                        <div class="text-grun text-sm  underline">Category:</div>
                        <p class="ml-2 w-1/2">{{ $event->category->name }}</p>
                    </div>

                    <div class="mt-2  ">
                        <div class="text-grun text-sm  underline">Location:</div>
                        <p class="my-2  font-semibold text-gray-600  px-3  ">
                            {{ $event->location }}</p>
                    </div>

                    <div class="mt-4">{{ $event->created_at->format('M d, Y') }}</div>

                        
                    </div>
                    <div class="mt-2">
                        <span class="text-gray-600 font-bold">Tickets from $<span>{{ $event->price }}</span></span>
                      </div>


                </div>
            </div>
        </div>
    </div>
@endsection