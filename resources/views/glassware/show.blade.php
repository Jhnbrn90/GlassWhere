@extends('layouts.master')

@section('content')
<div class="mx-4">
  <h2 class="mb-2">{{ $glassware->name }} {{ $glassware->type }}</h2>

  <glassware-counter id="{{ $glassware->id }}"></glassware-counter>
  
</div>
@endsection
