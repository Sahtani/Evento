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

    <div>
        <div class="flex flex-col mt-8 mx-10">
            <div class="-my-2 py-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
                <div
                    class="align-middle inline-block min-w-full shadow overflow-hidden sm:rounded-lg border-b border-gray-200">
                    <table class="min-w-full">
                        <thead>
                            <tr>
                                <th
                                    class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                    Image</th>
                                <th
                                    class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                    Title</th>
                                <th
                                    class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                    Location</th>
                                <th
                                    class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                    Action</th>
                            </tr>
                        </thead>

                        <tbody class="bg-white">
                            @foreach ($reservations as $reservation)
                                <tr>
                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                        <div class="flex items-center">
                                            <div class="ml-4">
                                                <div class="text-sm leading-5 font-medium text-gray-900">{{ $reservation->event->title }}
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                        <div class="flex items-center">
                                            <div class="ml-4">
                                                <div class="text-sm leading-5 text-gray-500">{{ $reservation->user->name }}</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                        <div class="flex items-center">
                                            <div class="ml-4">
                                                <div class="text-sm leading-5 text-gray-500">{{ $reservation->user->email }}
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <form method="POST" action="{{ route('organizator.confirmReservation',$reservation->id  ) }}">
                                            @method('PATCH')
                                            @csrf
                                            @if ($reservation->status == 'confirmed')
                                            <p type="submit"
                                            class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">confirmed</p>
                                    
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
    </div>
@endsection
<link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:ital,wght@0,300;0,400;1,600&display=swap" rel="stylesheet" />
<style>
  * {
  font-family: 'Source Sans Pro';
  }
</style>
<div class="w-screen">
  
<div class="mx-auto mt-8 max-w-screen-lg px-2">
  <div class="sm:flex sm:items-center sm:justify-between flex-col sm:flex-row">
    <p class="flex-1 text-base font-bold text-gray-900">Latest Payments</p>

    <div class="mt-4 sm:mt-0">
      <div class="flex items-center justify-start sm:justify-end">
        <div class="flex items-center">
          <label for="" class="mr-2 flex-shrink-0 text-sm font-medium text-gray-900"> Sort by: </label>
          <select name="" class="sm: mr-4 block w-full whitespace-pre rounded-lg border p-1 pr-10 text-base outline-none focus:shadow sm:text-sm">
            <option class="whitespace-no-wrap text-sm">Recent</option>
          </select>
        </div>

        <button type="button" class="inline-flex cursor-pointer items-center rounded-lg border border-gray-400 bg-white py-2 px-3 text-center text-sm font-medium text-gray-800 shadow hover:bg-gray-100 focus:shadow">
          <svg class="mr-1 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" class=""></path>
          </svg>
          Export to CSV
        </button>
      </div>
    </div>
  </div>

  <div class="mt-6 overflow-hidden rounded-xl border shadow">
    <table class="min-w-full border-separate border-spacing-y-2 border-spacing-x-2">
      <thead class="hidden border-b lg:table-header-group">
        <tr class="">
          <td width="50%" class="whitespace-normal py-4 text-sm font-medium text-gray-500 sm:px-6">Invoice</td>

          <td class="whitespace-normal py-4 text-sm font-medium text-gray-500 sm:px-6">Date</td>

          <td class="whitespace-normal py-4 text-sm font-medium text-gray-500 sm:px-6">Amount</td>

          <td class="whitespace-normal py-4 text-sm font-medium text-gray-500 sm:px-6">Status</td>
        </tr>
      </thead>

      <tbody class="lg:border-gray-300">
        <tr class="">
          <td width="50%" class="whitespace-no-wrap py-4 text-sm font-bold text-gray-900 sm:px-6">
            Standard Plan - Feb 2022
            <div class="mt-1 lg:hidden">
              <p class="font-normal text-gray-500">07 February, 2022</p>
            </div>
          </td>

          <td class="whitespace-no-wrap hidden py-4 text-sm font-normal text-gray-500 sm:px-6 lg:table-cell">07 February, 2022</td>

          <td class="whitespace-no-wrap py-4 px-6 text-right text-sm text-gray-600 lg:text-left">
            $59.00
            <div class="flex mt-1 ml-auto w-fit items-center rounded-full bg-blue-600 py-2 px-3 text-left text-xs font-medium text-white lg:hidden">Complete</div>
          </td>

          <td class="whitespace-no-wrap hidden py-4 text-sm font-normal text-gray-500 sm:px-6 lg:table-cell">
            <div class="inline-flex items-center rounded-full bg-blue-600 py-2 px-3 text-xs text-white">Complete</div>
          </td>
        </tr>

        <tr class="">
          <td width="50%" class="whitespace-no-wrap py-4 text-sm font-bold text-gray-900 sm:px-6">
            Standard Plan - Jan 2022
            <div class="mt-1 lg:hidden">
              <p class="font-normal text-gray-500">09 January, 2022</p>
            </div>
          </td>

          <td class="whitespace-no-wrap hidden py-4 text-sm font-normal text-gray-500 sm:px-6 lg:table-cell">09 January, 2022</td>

          <td class="whitespace-no-wrap py-4 px-6 text-right text-sm text-gray-600 lg:text-left">
            $59.00
            <div class="flex mt-1 ml-auto w-fit items-center rounded-full bg-red-200 py-1 px-2 text-left font-medium text-red-500 lg:hidden">Canceled</div>
          </td>

          <td class="whitespace-no-wrap hidden py-4 text-sm font-normal text-gray-500 sm:px-6 lg:table-cell">
            <div class="inline-flex items-center rounded-full bg-red-200 py-1 px-2 text-red-500">Canceled</div>
          </td>
        </tr>

        <tr class="">
          <td width="50%" class="whitespace-no-wrap py-4 text-sm font-bold text-gray-900 sm:px-6">
            Basic Plan - Dec 2021
            <div class="mt-1 lg:hidden">
              <p class="font-normal text-gray-500">15 December, 2021</p>
            </div>
          </td>

          <td class="whitespace-no-wrap hidden py-4 text-sm font-normal text-gray-500 sm:px-6 lg:table-cell">15 December, 2021</td>

          <td class="whitespace-no-wrap py-4 px-6 text-right text-sm text-gray-600 lg:text-left">
            $29.00
            <div class="flex mt-1 ml-auto w-fit items-center rounded-full bg-blue-600 py-2 px-3 text-left text-xs font-medium text-white lg:hidden">Complete</div>
          </td>

          <td class="whitespace-no-wrap hidden py-4 text-sm font-normal text-gray-500 sm:px-6 lg:table-cell">
            <div class="inline-flex items-center rounded-full bg-blue-600 py-2 px-3 text-xs text-white">Complete</div>
          </td>
        </tr>

        <tr class="">
          <td width="50%" class="whitespace-no-wrap py-4 text-sm font-bold text-gray-900 sm:px-6">
            Basic Plan - Nov 2021
            <div class="mt-1 lg:hidden">
              <p class="font-normal text-gray-500">14 November, 2021</p>
            </div>
          </td>

          <td class="whitespace-no-wrap hidden py-4 text-sm font-normal text-gray-500 sm:px-6 lg:table-cell">14 November, 2021</td>

          <td class="whitespace-no-wrap py-4 px-6 text-right text-sm text-gray-600 lg:text-left">
            $29.00
            <div class="flex mt-1 ml-auto w-fit items-center rounded-full bg-blue-200 py-1 px-2 text-left font-medium text-blue-500 lg:hidden">Pending</div>
          </td>

          <td class="whitespace-no-wrap hidden py-4 text-sm font-normal text-gray-500 sm:px-6 lg:table-cell">
            <div class="inline-flex items-center rounded-full bg-blue-200 py-1 px-2 text-blue-500">Pending</div>
          </td>
        </tr>

        <tr class="">
          <td width="50%" class="whitespace-no-wrap py-4 text-sm font-bold text-gray-900 sm:px-6">
            Basic Plan - Oct 2021
            <div class="mt-1 lg:hidden">
              <p class="font-normal text-gray-500">15 October, 2021</p>
            </div>
          </td>

          <td class="whitespace-no-wrap hidden py-4 text-sm font-normal text-gray-500 sm:px-6 lg:table-cell">15 October, 2021</td>

          <td class="whitespace-no-wrap py-4 px-6 text-right text-sm text-gray-600 lg:text-left">
            $29.00
            <div class="flex mt-1 ml-auto w-fit items-center rounded-full bg-blue-600 py-2 px-3 text-left text-xs font-medium text-white lg:hidden">Complete</div>
          </td>

          <td class="whitespace-no-wrap hidden py-4 text-sm font-normal text-gray-500 sm:px-6 lg:table-cell">
            <div class="inline-flex items-center rounded-full bg-blue-600 py-2 px-3 text-xs text-white">Complete</div>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</div>

</div>