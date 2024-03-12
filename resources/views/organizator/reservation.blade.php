@extends('layouts.nav')

@section('content')
{{-- stats  --}}
<div class="flex flex-wrap gap-x-14 gap-y-16 bg-gray-100 px-4 py-20 lg:px-20 mx-24">
    <div class="flex w-72">
      <div class="flex w-full max-w-full flex-col break-words rounded-lg border border-gray-100 bg-white text-gray-600 shadow-lg">
        <div class="p-3">
          <div class="absolute hidden -mt-10 h-16 w-16 rounded-xl bg-gradient-to-tr from-gray-700 to-gray-400 text-center text-white shadow-lg">
            <svg xmlns="http://www.w3.org/2000/svg" class="mt-4 h-7 w-16" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
              <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
              <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
            </svg>
          </div>
          <div class="pt-1 text-right">
            <p class="text-sm font-light capitalize">Total Reservations</p>
            <h4 class="text-2xl font-semibold tracking-tighter xl:text-2xl">{{ $totalReservations }}</h4>
          </div>
        </div>
       
      </div>
    </div>
    <div class="flex w-72">
      <div class="flex w-full max-w-full flex-col break-words rounded-lg border border-gray-100 bg-white text-gray-600 shadow-lg">
        <div class="p-3">
          <div class="absolute hidden -mt-10 h-16 w-16 rounded-xl bg-gradient-to-tr from-blue-700 to-blue-500 text-center text-white shadow-lg">
            <svg xmlns="http://www.w3.org/2000/svg" class="mt-4 h-7 w-16" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
              <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
            </svg>
          </div>
          <div class="pt-1 text-right">
            <p class="text-sm font-light capitalize">Pending Reservations</p>
            <h4 class="text-2xl font-semibold tracking-tighter xl:text-2xl">{{ $pendingReservations }}</h4>
          </div>
        </div>
      </div>
    </div>
    <div class="flex w-72">
      <div class="flex w-full max-w-full flex-col break-words rounded-lg border border-gray-100 bg-white text-gray-600 shadow-lg">
        <div class="p-3">
          <div class="absolute hidden -mt-10 h-16 w-16 rounded-xl bg-gradient-to-tr from-emerald-700 to-emerald-500 text-center text-white shadow-lg">
            <svg xmlns="http://www.w3.org/2000/svg" class="mt-4 h-7 w-16" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
              <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m-3-2.818l.879.659c1.171.879 3.07.879 4.242 0 1.172-.879 1.172-2.303 0-3.182C13.536 12.219 12.768 12 12 12c-.725 0-1.45-.22-2.003-.659-1.106-.879-1.106-2.303 0-3.182s2.9-.879 4.006 0l.415.33M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
          </div>
          <div class="pt-1 text-right">
            <p class="text-sm font-light capitalize">confirmed Reservations</p>
            <h4 class="text-2xl font-semibold tracking-tighter xl:text-2xl">{{ $confirmedReservations }}</h4>
          </div>
        </div>
      </div>
    </div>
  </div>

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
                        @forelse($reservations as $reservation)
                            <tr>
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
                                                class="px-2 inline-flex text-xs leading-5 py-2 font-semibold rounded-full bg-red-100 text-red-800">
                                                confirmed</button>
                                        @elseif($reservation->status == 'pending')
                                            <button type="submit"
                                                class="px-2 inline-flex text-xs leading-5 py-2 font-semibold rounded-full bg-green-100 text-green-800">confirme</button>
                                        
                                                @endif
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center py-4">No reservations available.</td>
                            </tr>
                        @endforelse 
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
