@extends('layouts.master')

@section('content')
<div class="mb-6">
  <p class="text-lg text-purple text-center font-semibold">
    Hi there, {{ Auth::user()->name }}! 
  </p>
  <p class="text-center text-grey-darkest mt-1 italic">Please select an item from the list below.</p>

</div>

<div class="flex flex-wrap justify-center w-screen">
  
  @foreach ($categories as $category => $items)
  <div class="max-w-sm w-screen sm:w-1/5 rounded overflow-hidden shadow-lg mb-8 mr-4 ml-4 md:mr-6">
    <div class="px-4 py-4">
      <div class="font-bold text-xl mb-2 text-center text-purple-darker">{{ $category }}</div>
      <ul class="list-reset text-grey-darker text-base text-right mt-4">
        @foreach ($items as $item)
          @if ($item->isUnassigned())
          <a class="text-lg no-underline text-purple-dark hover:text-white" href="/glassware/{{ $item->id }}">
            <li class="bg-white shadow-lg px-4 py-2 rounded border hover:border-purple hover:bg-purple mb-2">
              {{ $item->name }}
            </li>
          </a>
          @else
            @if ($item->user == auth()->user())
            <a class="text-lg no-underline text-purple-lightest" href="/glassware/{{ $item->id }}">
              <li class="bg-white shadow-lg px-4 py-2 rounded hover:bg-purple border bg-purple-dark mb-2">
                {{ $item->name }} ({{ $item->user->name }})
              </li>
            </a>
            @else 
            <span class="text-lg no-underline text-purple-lightest" href="/glassware/{{ $item->id }}">
              <li class="bg-white shadow-lg px-4 py-2 rounded border bg-purple-dark mb-2">
                {{ $item->name }} ({{ $item->user->name }})
              </li>
            </span>
            @endif
          @endif
        
        @endforeach
      </ul>
    </div>
  </div>
  @endforeach


</div>
@endsection
