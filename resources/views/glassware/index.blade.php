@extends('layouts.master')

@section('content')
<div class="mb-6">
  @if(Auth::user()->isAdmin())
      <form class="mb-6 text-center" action="/reset" method="POST">
        {{ csrf_field() }}
        <button type="submit" class="text-red-lightest bg-red px-2 py-1 rounded text-xs" onclick="return confirm('Are you really sure? This will reset the entire application!')">Reset EVERYTHING</button>
      </form>
  @endif

  <p class="text-lg text-purple text-center font-semibold">
    Hi there, {{ Auth::user()->name }}! 
    <a href="/logout" class="ml-1 hover:bg-purple-light cursor-pointer text-xs text-purple-lightest bg-purple-dark no-underline px-2 py-1 rounded ">change user</a>
  </p>
  
  <p class="text-center text-grey-darkest mt-1 italic">Please select an item from the list below.</p>

</div>

@foreach ($labs as $lab)
    <h2 class="pin-t sticky py-4 text-center block text-purple-lightest bg-purple-dark text-3xl my-8">&mdash; {{ $lab }} &mdash;</h2>

<div class="flex flex-wrap justify-center w-screen">
  
    @foreach ($categories[$lab] as $category => $items)
    <div class="max-w-sm w-screen sm:w-1/4 rounded overflow-hidden shadow-lg mb-8 mr-4 ml-4 md:mr-6">
      <div class="px-4 py-4">
        <div class="font-bold text-xl mb-2 text-center text-purple-darker"><a class="anchor" name="{{ $lab }}-{{ $items->pluck('type')[0] }}"></a>{{ $category }}</div>
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
                  {{ $item->user->name }} <span class="text-base">&rarr;</span>
                  <span class="text-base font-bold bg-purple-lightest text-purple-darker px-1 py-1 rounded-full">{{ $item->amount }}x</span> {{ $item->name }} 
                </li>
              </a>
              @else 
              <span class="text-lg no-underline text-purple-lightest" href="/glassware/{{ $item->id }}">
                <li class="bg-white shadow-lg px-4 py-2 rounded border bg-purple-dark mb-2">
                  <!-- {{ $item->name }} ({{ $item->user->name }}) -->
                  {{ $item->user->name }} <span class="text-base">&rarr;</span>
                  <span class="text-base font-bold bg-purple-lightest text-purple-darker px-1 py-1 rounded-full">{{ $item->amount }}x</span> {{ $item->name }} 
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
@endforeach 



@endsection
