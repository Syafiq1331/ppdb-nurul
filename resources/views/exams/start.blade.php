@extends('layouts.admin', ['title' => 'User'])

@section('content')
    <div class="d-flex justify-content-end">
        <div class="btn btn-info">
            <h3 id="countdown"></h3>
        </div>
    </div>
    <div class="container">
        <h1>Ujian: {{ $exam->exam_name }}</h1>

        <!-- Menampilkan countdown -->

        <form method="post" action="{{ route('exams.submit', $exam->id) }}">
            @csrf
            @foreach ($questions as $question)
                <p>{{ $question->question_text }}</p>
                <ul>
                    @foreach ($question->choices as $choice)
                        <li>
                            <label>
                                <input type="radio" name="answers[{{ $question->id }}]" value="{{ $choice->id }}">
                                {{ $choice->choice_text }}
                            </label>
                        </li>
                    @endforeach
                </ul>
            @endforeach
            <button type="submit" class="btn btn-primary">Selesai Ujian</button>
        </form>
    </div>

    <script>
        // Fungsi untuk menghitung dan menampilkan countdown
        function startCountdown(duration, display) {
            let timer = duration,
                minutes, seconds;

            setInterval(function() {
                minutes = parseInt(timer / 60, 10);
                seconds = parseInt(timer % 60, 10);

                minutes = minutes < 10 ? "0" + minutes : minutes;
                seconds = seconds < 10 ? "0" + seconds : seconds;

                display.textContent = minutes + ":" + seconds;

                if (--timer < 0) {
                    // Waktu habis, lakukan sesuatu (misalnya, submit form)
                    document.forms[0].submit();
                }
            }, 1000);
        }

        // Waktu ujian dalam detik (30 menit = 1800 detik)
        let examDuration = 1800;
        let countdownDisplay = document.getElementById('countdown');

        // Panggil fungsi countdown saat halaman dimuat
        window.onload = function() {
            startCountdown(examDuration, countdownDisplay);
        };
    </script>
@endsection
