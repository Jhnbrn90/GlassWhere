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
    <a href="/glassware/{{ $lab }}/{{ $items->pluck('type')[0] }}" class="hover:bg-purple-dark hover:shadow-lg hover:text-purple-lightest text-purple-darker no-underline max-w-sm w-screen bg-white sm:w-1/4 rounded overflow-hidden shadow mb-8 mr-4 ml-4 md:mr-6">
      <div class="px-4 py-4">
        <div class="font-bold text-xl mb-2 text-center">
          {{ $category }}
        </div>
      </div>
    </a>
  @endforeach

</div>  
@endforeach 



@endsection
