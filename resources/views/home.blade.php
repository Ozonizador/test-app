@extends('layout')

@section('content')
    <div>
        <div>
            <div class="container-fluid">
                <div class="row justify-content-md-center">
                    <div class="col-md-9 ">
                        <div class="card px-5 py-3 mt-5 shadow">
                            <h1 class="text-center mt-3 mb-4">Take an exam</h1>
                            <form action="{{ route('form.submit') }}" method="post" class="employee-form">
                                @csrf
                                <div class="form-section">
                                    <h4>Please fill in your information to proceed:</h4>
                                    <label for="">Name:</label>
                                    <input type="text" class="form-control mb-3" name="name" required>
                                </div>
                                <div class="form-section">
                                    <h4>Select the exam:</h4>
                                    @foreach ($exams as $exam)
                                        <div>
                                            <input type="radio" id={{ $exam->exam_id }} value={{ $exam->exam_id }}
                                                name="exam" />
                                            <label for={{ $exam->exam_id }}>{{ $exam->name }}</label>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="form-navigation mt-3">
                                    <button type="button" class="previous button-inverse float-left">&lt;Previous</button>
                                    <button type="button" class="next button float-right">Next &gt;</button>
                                    <button type="submit" class="btn btn-success float-right">Submit</button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(function() {
            var $sections = $('.form-section');

            function navigateTo(index) {
                $sections.removeClass('current').eq(index).addClass('current');

                $('.form-navigation .previous').toggle(index > 0);
                var atTheEnd = index >= $sections.length - 1;
                $('.form-navigation .next').toggle(!atTheEnd);
                $('.form-navigation [Type=submit]').toggle(atTheEnd);

                const step = document.querySelector('.step' + index);
                step.style.backgroundColor = "#17a2b8";
                step.style.color = "white";
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
@stop
