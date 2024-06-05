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
                        <h1 class="text-center mt-3 mb-4">Exams</h1>
                        <div class="d-flex flex-col">
                            @if (!empty($exams))
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Exam Name</th>
                                            <th>Number of Questions</th>
                                            <th>Minimum Score</th>
                                            <th>Edit</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (!empty($exams))
                                            @foreach ($exams as $exam)
                                                <tr class="{{ $loop->last ? 'border-bottom' : '' }}">
                                                    <td>
                                                        {{ $exam->name }}
                                                    </td>
                                                    <td>
                                                        @php
                                                            $questions = App\Models\Question::where(
                                                                'exam_id',
                                                                $exam->exam_id,
                                                            )
                                                                ->get()
                                                                ->count();
                                                        @endphp
                                                        {{ $questions }}
                                                    </td>
                                                    <td>
                                                        {{ $exam->required_score }}
                                                    </td>
                                                    <td>
                                                        <x-form method="POST" action="{{ route('logout') }}">
                                                            @csrf

                                                            <x-form-button :action="route('admin.edit-exam.id')">
                                                                {{ __('Edit') }}
                                                            </x-form-button>
                                                        </x-form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @else
                                            <tr>
                                                <td colspan="2">No exams found</td>
                                            </tr>
                                        @endif
                                    </tbody>
                                </table>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
