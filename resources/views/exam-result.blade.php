<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Take an Exam') }}
        </h2>
    </x-slot>

    <section class='content'>
        <div class="container-fluid">
            <div class="row justify-content-md-center">
                <div class="col-md-9 ">
                    <div class="card px-5 py-3 mt-5 shadow">
                        <h1 class="text-center mt-3 mb-4">Congratulations, {{ $participant }}</h1>
                        <h4>You have scored {{ $total_score }} points in the {{ $exam->name }}</h4>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
