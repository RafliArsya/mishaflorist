@extends('layouts.app')

@section('title')
    {{ $title }}
@endsection

@section('content')
    @livewire('components.admin-sidebar')

    <div class="relative md:ml-48 bg-stone-100 flex flex-col min-h-screen">
        @livewire('components.admin-header', ['title' => $title])

        <div class=" bg-teal-500 md:pt-32 pb-32 pt-12 "></div>

        <div class="px-4 md:px-10 mx-auto w-full -m-24 mb-4">
            {{ $slot }}

        </div>

        <div class="flex-1 flex items-end">
            @livewire('components.footer')
        </div>
    </div>
@endsection
