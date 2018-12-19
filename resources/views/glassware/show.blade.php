@extends('layouts.master')

@section('content')
<div class="mt-2 mb-6">
    <p class="text-center">
       <a class="bg-purple-dark no-underline text-md text-purple-lightest hover:bg-purple hover:text-white px-4 py-2 rounded-lg shadow-lg" href="/start">Back to the list</a>
    </p>
  </div>

<div class="mb-8">
  <p class="text-lg text-purple text-center font-semibold">
    Thanks for helping, {{ Auth::user()->name }}! 
  </p>
</div>

<div class="mb-12">
  <h2 class="mb-2 text-center">{{ $lab->name }} &mdash; {{ $type }}</h2>

  <glassware-multi-counter :glasswares="{{ $glasswares }}" :user="{{ auth()->user() }}"></glassware-multi-counter>
  
</div>
@endsection
