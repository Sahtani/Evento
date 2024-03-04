@extends('layouts.nav')

@section('content')
  
<div class="grid grid-cols-1 md:grid-cols-2 mt-10">
    <div class=" px-6 sm:py-20 py-10 font-[sans-serif]">
        <div class="max-w-screen-xl mx-auto text-center text-bleuc">
          <h1 class="px-6 text-4xl max-sm:text-3xl font-extrabold leading-tight mb-4">Welcome to Our Premium Service</h1>
          <p class="text-lg mb-8">Experience excellence like never before with our exclusive products and services.Experience excellence like never before with our exclusive products and services.</p>
          <button type="button" class="bg-bleu hover:bg-blue-700 text-bleuc text-lg font-semibold px-8 py-2 rounded-full transition duration-300 ease-in-out shadow-lg hover:shadow-xl">Get Started</button>
        </div>
      </div>
    <img src="{{ asset("image/undraw_personal_information_re_vw8a (1).svg") }}" class="w-full mx-16 px-16 hidden lg:block" alt="">
</div>

@endsection