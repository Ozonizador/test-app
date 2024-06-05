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
                        @if ($max_score != 0)
                            @if ($total_score > $exam->required_score)
                                <h1 class="text-center mt-3 mb-8">Congratulations
                                    @if (Auth::check())
                                        {{ Auth::user()->name }}
                                    @else
                                        {{ $participant }}
                                    @endif
                                    , You have passed!
                                </h1>
                                <h4 class="mb-8">You have scored {{ $total_score }} points
                                    ({{ $total_score / $max_score }}%) in the
                                    {{ $exam->name }} exam.</h4>
                            @else
                                <h1 class="text-center mt-3 mb-8">
                                    @if (Auth::check())
                                        {{ Auth::user()->name }}
                                    @else
                                        {{ $participant }}
                                    @endif
                                    , You have failed.
                                </h1>
                                <h4 class="mb-8">You have scored {{ $total_score }} points
                                    ({{ $total_score / $max_score }}%) in the
                                    {{ $exam->name }} exam.</h4>
                            @endif
                        @endif

                        <div class="full-width">
                            <a class="float-right button" href="{{ route('exam.choose.get') }}">
                                <button type="button">Take another exam</button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
