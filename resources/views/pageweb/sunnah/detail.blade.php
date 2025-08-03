@extends('template-web.layout')

@section('content')
    <section id="sunnah-detail" class="sunnah-detail section py-5" style="background-image: url('{{ asset('web') }}/assets/img/bg.jpg'); background-size: cover; background-position: center; background-repeat: no-repeat; background-attachment: fixed;">
        <div class="container">
            <div class="mb-4" data-aos="fade-up">
                <a href="{{ url()->previous() }}" class="btn btn-outline-primary rounded-pill">
                    <i class="bi bi-arrow-left"></i> Kembali
                </a>
            </div>

            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <article class="sunnah-content" data-aos="fade-up">
                        <h1 class="mb-4 fw-bold text-primary">{{ $data->judul }}</h1>
                        
                        <div class="sunnah-meta mb-4">
                            <div class="d-flex flex-wrap gap-3 text-muted">
                                <div>
                                    <i class="bi bi-bookmark-star"></i>
                                    <span class="ms-1">{{ $data->kategori }}</span>
                                </div>
                                <div>
                                    <i class="bi bi-book"></i>
                                    <span class="ms-1">{{ $data->sumber }}</span>
                                </div>
                                <div>
                                    <i class="bi bi-quote"></i>
                                    <span class="ms-1">{{ $data->dalil }}</span>
                                </div>
                            </div>
                        </div>

                        @if($data->gambar)
                        <div class="sunnah-image mb-4">
                            <img src="{{ asset('uploads/gambar/' . $data->gambar) }}" alt="{{ $data->judul }}" class="img-fluid rounded">
                        </div>
                        @endif

                        <div class="sunnah-description">
                            {!! $data->deskripsi !!}
                        </div>
                        <div class="sunnah-description mt-4">
                            <h3>Doa</h3>
                            {!! $data->doa !!}
                        </div>
                        @if(!empty($data->audio_doa) && file_exists(public_path('uploads/audio_doa/' . $data->audio_doa)))
                        <div class="sunnah-description">
                            <audio controls style="width: 200px; height: 40px;">
                                <source src="{{ asset('uploads/audio_doa/' . $data->audio_doa) }}" type="audio/mpeg">
                                Browser Anda tidak mendukung pemutaran audio.
                            </audio>
                        </div>
                        @else
                        <div class="sunnah-description">
                            <div class="alert alert-warning mt-2">
                                Audio doa tidak tersedia atau file audio tidak ditemukan.
                            </div>
                        </div>
                        @endif
                    </article>
                </div>
            </div>
        </div>
    </section>

    <style>
        .sunnah-detail {
            background-color: #f8f9fa;
        }
        
        .sunnah-content {
            background-color: #fff;
            padding: 2rem;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.05);
        }

        .sunnah-content h1 {
            font-size: 2.5rem;
            color: #2c3e50;
        }

        .sunnah-meta {
            border-bottom: 1px solid #eee;
            padding-bottom: 1rem;
        }

        .sunnah-meta i {
            color: #3498db;
        }

        .sunnah-image img {
            width: 100%;
            max-height: 500px;
            object-fit: cover;
        }

        .sunnah-description {
            line-height: 1.8;
            color: #555;
            text-align: justify;
            font-size: 1.1rem;
        }

        .btn-outline-primary {
            border-width: 2px;
            font-weight: 500;
            padding: 0.5rem 1.5rem;
        }

        .btn-outline-primary:hover {
            transform: translateX(-5px);
            transition: transform 0.3s ease;
        }
    </style>
@endsection
