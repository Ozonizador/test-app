<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12 banner">
        <div class="banner-content">
            <h1>Take Online Exams</h1>
            <p>Your success starts here</p>
            <a href="{{ route('exam.choose.get') }}" class="button">Get Started</a>
        </div>
    </div>
</x-app-layout>
