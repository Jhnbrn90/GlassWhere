@extends('layouts.master')

@section('content')
<div class="mx-4">
  <h2 class="mb-2">{{ $glassware->name }}</h2>
  <p class="mb-4">Current count: {{ $glassware->amount }}</p>

</div>
@endsection
