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
                        <form action="{{ route('exam.result') }}" method="POST" class="employee-form" id="exam">
                            @csrf
                            <h1 class="text-center mt-3 mb-4" name="exam">{{ $exam->name }}</h1>
                            <input type="hidden" name='exam_id' value="{{ $exam->exam_id }}">
                            <input type="hidden" name="participant" value='{{ $participant }}'>
                            @foreach ($questions as $index => $question)
                                <div class="form-section" id="question-{{ $question->question_id }}">
                                    <h4>Question {{ $index + 1 }}: {{ $question->question }}</h4>
                                    @foreach ($answers->where('question_id', $question->question_id) as $answer)
                                        <div>
                                            <input type="radio" id={{ $answer->answer_id }}
                                                value='answer-{{ $answer->answer_id }}'
                                                name='question-{{ $question->question_id }}' required />
                                            <label for={{ $answer->answer_id }}>{{ $answer->answer }}</label>
                                        </div>
                                    @endforeach
                                </div>
                            @endforeach
                            <div class="form-navigation mt-3">
                                <button type="button" class="previous button-inverse float-left">&lt;Previous</button>
                                <button type="button" class="next button float-right">Next &gt;</button>
                                <button type="submit" class="btn btn-success float-right">Submit</button>
                            </div>
                        </form>

                        <script>
                            $(function() {
                                var $sections = $('.form-section');

                                function navigateTo(index) {
                                    $sections.removeClass('current').eq(index).addClass('current');

                                    $('.form-navigation .previous').toggle(index > 0);
                                    var atTheEnd = index >= $sections.length - 1;
                                    $('.form-navigation .next').toggle(!atTheEnd);
                                    $('.form-navigation [Type=submit]').toggle(atTheEnd);
                                }

                                function curIndex() {
                                    return $sections.index($sections.filter('.current'));
                                }

                                $('.form-navigation .previous').click(function() {
                                    navigateTo(curIndex() - 1);
                                });

                                $('.form-navigation .next').click(function() {
                                    $('.employee-form').parsley().whenValidate({
                                        group: 'block-' + curIndex()
                                    }).done(function() {
                                        navigateTo(curIndex() + 1);
                                    });

                                });

                                $sections.each(function(index, section) {
                                    $(section).find(':input').attr('data-parsley-group', 'block-' + index);
                                });

                                navigateTo(0);
                            });
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
