@extends('layouts.nav')

@section('content')
    <div class=" mx-20 px-4 py-8 sm:px-8">

        <div class="overflow-y-hidden rounded-lg border">
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr
                            class="bg-slate-200  border text-left text-xs font-semibold uppercase tracking-widest text-gray-700">

                            <th class="px-5 py-3">Event Name</th>
                            <th class="px-5 py-3 ">Full Name</th>
                            <th class="px-5 py-3">Email user</th>

                            <th class="px-5 py-3">Status</th>
                            <th class="px-5 py-3">Action</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-500">
                        <tr>
                            @foreach ($reservations as $reservation)
                                <td class="border-b border-gray-200 bg-white px-5 py-5 text-sm">
                                    <div class="flex items-center">
                                        <div class="h-10 w-10 flex-shrink-0">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="50"
                                                viewBox="0 0 24 24"
                                                style="fill: rgba(173, 171, 171, 1);transform: ;msFilter:;">
                                                <path
                                                    d="M12 2C6.579 2 2 6.579 2 12s4.579 10 10 10 10-4.579 10-10S17.421 2 12 2zm0 5c1.727 0 3 1.272 3 3s-1.273 3-3 3c-1.726 0-3-1.272-3-3s1.274-3 3-3zm-5.106 9.772c.897-1.32 2.393-2.2 4.106-2.2h2c1.714 0 3.209.88 4.106 2.2C15.828 18.14 14.015 19 12 19s-3.828-.86-5.106-2.228z">
                                                </path>
                                            </svg>
                                        </div>
                                        <div class="ml-3">
                                            <p class="whitespace-no-wrap">{{ $reservation->event->title }}</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="border-b border-gray-200 bg-white px-5 py-5 text-sm">
                                    <p class="whitespace-no-wrap">{{ $reservation->user->name }}</p>
                                </td>
                                <td class="border-b border-gray-200 bg-white px-5 py-5 text-sm">
                                    <p class="whitespace-no-wrap">{{ $reservation->user->email }}</p>

                                </td>
                                <td class="border-b border-gray-200 bg-white px- py-5 text-sm">
                                    @if ($reservation->status == 'confirmed')
                                        <span
                                            class="rounded-full bg-green-200 px-3 py-1 text-xs font-semibold text-green-900">confirmed</span>
                                    @elseif ($reservation->status == 'pending')
                                    <div class="flex mt-1 w-fit items-center rounded-full bg-blue-600 py-2 px-3 text-left text-xs font-medium text-white">
                                        Pending
                                    </div>
                                    @else
                                        <span
                                            class="rounded-full bg-red-200 px-3 py-1 text-xs font-semibold text-red-900">cancelled</span>
                                    @endif

                                </td>
                                <td class="border-b border-gray-200 bg-white px-5 py-5 text-sm">
                                    <form method="POST"
                                        action="{{ route('organizator.confirmReservation', $reservation->id) }}">
                                        @method('PATCH')
                                        @csrf
                                        @if ($reservation->status == 'confirmed')
                                            <button type="submit"
                                                class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                                cancelled</button>
                                        @elseif($reservation->status == 'pending')
                                            <button type="submit"
                                                class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">confirme</button>
                                        
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
