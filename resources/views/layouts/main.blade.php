@extends('layouts.app')

@section('title')
    {{ $title }}
@endsection

@section('content')
    @livewire('components.header', ['visibleOnScroll' => $headerVisibleOnScroll ?? false], 'header')

    <div class="min-h-screen">
        {{ $slot }}

    </div>

    @livewire('components.footer')
@endsection
