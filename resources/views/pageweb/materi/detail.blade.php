@extends('template-web.layout')

@section('content')
    <section id="materi-detail" class="materi-detail section py-5">
        <div class="container">
            <div class="mb-4" data-aos="fade-up">
                <a href="{{ url()->previous() }}" class="btn btn-outline-primary rounded-pill">
                    <i class="bi bi-arrow-left"></i> Kembali
                </a>
            </div>

            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <article class="materi-content" data-aos="fade-up">
                        <h1 class="mb-4 fw-bold text-primary">{{ $data->judul }}</h1>
                        
                        <div class="materi-konten">
                            {!! $data->konten !!}
                        </div>
                    </article>
                </div>
            </div>
        </div>
    </section>

    <style>
        .materi-detail {
            background-color: #f8f9fa;
        }
        
        .materi-content {
            background-color: #fff;
            padding: 2rem;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.05);
        }

        .materi-content h1 {
            font-size: 2.5rem;
            color: #2c3e50;
        }

        .materi-konten {
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
