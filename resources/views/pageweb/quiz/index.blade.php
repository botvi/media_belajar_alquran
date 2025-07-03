@extends('template-web.layout')

@section('content')
    <!-- Quiz Section -->
        <section id="quiz" class="quiz section"  style="background-image: url('{{ asset('web') }}/assets/img/bg.jpg'); background-size: cover; background-position: center; background-repeat: no-repeat; background-attachment: fixed;">
        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2 style="color: #2c3e50; font-family: 'Comic Sans MS', cursive; font-size: 2.5em; text-shadow: 2px 2px 4px rgba(0,0,0,0.1);">🎮 Quiz Seru! 🎮</h2>
            <p style="color: #34495e; font-size: 1.2em; font-family: 'Comic Sans MS', cursive;">Ayo jawab pertanyaan berikut dengan benar! 🌟</p>
        </div>

        <div class="container" data-aos="fade-up" data-aos-delay="100">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card shadow" style="border-radius: 20px; border: none; background: rgba(255, 255, 255, 0.95);">
                        <div class="card-body" style="padding: 30px;">
                            @if(count($soal) > 0)
                              

                                <input type="hidden" name="nilai_tkdk" id="nilai_tkdk" value="0">
                                
                                <div id="quiz-container">
                                    @foreach($soal as $key => $item)
                                        <div class="quiz-card {{ $key === 0 ? 'active' : 'd-none' }}" id="soal-{{ $key }}">
                                            <div class="card mb-4" style="border-radius: 15px; border: none; background: #fff; box-shadow: 0 4px 6px rgba(0,0,0,0.1);">
                                                <div class="card-body">
                                                    <h5 class="card-title" style="color: #3498db; font-family: 'Comic Sans MS', cursive; font-size: 1.5em;">Pertanyaan {{ $key+1 }} 📝</h5>
                                                    <p class="card-text" style="font-size: 1.2em; color: #2c3e50; font-family: 'Comic Sans MS', cursive;">{{ $item['pertanyaan'] }}</p>

                                                    @if($item['gambar'])
                                                        <div class="mb-3 text-center">
                                                            <img src="{{ asset($item['gambar']) }}" alt="Soal Image" class="img-fluid" style="max-width: 200px; height: auto; border-radius: 15px; box-shadow: 0 4px 8px rgba(0,0,0,0.1);">
                                                        </div>
                                                    @endif

                                                    <div class="options" style="margin-top: 20px;">
                                                        <div class="form-check mb-3" style="background: #f8f9fa; padding: 15px; border-radius: 10px; transition: all 0.3s ease;">
                                                            <input class="form-check-input jawaban-radio" type="radio" name="jawaban{{ $key }}" id="pilihan_a{{ $key }}" value="a" data-soal-id="{{ $key }}" data-jawaban-benar="{{ $item['jawaban'] }}">
                                                            <label class="form-check-label" for="pilihan_a{{ $key }}" style="font-family: 'Comic Sans MS', cursive; font-size: 1.1em; color: #2c3e50;">
                                                                A: {{ $item['pilihan']['a'] }}
                                                            </label>
                                                        </div>
                                                        <div class="form-check mb-3" style="background: #f8f9fa; padding: 15px; border-radius: 10px; transition: all 0.3s ease;">
                                                            <input class="form-check-input jawaban-radio" type="radio" name="jawaban{{ $key }}" id="pilihan_b{{ $key }}" value="b" data-soal-id="{{ $key }}" data-jawaban-benar="{{ $item['jawaban'] }}">
                                                            <label class="form-check-label" for="pilihan_b{{ $key }}" style="font-family: 'Comic Sans MS', cursive; font-size: 1.1em; color: #2c3e50;">
                                                                B: {{ $item['pilihan']['b'] }}
                                                            </label>
                                                        </div>
                                                        <div class="form-check mb-3" style="background: #f8f9fa; padding: 15px; border-radius: 10px; transition: all 0.3s ease;">
                                                            <input class="form-check-input jawaban-radio" type="radio" name="jawaban{{ $key }}" id="pilihan_c{{ $key }}" value="c" data-soal-id="{{ $key }}" data-jawaban-benar="{{ $item['jawaban'] }}">
                                                            <label class="form-check-label" for="pilihan_c{{ $key }}" style="font-family: 'Comic Sans MS', cursive; font-size: 1.1em; color: #2c3e50;">
                                                                C: {{ $item['pilihan']['c'] }}
                                                            </label>
                                                        </div>
                                                        <div class="form-check mb-3" style="background: #f8f9fa; padding: 15px; border-radius: 10px; transition: all 0.3s ease;">
                                                            <input class="form-check-input jawaban-radio" type="radio" name="jawaban{{ $key }}" id="pilihan_d{{ $key }}" value="d" data-soal-id="{{ $key }}" data-jawaban-benar="{{ $item['jawaban'] }}">
                                                            <label class="form-check-label" for="pilihan_d{{ $key }}" style="font-family: 'Comic Sans MS', cursive; font-size: 1.1em; color: #2c3e50;">
                                                                D: {{ $item['pilihan']['d'] }}
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>

                                <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                                <script>
                                    document.addEventListener('DOMContentLoaded', function() {
                                        let skor = 0;
                                        let currentQuestion = 0;
                                        const totalSoal = {{ count($soal) }};
                                        const radioButtons = document.querySelectorAll('.jawaban-radio');
                                        const skorInput = document.getElementById('nilai_tkdk');
                                        
                                        let jawabanDipilih = new Array(totalSoal).fill(false);
                                        
                                        const waktuMulai = new Date('{{ $tanggal_mulai }} {{ $waktu_mulai }}');
                                        const waktuSelesai = new Date('{{ $tanggal_mulai }} {{ $waktu_selesai }}');
                                        const totalWaktu = Math.floor((waktuSelesai - waktuMulai) / 1000 / 60);
                                        
                                        function formatTime(seconds) {
                                            const minutes = Math.floor(seconds / 60);
                                            const remainingSeconds = seconds % 60;
                                            return `${minutes}:${remainingSeconds < 10 ? '0' : ''}${remainingSeconds}`;
                                        }
                                        
                                        let timeLeft = totalWaktu * 60;
                                        const countdownElement = document.getElementById('countdown');
                                        
                                        const countdownInterval = setInterval(function() {
                                            timeLeft--;
                                            countdownElement.textContent = formatTime(timeLeft);
                                            
                                            if (timeLeft <= 0) {
                                                clearInterval(countdownInterval);
                                                countdownElement.textContent = "⏰ Waktu Habis!";
                                                Swal.fire({
                                                    icon: 'warning',
                                                    title: 'Waktu Habis!',
                                                    text: 'Waktu pengerjaan quiz telah berakhir!',
                                                    confirmButtonText: 'Kembali ke Awal'
                                                }).then(() => {
                                                    window.location.href = '/';
                                                });
                                            }
                                        }, 1000);

                                        function showQuestion(index) {
                                            document.querySelectorAll('.quiz-card').forEach(card => card.classList.add('d-none'));
                                            document.getElementById(`soal-${index}`).classList.remove('d-none');
                                        }

                                        radioButtons.forEach(radio => {
                                            radio.addEventListener('change', function() {
                                                const soalId = parseInt(this.getAttribute('data-soal-id'));
                                                const jawabanBenar = this.getAttribute('data-jawaban-benar');
                                                const jawabanTerpilih = this.value;
                                                
                                                if (jawabanTerpilih === jawabanBenar) {
                                                    skor++;
                                                    skorInput.value = skor;
                                                    Swal.fire({
                                                        icon: 'success',
                                                        title: '🎉 Horee! Benar!',
                                                        text: 'Jawaban kamu benar!',
                                                        timer: 1500,
                                                        showConfirmButton: false,
                                                        background: '#fff',
                                                        customClass: {
                                                            title: 'swal2-title-custom'
                                                        }
                                                    }).then(() => {
                                                        if (currentQuestion < totalSoal - 1) {
                                                            currentQuestion++;
                                                            showQuestion(currentQuestion);
                                                        } else {
                                                            Swal.fire({
                                                                icon: 'success',
                                                                title: '🎮 Selesai!',
                                                                text: 'Kamu telah menyelesaikan semua soal!',
                                                                confirmButtonText: 'Kembali ke Awal',
                                                                background: '#fff'
                                                            }).then(() => {
                                                                currentQuestion = 0;
                                                                showQuestion(currentQuestion);
                                                                radioButtons.forEach(radio => radio.checked = false);
                                                                jawabanDipilih.fill(false);
                                                                skor = 0;
                                                                skorInput.value = skor;
                                                            });
                                                        }
                                                    });
                                                } else {
                                                    Swal.fire({
                                                        icon: 'error',
                                                        title: '😢 Belum Tepat!',
                                                        text: 'Jawaban kamu belum tepat. Ayo coba lagi!',
                                                        timer: 1500,
                                                        showConfirmButton: false,
                                                        background: '#fff'
                                                    });
                                                }
                                                
                                                jawabanDipilih[soalId] = true;
                                            });
                                        });
                                    });
                                </script>
                            @else
                                <div class="alert alert-info" style="font-family: 'Comic Sans MS', cursive; font-size: 1.2em;">
                                    Tidak ada soal yang tersedia.
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <style>
        .form-check:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 12px rgba(0,0,0,0.1);
            background: #e8f4f8 !important;
        }
        
        .form-check-input:checked + .form-check-label {
            color: #3498db !important;
            font-weight: bold;
        }
        
        .swal2-title-custom {
            font-family: 'Comic Sans MS', cursive !important;
        }
        
        .quiz-card {
            transition: all 0.3s ease;
        }
        
        .quiz-card.active {
            animation: fadeIn 0.5s ease;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
@endsection
