@extends('layouts.app')

@section('title')
    {{ $title }}
@endsection

@section('content')
    <section class="bg-gray-50 dark:bg-gray-900 bg-hero-slide-1 bg-cover">
        <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto h-screen lg:py-0">
            <div class="flex items-center mb-6 text-2xl font-bold text-white dark:text-white">
                <img class="w-8 h-8 mr-2" src="{{ asset('logo.png') }}" alt="logo">
                {{ config('app.name') }} Admin
            </div>
            {{ $slot }}
        </div>
    </section>

    @livewire('components.footer')
@endsection
