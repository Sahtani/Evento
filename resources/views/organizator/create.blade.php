@extends('layouts.form')

@section('form')
    <div class="mt-6 ">
        <div
            class="grid sm:grid-cols-1 items-center gap-16 p-8 mx-auto max-w-4xl bg-white shadow-[0_2px_10px_-3px_rgba(6,81,237,0.3)] rounded-md text-[#333] font-[sans-serif]">
            <form class="ml-auo space-y-4" method="POST" action="{{ route('organizator.storevent') }}">
                @csrf
                <label for="uploadFile1"
                    class="bg-white text-black text-base rounded w-80 h-52 flex flex-col items-center justify-center cursor-pointer border-2 border-gray-300 border-dashed mx-auto font-[sans-serif]">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-8 mb-2 fill-black" viewBox="0 0 32 32">
                        <path
                            d="M23.75 11.044a7.99 7.99 0 0 0-15.5-.009A8 8 0 0 0 9 27h3a1 1 0 0 0 0-2H9a6 6 0 0 1-.035-12 1.038 1.038 0 0 0 1.1-.854 5.991 5.991 0 0 1 11.862 0A1.08 1.08 0 0 0 23 13a6 6 0 0 1 0 12h-3a1 1 0 0 0 0 2h3a8 8 0 0 0 .75-15.956z"
                            data-original="#000000" />
                        <path
                            d="M20.293 19.707a1 1 0 0 0 1.414-1.414l-5-5a1 1 0 0 0-1.414 0l-5 5a1 1 0 0 0 1.414 1.414L15 16.414V29a1 1 0 0 0 2 0V16.414z"
                            data-original="#000000" />
                    </svg>
                    Upload file
                    <input type="file" id='uploadFile1' class="hidden" name='image' />
                    <p class="text-xs text-gray-400 mt-2">PNG, JPG SVG, WEBP, and GIF are Allowed.</p>
                </label>
                <div  class="grid sm:grid-cols-2 gap-6 items-center">

                <x-text-input id="title" class="block  w-full" type="text" name="title" :value="old('title')"
                    required autofocus autocomplete="name" placeholder='Title' />
                <x-input-error :messages="$errors->get('title')" class="mt-2" />

                <x-text-input id="date" class="block w-full" type="date" name="date" :value="old('date')"
                    required autofocus autocomplete="name" placeholder='Date' />
                <x-input-error :messages="$errors->get('date')" class="mt-2" />

                <x-text-input id="title" class="block  w-full" type="text" name="location" :value="old('location')"
                    required placeholder='Location' />
                <x-input-error :messages="$errors->get('location')" class="mt-2" />

                <x-text-input id="nbr" class="block w-full" type="text" name="nombre_place" :value="old('nombre_place')"
                    required placeholder='Location' />
                <x-input-error :messages="$errors->get('nombre_place')" class="mt-2" />

                <x-text-input id="title" class="block  w-full" type="text" name="price" :value="old('price')"
                    required placeholder='Price' />
                <x-input-error :messages="$errors->get('price')" class="mt-2" />

                
               
                    
                </div>
                <textarea placeholder='Description' rows="6" name="description" class="w-full rounded-md px-4  text-sm pt-2.5">{{ old('description') }}</textarea>
                <x-input-error :messages="$errors->get('description')" class="mt-2" />
                <x-primary-button class=" w-full text-center py-1">
                    {{ __('Create') }}
                </x-primary-button>
            </form>
        </div>
    </div>
@endsection
