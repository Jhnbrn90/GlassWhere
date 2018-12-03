@extends('layouts.master')

@section('content')
@if ($errors->any())
<div class="ml-4 mr-4 mb-8">
  <div class="bg-red-lighter text-center text-red-darkest rounded px-4 py-4">
    <strong>Whoops!</strong> <br>
    <ul>
      @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>  
</div>
@endif

<div class="ml-4 mr-4">
  <h3 class="mb-3 text-center leading-tight">Please enter your name:</h3>
  <form action="/login" method="POST" class="text-center">
    {{ csrf_field() }}
    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker leading-tight focus:outline-none focus:shadow-outline block mb-4" id="name" name="name" type="text" placeholder="" autofocus required>
    <button class="px-4 py-2 text-xl bg-purple text-purple-lightest rounded shadow-lg hover:bg-purple-dark hover:text-white">Continue</button>
  </form>

</div>
@endsection
