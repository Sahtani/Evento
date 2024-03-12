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
    <div class=" mx-20 px-4 py-8 sm:px-8">

        <div class="overflow-y-hidden rounded-lg border">
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr
                            class="bg-slate-200  border text-left text-xs font-semibold uppercase tracking-widest text-gray-700">
                            <th class="px-5 py-3 ">Title</th>
                            <th class="px-5 py-3">Location</th>
                            <th class="px-5 py-3">Category</th>
                            <th class="px-5 py-3">Created at</th>
                            <th class="px-5 py-3">Status</th>
                            <th class="px-5 py-3">Action</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-500">
                        <tr>
                            @foreach ($events as $event)
                                <td class="border-b border-gray-200 bg-white px-5 py-5 text-sm">
                                    <div class="flex items-center">
                                        <div class="h-10 w-10 flex-shrink-0">
                                            <img class="h-10 w-10 rounded-full"
                                                src="{{ asset('storage/uploads/' . $event->image) }}" alt="" />
                                        </div>
                                        <div class="ml-3">
                                            <p class="whitespace-no-wrap">{{ $event->title }}</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="border-b border-gray-200 bg-white px-5 py-5 text-sm">
                                    <p class="whitespace-no-wrap">{{ $event->location }}</p>
                                </td>
                                <td class="border-b border-gray-200 bg-white px-5 py-5 text-sm">
                                    <p class="whitespace-no-wrap"> {{ $event->category ? $event->category->name : 'original' }}</p>

                                </td>
                                <td class="border-b border-gray-200 bg-white px-5 py-5 text-sm">
                                    <p class="whitespace-no-wrap">{{ $event->created_at->format('M d, Y') }}</p>

                                </td>
                                <td class="border-b border-gray-200 bg-white px-5 py-5 text-sm text-gray-500">
                                    @if ($event->status === 'accepted')
                                        <div
                                            class="inline-flex items-center rounded-full font-semibold bg-slate-300 py-2 px-3 text-xs text-gray-800">
                                            Accepted
                                        </div>
                                    @elseif ($event->status === 'rejected')
                                        <div
                                            class="inline-flex items-center rounded-full font-semibold bg-red-300 py-2 px-3 text-xs text-gray-800">
                                            Rejected
                                        </div>
                                    @elseif ($event->status === 'pending')
                                        <div
                                            class="inline-flex items-center rounded-full font-semibold bg-blue-200 py-2 px-3 text-xs text-gray-800">
                                            Pending
                                        </div>
                                    @endif
                                </td>

                                <td class="border-b border-gray-200 bg-white px-5 py-5 text-sm">
                                    <form method="POST" action="{{ route('admin.validateEvent', $event->id) }}">
                                        @method('PATCH')
                                        @csrf
                                        @if ($event->status == 'accepted')
                                            <button type="submit" class="rounded-full bg-red-200 px-3 py-1 text-xs font-semibold text-red-900">Refuse</button>
                                        @elseif ($event->status == 'pending' || $event->status == 'rejected')
                                            <button type="submit" class="rounded-full bg-green-200 px-3 py-1 text-xs font-semibold text-green-900">Accept</button>
                                        @endif
                                    </form>
                                </td>
                                
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
