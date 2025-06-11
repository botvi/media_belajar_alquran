@extends('template-web.layout')

@section('content')
    <!-- Surah Section -->
    <section id="surah" class="surah section py-5" style="background-image: url('{{ asset('web') }}/assets/img/bg.jpg'); background-size: cover; background-position: center; background-repeat: no-repeat; background-attachment: fixed;">
        <div class="container">
            <!-- Tombol Kembali -->
            <div class="mb-4" data-aos="fade-up">
                <a href="{{ url()->previous() }}" class="btn btn-outline-primary rounded-pill">
                    <i class="bi bi-arrow-left"></i> Kembali
                </a>
            </div>


            <!-- Section Title -->
            <div class="section-title text-center mb-5" data-aos="fade-up">
                <h2 class="mb-3">{{ $data['data']['namaLatin'] }}</h2>
                <p class="lead">{{ $data['data']['arti'] }}</p>
                <div class="surah-info bg-light p-4 rounded shadow-sm">
                    <div class="row">
                        <div class="col-md-6">
                            <p class="mb-2"><strong>Tempat Turun:</strong> {{ $data['data']['tempatTurun'] }}</p>
                        </div>
                        <div class="col-md-6">
                            <p class="mb-2"><strong>Jumlah Ayat:</strong> {{ $data['data']['jumlahAyat'] }}</p>
                        </div>
                    </div>
                </div>
                <div class="surah-description mt-4">
                    {!! $data['data']['deskripsi'] !!}
                </div>
            </div>

            <div class="table-responsive shadow-sm rounded" data-aos="fade-up" data-aos-delay="100">
                <table class="table table-striped table-hover mb-0">
                    <thead class="table-primary">
                        <tr>
                            <th style="width: 50px;">No</th>
                            <th>Ayat</th>
                            <th>Arti</th>
                            <th>Audio</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data['data']['ayat'] as $ayat)
                        <tr>
                            <td class="align-middle">{{ $ayat['nomorAyat'] }}</td>
                            <td class="align-middle">
                                <div class="arabic-text">{{ $ayat['teksArab'] }}</div>
                                <div class="latin-text">{{ $ayat['teksLatin'] }}</div>
                            </td>
                            <td class="align-middle">{{ $ayat['teksIndonesia'] }}</td>
                            <td class="align-middle">
                                <div class="custom-audio-player">
                                    <audio id="audio-{{ $ayat['nomorAyat'] }}" class="audio-player">
                                        <source src="{{ $ayat['audio']['05'] }}" type="audio/mpeg">
                                    </audio>
                                    <div class="audio-controls">
                                        <button class="play-btn" onclick="togglePlay({{ $ayat['nomorAyat'] }})">
                                            <i class="bi bi-play-fill"></i>
                                        </button>
                                        <div class="progress-container">
                                            <div class="progress-bar">
                                                <div class="progress"></div>
                                            </div>
                                            <div class="time">
                                                <span class="current">0:00</span>
                                                <span class="duration">0:00</span>
                                            </div>
                                        </div>
                                        <div class="volume-container">
                                            <i class="bi bi-volume-up volume-icon"></i>
                                            <input type="range" class="volume-slider" min="0" max="100" value="100">
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>

    <style>
        .arabic-text {
            font-size: 24px;
            text-align: right;
            margin-bottom: 10px;
            font-family: 'Traditional Arabic', serif;
        }
        .latin-text {
            font-style: italic;
            color: #666;
            margin-bottom: 5px;
        }
        .surah-info {
            margin: 20px 0;
        }
        .surah-description {
            margin: 20px 0;
            text-align: justify;
            line-height: 1.8;
        }
        .table th {
            font-weight: 600;
        }
        .table td {
            vertical-align: middle;
        }
        .custom-audio-player {
            background: #f8f9fa;
            padding: 10px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .audio-controls {
            display: flex;
            align-items: center;
            gap: 10px;
        }
        .play-btn {
            background: #007bff;
            color: white;
            border: none;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        .play-btn:hover {
            background: #0056b3;
        }
        .progress-container {
            flex: 1;
        }
        .progress-bar {
            background: #e9ecef;
            height: 4px;
            border-radius: 2px;
            position: relative;
            cursor: pointer;
        }
        .progress {
            background: #007bff;
            height: 100%;
            border-radius: 2px;
            width: 0;
        }
        .time {
            display: flex;
            justify-content: space-between;
            font-size: 12px;
            color: #6c757d;
            margin-top: 4px;
        }
        .volume-container {
            display: flex;
            align-items: center;
            gap: 5px;
        }
        .volume-icon {
            cursor: pointer;
        }
        .volume-slider {
            width: 80px;
            height: 4px;
        }
    </style>

    <script>
        let currentlyPlaying = null;

        function togglePlay(ayatNumber) {
            const audio = document.getElementById(`audio-${ayatNumber}`);
            const playBtn = audio.parentElement.querySelector('.play-btn i');
            
            // Jika ada audio yang sedang diputar, hentikan
            if (currentlyPlaying && currentlyPlaying !== audio) {
                currentlyPlaying.pause();
                const prevPlayBtn = currentlyPlaying.parentElement.querySelector('.play-btn i');
                prevPlayBtn.classList.remove('bi-pause-fill');
                prevPlayBtn.classList.add('bi-play-fill');
            }
            
            if (audio.paused) {
                audio.play();
                currentlyPlaying = audio;
                playBtn.classList.remove('bi-play-fill');
                playBtn.classList.add('bi-pause-fill');
            } else {
                audio.pause();
                currentlyPlaying = null;
                playBtn.classList.remove('bi-pause-fill');
                playBtn.classList.add('bi-play-fill');
            }
        }

        document.addEventListener('DOMContentLoaded', function() {
            const audioPlayers = document.querySelectorAll('.audio-player');
            
            audioPlayers.forEach(audio => {
                const ayatNumber = audio.id.split('-')[1];
                const progressBar = audio.parentElement.querySelector('.progress');
                const currentTime = audio.parentElement.querySelector('.current');
                const duration = audio.parentElement.querySelector('.duration');
                const volumeSlider = audio.parentElement.querySelector('.volume-slider');
                
                audio.addEventListener('timeupdate', function() {
                    const progress = (audio.currentTime / audio.duration) * 100;
                    progressBar.style.width = progress + '%';
                    
                    currentTime.textContent = formatTime(audio.currentTime);
                    duration.textContent = formatTime(audio.duration);
                });
                
                audio.addEventListener('ended', function() {
                    const playBtn = audio.parentElement.querySelector('.play-btn i');
                    playBtn.classList.remove('bi-pause-fill');
                    playBtn.classList.add('bi-play-fill');
                    currentlyPlaying = null;
                });
                
                volumeSlider.addEventListener('input', function() {
                    audio.volume = this.value / 100;
                });
            });
        });

        function formatTime(seconds) {
            const minutes = Math.floor(seconds / 60);
            seconds = Math.floor(seconds % 60);
            return `${minutes}:${seconds.toString().padStart(2, '0')}`;
        }
    </script>
@endsection
