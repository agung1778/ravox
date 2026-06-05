@extends('layouts.app')

@section('content')

<div class="min-h-screen bg-black">
    <iframe
        src="{{ $game->webgl_url }}"
        class="w-full h-screen border-0">
    </iframe>
</div>

@endsection