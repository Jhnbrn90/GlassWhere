@extends('layouts.master')

@section('content')
<div class="ml-4 mr-4 mb-6">
    <img src="{{ asset('svg/logo.svg') }}" class="max-w-xs">
</div>

<div class="flex justify-center ml-4 mr-4">
    <a href="/start" role="button" class="bg-purple-dark no-underline text-2xl text-purple-lightest hover:bg-purple hover:text-white px-4 py-2 rounded-lg shadow-lg">Get started</a>
</div>
@endsection
