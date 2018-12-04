@extends('layouts.master')

@section('content')
<div class="mb-8">
  <p class="text-lg text-purple text-center font-semibold">
    Thanks for helping, {{ Auth::user()->name }}! 
  </p>
</div>

<div class="mx-4">
  <h2 class="mb-2">{{ $glassware->name }} {{ $glassware->type }}</h2>

  <glassware-counter id="{{ $glassware->id }}"></glassware-counter>

  <div class="mt-12">
    <p class="text-center">
       <a class="bg-purple-dark no-underline text-lg text-purple-lightest hover:bg-purple hover:text-white px-4 py-2 rounded-lg shadow-lg" href="/start">Back to the list</a>
    </p>
  </div>
  
</div>
@endsection
